<?php
/**
 * Api class
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 04/06/2015
 */

class Api
{
	public static $api = array();
	public static function _init()
	{
		\Config::load('apidefine');
		static::$api = \Config::load('api');
	}
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * @param type $params format array('branch_code'=>$branch_code,'sscode'=>$sscode,'work_shop_sscode'=>$work_shop_sscode,'only_opened'=>1,'lat'=>$lat,'lon'=>$lon,'radius'=>$radius)
	 * @param type $params is array() get all SS
	 * * @return array()
	 */

	protected static function _api($url, $params, $method = 'post')
	{
		$api = $req = Fuel\Core\Request::forge($url, 'curl');
		$api->set_header('Content-Type', 'application/json');
		$api->set_method($method);
		$api->set_params($params);

		if (isset(static::$api['proxy']))
		{
			$api->set_option(CURLOPT_PROXY, static::$api['proxy']);
		}

		$res = $api->execute();
		if($api->response()->status == 200)
		{
				return json_decode($res,true);
		}

		Fuel\Core\Log::error('Api error: '.print_r($params,true).print_r($res,true));
		return[];
	}
	public static function search_ss($params,$only_opened = true)
	{
		array_filter($params);
		if($only_opened)
		{
			$params['only_opened'] = 1;
		}

		try
		{
			$res = json_decode(\Fuel\Core\Cache::get(md5(json_encode($params))),true);
		}
		catch (\CacheNotFoundException $e)
		{
			$url = static::$api['ss']['url_ss'] ;
			$res = self::_api($url,$params,'get');
			if(count($res))
			{
				Fuel\Core\Cache::set(md5(json_encode($params)), json_encode($res), 3600);
			}
		}

		return $res;

	}
	/**
	 *
	 * @return array info
	 */
	public static function login($url)
	{
		$url_member = static::$api['member']['url_login_api'];
		$session_id_login = \Fuel\Core\Cookie::get('PHPSESSID');
		$params = array('session_id' => $session_id_login);
		$res = self::_api($url_member,$params,'get');
		if($session_id_login != '' && count($res) > 1)
		{
			$data['user'] = array(
				'member_id'      => $res['member_id'],
				'name'           => $res['name'],
				'kana'           => $res['kana'],
				'mobile_tel'     => $res['mobile_tel'],
				'house_tel'      => $res['house_tel'],
				'mobile_email'   => $res['mobile_email'],
				'pc_email'       => $res['pc_email'],
				'member_kaiinCd' => $res['member_id'],
				'session_id'     => $res['sessoin_id'],
			);

			\Fuel\Core\Session::delete('user_info');
			return $data['user'];
		}

		if(strtolower(\Fuel\Core\Uri::segment(1)) == 'inspection')
		{
			$user_info = \Fuel\Core\Session::get('user_info');
			if($user_info != '')
				return $data['user'] = $user_info;

			if(Fuel\Core\Input::get('nocard',0) == 1 || \Fuel\Core\Session::get('nocard') == 1)
			{
				\Fuel\Core\Session::set('nocard',1);
				return $data['user'] = array(
					'member_id'      => 0,
					'name'           => '',
					'kana'           => '',
					'mobile_tel'     => '',
					'house_tel'      => '',
					'mobile_email'   => '',
					'pc_email'       => '',
					'session_id'     => 0,
					'member_kaiinCd' => null,
				);
			}

			Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().'inspection/reserve/login');
		}
		else
		{
			Fuel\Core\Session::delete('nocard');
			Fuel\Core\Session::delete('user_info');
		}

		Fuel\Core\Response::redirect(static::$api['member']['url_login'].'?ou='.$url);
	}
	/**
	 *
	 * @param type $kaiincd
	 * @param type $values
	 * @return array
	 */
	public static function update_member_basic($kaiincd,$values=array())
	{
		$url = static::$api['member']['url_update_member'];
		$values['secret']  = static::$api['secret'];
		$values['kaiinCd'] = $kaiincd;
		$values['member_kaiinName'] = mb_convert_kana($values['member_kaiinName'],'A');
		$values['member_kaiinKana'] = mb_convert_kana($values['member_kaiinKana'],'A');
		$res = self::_api($url, $values);
		if(count($res))
			return true;

		return false;
	}
	/*
	 * list maker
	 */
	public static function get_list_maker()
	{
		$url = static::$api['car']['url_car'];
		$list_maker_code = self::_api($url,array(),'get');
		if(count($list_maker_code))
		{
			$makers = array('' => 'メーカーを選択して下さい');
			static $_GENRE_NAMES = array(
						'1' => '----- 国産車 -----',
						'2' => '----- 輸入車 -----',
					);
			foreach ($list_maker_code as $maker_value)
			{
				$genre_code = substr($maker_value['maker_code'], 0, 1);
				if ($genre_code > '2')
				{
					$genre_code = '2';
				}

				$genre_name = $_GENRE_NAMES[$genre_code];
				if(isset($makers[$genre_name]) == false)
				{
					$makers[$genre_name] = array();
				}

				$makers[$genre_name][$maker_value['maker_code']] = $maker_value['maker'];
			}
			return $makers;
		}


		return false;
	}
	public static function get_list_model($maker_code)
	{
		return self::get_car_info($maker_code);
	}

	public static function get_list_year_month($maker_code,$model_code)
	{
		return self::get_car_info($maker_code,$model_code);
	}

	public static function get_list_type_code($maker_code,$model_code,$year)
	{
		return self::get_car_info($maker_code,$model_code,$year);
	}

	public static function get_list_grade_code($maker_code,$model_code,$year,$type_code)
	{
		return self::get_car_info($maker_code,$model_code,$year,$type_code);
	}

	/**
	 *
	 * @param type $maker_code
	 * @param type $model_code
	 * @param type $year
	 * @param type $type_code
	 * @return type
	 */
	public static function get_car_info($maker_code = '',$model_code = '',$year = '',$type_code = '')
	{
		if($model_code && $maker_code == '')
		{
			return array();
		}

		if($year && $model_code == '')
		{
			return array();
		}

		if($type_code && $year == '')
		{
			return array();
		}


		$cache_key = 'car.'.$maker_code.'.'.$model_code.'.'.$year.'.'.$type_code;
		try
		{
			return Fuel\Core\Cache::get($cache_key);
		}
		catch (CacheNotFoundException $ex)
		{
		}

		$url = static::$api['car']['url_car'];
		$values = array();
		if($maker_code != '')
		{
			$values['maker_code'] = $maker_code;
		}

		if($model_code != '')
		{
			$values['model_code'] = $model_code;
		}

		if($year != '')
		{
			$values['year'] = $year;
		}

		if($type_code != '')
		{
			$values['type_code'] = $type_code;
		}

		$res = self::_api($url, $values, 'get');
		Fuel\Core\Cache::set($cache_key, $res, 86400 * 7);

		return $res;
	}

	public static function get_member_info($member_id, $list_title='', $mail_addr = '', $mob_id='')
	{
		if($member_id == '' && $mail_addr == '' && $mob_id == '')
		{
			return -1;
		}

		$values = array();
		$values['secret']   = static::$api['secret'];
		if($member_id != '')
		{
			$values['kaiinCd']  = $member_id;
		}

		if($mail_addr != '')
		{
			$values['mailAddr']  = $mail_addr;
		}

		if($mob_id != '')
		{
			$values['mobId']  = $mob_id;
		}

		if($list_title != '')
		{
			$list_title = $list_title.',member_kaiinCd';
			$values['columns']  = $list_title;
		}

		$url = static::$api['member']['url_member'];
		$res = self::_api($url, $values);
		if(array_key_exists('member_kaiinCd',$res))
		{
			return $res;
		}

		return -1;
	}
	public static function get_member_base_info($member_id)
	{
		return Api::get_member_info($member_id,'result,member_telNo2,member_telNo1,member_kaiinName,member_kaiinKana,member_mailAddress1,member_mailAddress2');
	}
	public static function search($branch_code ='',$keywork='')
	{
		$url = static::$api['ss']['url_ss'];
		$params = array(
			'branch_code' => $branch_code,
			'keyword'     => $keywork,
		);
		$res = self::_api($url, $params,'get');
		return $res;
	}
	/**
	 * get sscode
	 * @author NamDD
	 * @since 1.0.0
	 * @param
	 * @return array ss
	 */
	public static function get_ss_name($sscode = '')
	{

		if ($sscode === '')
			$url = static::$api['ss']['url_ss'];
		else
		{
			$url = static::$api['ss']['url_ss'].'?sscode='.$sscode;
		}

		try
		{
			$res = json_decode(\Fuel\Core\Cache::get('ss'.$sscode),true);
		}
		catch (\CacheNotFoundException $e)
		{
			$res = self::_api($url,array(),'get');
			if(count($res))
			{
				\Fuel\Core\Cache::set('ss'.$sscode, json_encode($res), 3600 * 24);
			}
		}
		return $res;
	}

	public static function get_info_card($card_no)
	{
		$url = static::$api['member']['url_card'];
		$params = array(
			'secret' => static::$api['secret'],
			'cardNo' => $card_no,
		);

		$res = self::_api($url, $params);
		if(count($res) == 0)
			return array('result' => 500);

		if(array_key_exists('member_kaiinCd',$res))
		{
			$res['result'] = 1;
			return $res;
		}

		return array('result' => 3);

	}

}
