<?php
/**
 * Customer class
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/05/2015
 */

class Model_Customer
{
	private $validation;
	private $error = array();

	function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
		$this->validation = Validation::forge('customer');
	}

	public function search($card_no, $birthday)
	{

		if($card_no == '')
		{
			$info_card['result'] = -1;
			$info_card['error'] = 'カード番号を入力してください。';
			return $info_card;
		}

		if($birthday == '')
		{
			$info_card['result'] = -1;
			$info_card['error'] = '生年月日を入力してください。';
			return $info_card;
		}

		$info_card = API::get_info_card($card_no);

		if($info_card['result'] == 1 && $info_card['member_birthday'] == $birthday)
		{
			return $info_card;
		}

		elseif($info_card['result'] == 3)
		{
			$info_card['error'] = 'カード番号が正しくありません';
			return $info_card;
		}

		elseif($info_card['result'] == 500)
		{
			$info_card['error'] = 'エラーが発生しました';
			return $info_card;
		}

		else
		{
			$info_card['result'] = -1;
			$info_card['error'] = '生年月日が正しくありません';
			return $info_card;
		}


	}
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * @param type $member_id
	 * @return type
	 */
	public function get_member_info($member_id)
	{
		$cs_info = Api::get_member_base_info($member_id);
		$_array_cs = array(
			'member_kaiinCd'      => $cs_info['member_kaiinCd'],
			'card_no'             => $car_reservation_info['card_no'],
			'member_kaiinName'    => $cs_info['member_kaiinName'],
			'member_kaiinKana'    => $cs_info['member_kaiinKana'],
			'member_telNo1'       => $cs_info['member_telNo1'],
			'member_telNo2'       => $cs_info['member_telNo2'],
			'member_mailAddress1' => $cs_info['member_mailAddress1'],
		);

		return $_array_cs;
	}
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * @return type
	 */
	public function save_user_info($rs)
	{
		$data_cs_api = array(
			'member_kaiinName' => trim(\Input::param('member_kaiinName')),
			'member_kaiinKana' => Constants::convert_kana(\Input::param('member_kaiinKana')),
			'member_telNo1'    => trim(\Input::param('member_telNo1')),
			'member_telNo2'    => trim(\Input::param('member_telNo2')),
		);

		if(\Input::param('member_id'))
		{
			return Api::update_member_basic(\Input::param('member_id'),$data_cs_api);
		}
		else
		{
			if(\Input::param('member_id') == 0 && strtolower(\Fuel\Core\Uri::segment(1)) == 'inspection')
			{
				// Insert Into database oracle
				$data_oracle = array(
					'customer_name' => trim(\Input::param('member_kaiinName')),
					'customer_kana' => Constants::convert_kana(\Input::param('member_kaiinKana')),
					'mobile_tel'    => trim(\Input::param('member_telNo1')),
					'house_tel'     => trim(\Input::param('member_telNo2')),
					'email_mobile'  => \Input::param('mobile_email'),
					'email_pc'      => \Input::param('pc_email'),
					'created_at'	=> date('Y-m-d H:i'),
					'updated_at'    => date('Y-m-d H:i'),
				);
				$oracle_obj = new Model_Customeroracle();
				return $oracle_obj->customer_save($data_oracle,$rs['reservation_no']);
			}
		}
	}
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * @return boolean
	 */
	public function validate()
	{

		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		if( ! trim($this->validation->input('member_kaiinName')))
		{
			$this->error['required_member_kaiinName'] = \Fuel\Core\Lang::get('member_kaiinName').\Fuel\Core\Lang::get('required');
		}

		else
		{
			if(mb_strlen($this->validation->input('member_kaiinName')) > 15)
			{
				$this->error['max_length_member_kaiinName'] = \Fuel\Core\Lang::get('member_kaiinName').\Fuel\Core\Lang::get('max_length',array('length' => '15', ));
			}
		}

		if( ! trim($this->validation->input('member_kaiinKana')))
		{
			$this->error['required_member_kaiinKana'] = \Fuel\Core\Lang::get('member_kaiinKana').\Fuel\Core\Lang::get('required');
		}

		else
		{
			if(mb_strlen($this->validation->input('member_kaiinKana')) > 20)
			{
				$this->error['max_length_member_kaiinKana'] = \Fuel\Core\Lang::get('member_kaiinKana').\Fuel\Core\Lang::get('max_length',array('length' => '20', ));
			}

			$pattern = '/[^ｦ-ﾟ0-9\-\+\s\(\)]/u'; // is fullsize
			$name = Constants::convert_kana($this->validation->input('member_kaiinKana'));

			if(preg_match($pattern,$name))
			{
				$this->error['halfsize'] = \Fuel\Core\Lang::get('member_kaiinKana').\Fuel\Core\Lang::get('halfsize');
			}
		}

		$member_telno1 = trim($this->validation->input('member_telNo1'));
		$member_telno2 = trim($this->validation->input('member_telNo2'));

		if($member_telno1 || $member_telno2)
		{
			if($member_telno1)
			{
				if( ! is_numeric($member_telno1))
				{
					$this->error['is_number_member_telNo1'] = \Fuel\Core\Lang::get('member_telNo1').\Fuel\Core\Lang::get('is_number');
				}

				if(mb_strlen($member_telno1) > 11)
				{
					$this->error['max_length_member_telNo1'] = \Fuel\Core\Lang::get('member_telNo1').\Fuel\Core\Lang::get('max_length_number',array('length' => '11', ));
				}
			}

			if($member_telno2)
			{
				if( ! is_numeric($member_telno2))
				{
					$this->error['is_number_member_telNo2'] = \Fuel\Core\Lang::get('member_telNo2').\Fuel\Core\Lang::get('is_number');
				}

				if(mb_strlen($member_telno2) > 11)
				{
					$this->error['max_length_member_telNo2'] = \Fuel\Core\Lang::get('member_telNo2').\Fuel\Core\Lang::get('max_length_number',array('length' => '11', ));
				}
			}
		}

		else
		{
			$this->error['required_member_telNo1'] = \Fuel\Core\Lang::get('required_tel_or_mobile');
			//$this->error['required_member_telNo2'] = \Fuel\Core\Lang::get('member_telNo2').\Fuel\Core\Lang::get('required');
		}

		$pc_email = $this->validation->input('pc_email');
		$mobile_email = $this->validation->input('mobile_email');

		if($pc_email || $mobile_email)
		{
			if($pc_email && ! filter_var($pc_email,FILTER_VALIDATE_EMAIL))
			{
				$this->error['pc_email'] = \Fuel\Core\Lang::get('pc_email').\Fuel\Core\Lang::get('error_email');
			}

			if($mobile_email && ! filter_var($mobile_email,FILTER_VALIDATE_EMAIL))
			{
				$this->error['mobile_email'] = \Fuel\Core\Lang::get('mobile_email').\Fuel\Core\Lang::get('error_email');
			}

		}
		else
		{
			$this->error['pc_email'] = \Fuel\Core\Lang::get('required_email');
		}


		if(count($this->error))
			return false;

		return true;

	}
	public function get_errors()
	{
		return $this->error;
	}
}
