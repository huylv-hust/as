<?php

class Controller_Usappy extends Controller_Template
{

	public function before()
	{
		parent::before();
		if(Fuel\Core\Uri::segment(1) != 'inspection' && Fuel\Core\Uri::segment(1) != 'ajax')
		{
			Fuel\Core\Session::delete('nocard');
			Fuel\Core\Session::delete('user_info');
		}

		set_exception_handler(array($this, 'exception_handler'));
		$this->template = self::view('template');
		$this->template->head = self::view('partials/head');
		//navigator
		$this->template->navigator = self::view('partials/navi');
		//breadcrumb
		$this->template->breadcrumb = null;
		//footer - footer of page
		$this->template->footer = self::view('partials/footer');

	}

	public static function exception_handler($e)
	{
		$mail = explode(',', Constants::$mail_system);
		$mail_to = array();
		for($i = 0; $i < count($mail); ++$i)
		{
			$mail_to[$mail[$i]] = $mail[$i];
		}

		$subject = $e->getMessage();
		$data['body'] = $e->getTraceAsString();
		Utility::sendmail($mail_to, $subject, $data,'mail/index_error');
	}

	public static function view($file, $data = array())
	{

		if(\Agent::is_smartphone() || Fuel\Core\Input::get('sp'))
			return (View::forge($file.'_sp', $data));

		return (View::forge($file, $data));

	}

	public static function check_login()
	{
		$member = Api::login(\Fuel\Core\Uri::current());
		if(count($member))
		{
			return $member;
		}

		Fuel\Core\Response::redirect(Constants::$url_not_login);
	}
	public function set_teamplate()
	{
		$this->template->head = self::view('partials/head');
		//navigator
		$this->template->navigator = self::view('partials/navi');
		//footer - footer of page
		$this->template->footer = self::view('partials/footer');
	}
	public function get_screen_name()
	{
		$menu_code = Uri::segment('1');
	    return \Constants::$pit_work[$menu_code];
	}

	/**
	 * set session
	 * @param type $name
	 * @param type $value
	 * @return type
	 */
	public function set_session($name,$value)
	{
		$config = array('expiration_time' => 3600);
		$session = \Session::forge($config);
		Fuel\Core\Session::delete($name);
		return $session->set($name,$value);
	}
	/**
	 *
	 * @param type $name
	 * @return type
	 */
	public function get_session($name)
	{
		return \Session ::get($name);
	}

	public function search_address()
	{

		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['address'] = \Input::post('address');
		$data['breadcrumb'] = array(
			'SSを選ぶ'	 => \Uri::base().Uri::segment('1').'/search',
			'住所から検索'	 => false,
		);
		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		$this->template->content = self::view('partials/search_address',$data);
		$this->template->content->jpmap = self::view('partials/jpmap');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);

	}

	/**
	* Search ss by keywords
	*
	* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	* @since 2015-06-17
	*/
	public function find_ss_by_keywords($keywords, $class_name)
	{
		$list_ss = array();
		$list_api_ss = \Api::search_ss($keywords);

		//get list sscode from api
		$list_sscode = array();
		foreach($list_api_ss as $_temp)
		{
			$list_sscode[] = $_temp['sscode'];
		}

		//get ss from menusetting
		$list_sscode_menu = array();
		if($list_sscode)
		{
			$menu_setting = new \Model_Menusetting();
			$list_sscode_menu = $menu_setting->get_list_available_sscode($list_sscode, $class_name);
		}

		//compare with menusetting get ss avaiable
		$list_ss_available = array();
		if($list_sscode_menu)
		{
			foreach($list_sscode_menu as $_temp)
			{
				$list_ss_available[$_temp['sscode']] = $_temp['sscode'];
			}
		}

		//order ss avaiable follow return from api
		foreach($list_api_ss as $key => $value)
		{
			if(array_key_exists($value['sscode'], $list_ss_available))
			{
				$list_ss[$key]['sscode']      = $value['sscode'];
				$list_ss[$key]['ss_name']     = $value['ss_name'];
				$list_ss[$key]['tel']         = $value['tel'];
				$list_ss[$key]['address']     = $value['address'];
				$list_ss[$key]['lat']         = $value['lat'];
				$list_ss[$key]['lon']		  = $value['lon'];
				$list_ss[$key]['seller_id']	  = $value['seller_id'];
				$list_ss[$key]['branch_name'] = $value['branch_name'];
				$list_ss[$key]['distance']	  = $value['distance'];
				$list_ss[$key]['icon']		  = $value['icon'];
			}
		}

		return $list_ss;
	}
	public function reserve_calendar()
	{
		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'SSを選ぶ'  => \Uri::base().Uri::segment('1').'/search',
			'日付を選ぶ' => false,
		);
		$step = 0;
		if(\Input::post('step'))
		{
			$step = \Input::post('step');
		}

		if(\Input::get('sscode'))
		{
			$sscode = \Input::get('sscode');
			$this->set_session('sscode', $sscode);
		}
		else
		{
			$sscode = $this->get_session('sscode');
		}

		$model = new \Model_Ucalendar($sscode,\Uri::segment('1'));
		$data['date'] = $model->get_calendar_status_of_month($step);
		if($sscode && Api::search_ss(array('sscode' => $sscode)))
		{
			$data['ssinfo'] = Api::search_ss(array('sscode' => $sscode));
		}
		else
		{
			Fuel\Core\Response::redirect(\Uri::base().Uri::segment('1').'/search');
		}

		$this->template->content = self::view('partials/reserve',$data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	public function time_calendar()
	{

		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();

		$sscode = $this->get_session('sscode');
		$model = new \Model_Ucalendar($sscode,\Uri::segment('1'));

		if($this->get_session('form_'.\Uri::segment('1')) != '')
		{
			$this->set_session('form_'.\Uri::segment('1'), $this->get_session('form_'.\Uri::segment('1')));
		}

		$step = 0;
		if(\Input::post('step'))
		{
			$step = \Input::post('step');
		}

		if(\Input::post('day'))
		{
			$day = \Input::post('day');
			$this->set_session('date_booking_'.\Uri::segment('1'), $day);
		}
		else
		{
			$day = $this->get_session('date_booking_'.\Uri::segment('1'));
			if( ! $day)
			{
				Fuel\Core\Response::redirect(\Uri::base().Uri::segment('1').'/reserve');
			}
		}

		$day = date_create($day);
		date_add($day,date_interval_create_from_date_string($step.' days'));
		$day = date_format($day,'Y-m-d');
		$day = explode('-',$day);

		$now = date_create(date('Y-m-d'));
		date_add($now,date_interval_create_from_date_string('2 days'));
		$now = date_format($now,'Y-m-d');

		$d = explode('-',$now);

		$data['day'] = $day;
		$data['date'] = $d[1];
		$data['info'] = $model->get_reservation_status_of_day($day[0],$day[1],$day[2],$step);
		if($sscode)
		{
			$data['ssinfo'] = \Api::search_ss(array('sscode' => $sscode));
		}
		else
		{
			Fuel\Core\Response::redirect(\Uri::base().Uri::segment('1').'/search');
		}

		$data['breadcrumb'] = array(
			'SSを選ぶ'  => \Uri::base().Uri::segment('1').'/search',
			'日付を選ぶ' => \Uri::base().Uri::segment('1').'/reserve',
			'時間を選ぶ' => false,
		);
		$this->template->content = self::view('partials/time',$data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	public function login()
	{
		$data =array();
		\Fuel\Core\Session::delete('form_inspection');
		if(Fuel\Core\Input::method() == 'POST')
		{
			$cus = new \Model_Customer();
			$card_no	= \Input::post('card_no');
			$birthday	= \Input::post('birthday');
			$error = array();

			if($card_no == '' &&  $birthday == '')
			{
				$error[] = 'カード番号を入力してください。';
				$error[] = '生年月日を入力してください。';


			}
			else
			{
				$card_info  = $cus->search($card_no,$birthday);
				if($card_info['result'] == '1')
				{
					\Fuel\Core\Session::delete('user_info');
					$user_info = array(
						'member_id'      => 0,
						'name'           => $card_info['member_kaiinName'],
						'kana'           => $card_info['member_kaiinKana'],
						'mobile_tel'     => $card_info['member_telNo1'] == '0' ? '' : $card_info['member_telNo1'],
						'house_tel'      => $card_info['member_telNo2'],
						'mobile_email'   => $card_info['member_mailAddress1'],
						'pc_email'       => $card_info['member_mailAddress2'],
						'session_id'     => 0,
						'member_kaiinCd' => $card_info['member_kaiinCd'],
					);
					\Fuel\Core\Session::set('user_info',$user_info);
					Fuel\Core\Response::redirect(Fuel\Core\Uri::base().'inspection/reserve/form/');
				}
				else
				{
					$error[] = $card_info['error'];
				}
			}


			$data['error'] = $error;
			$data['card_no'] = $card_no;
			$data['birthday'] = $birthday;
		}

		$this->template->title = 'Usappy オートサービス　車検　オイル交換　コーティング　ボディリペア　タイヤ交換';
		$data['breadcrumb'] = array(
			'Usappy Web会員' => false,
		);

		$this->template->content = self::view('partials/login',$data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	public function clear_all_session()
	{
		//Fuel\Core\Session::delete('user_info');
		//Fuel\Core\Session::delete('nocard');
		Fuel\Core\Session::delete('form_oil');
		Fuel\Core\Session::delete('form_tire');
		Fuel\Core\Session::delete('form_wash');
		Fuel\Core\Session::delete('form_inspection');
		Fuel\Core\Session::delete('form_coating');
	}
}
