<?php

/**
 * Reservation class
 *
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @date 23/06/2015
 */
class Controller_Reservation extends Controller_Usappy
{
	protected $_memberid;
	protected $_hashkey;
	public function __construct()
	{
		$hashkey = Input::get('hashkey');
		if($hashkey == null)
		{
			$user_info = $this->check_login();
			$this->_memberid = $user_info['member_id'];
		}

		$this->_hashkey = $hashkey;
	}

	/**
	 * Get reservation by sscode
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @date 23/06/2015
	 */
	public function action_index()
	{
		$this->template->title = 'ご予約の確認・キャンセル | Usappyオートサービス';

		//check hashkey if is member
		if($this->_hashkey != null)
		{
			\Response::redirect(\Uri::base().'reservation/detail?hashkey='.$this->_hashkey);
		}

		//get list ss
		$list_ss = Api::search_ss(array(), false);
		$data['list_ss_range'] = array();
		if($list_ss)
		{
			$data['list_ss_range'] = $this->create_array($list_ss, 'sscode', 'ss_name');
		}

		//get reservation by member_id
		$data['list_res'] = Model_Reservation::get_reservation_by_memberid($this->_memberid);

		$data['breadcrumb'] = array('予約確認' => false);

		$this->template->content = self::view('reservation/index', $data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	/**
	 * Get detail reservation
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @date 23/06/2015
	 */
	public function action_detail()
	{
		$this->template->title = 'ご予約の確認・キャンセル | Usappyオートサービス';

		$model = new Model_reservation();

		$reservation_no = \Input::get('reservation_no');
		$reservation = $model->get_reservation_info($reservation_no);

		if($this->_hashkey)
		{
			$reservation = $model->get_reservation_by_hashkey($this->_hashkey);
		}

		if( ! $reservation)
		{
			\Response::redirect(\Uri::base().'reservation/error?hashkey='.$this->_hashkey);
		}

		$reservation_no = $reservation['reservation_no'];

		//member_id permission
		if($this->_hashkey ==  null && $reservation['member_id'] != $this->_memberid)
		{
			\Response::redirect(\Uri::base().'reservation');
		}

		//get list ss
		$ss_info = Api::search_ss(array('sscode' => $reservation['sscode']), false);
		$data['ss_info'] = array();
		if($ss_info)
		{
			$data['ss_info'] = $ss_info[0];
		}

		//get customer info
		$data['customer_info'] = Api::get_member_info($reservation['member_id']);
		if($this->_hashkey)
		{
			$customer_info = Model_Customeroracle::get_member_info_oracle($reservation_no);
			if($customer_info)
			{
				$data['customer_info'] = Utility::convert_customer_info_oracel($customer_info);
			}
		}

		//get list car maker
		$data['list_maker_range'] = \Api::get_list_maker();

		//get list car model
		$list_car_model = Api::get_list_model($reservation['car_maker_code']);
		$data['list_model_range'] = array();
		if($list_car_model)
		{
			if(isset($list_car_model[0]['model_code']))
			{
				$data['list_model_range'] = $this->create_array($list_car_model, 'model_code', 'model');
			}
		}

		//get list_type_code
		$list_type_code = Api::get_list_type_code($reservation['car_maker_code'], $reservation['car_model_code'], $reservation['car_year']);
		$data['list_type_code'] = array();
		if($list_type_code)
		{
			if(isset($list_type_code[0]['type_code']))
			{
				$data['list_type_code'] = $this->create_array($list_type_code, 'type_code', 'type');
			}
		}

		//get list_grade_code
		$list_grade_code = Api::get_list_grade_code($reservation['car_maker_code'], $reservation['car_model_code'], $reservation['car_year'], $reservation['car_type_code']);
		$data['list_grade_code'] = array();
		if($list_grade_code)
		{
			if(isset($list_grade_code[0]['grade_code']))
			{
				$data['list_grade_code'] = $this->create_array($list_grade_code, 'grade_code', 'grade');
			}
		}

		//check cancel booking yes or no
		$start_time = date('Y-m-d', strtotime($reservation['start_time']));
		$tomorow = date('Y-m-d', strtotime("+1 days"));
		$data['start_time'] = false;
		//it may be cancel
		if($reservation['start_time'] != null && strtotime($start_time) > strtotime($tomorow))
		{
			$data['start_time'] = true;
		}

		$data['breadcrumb'] = array(
			'予約確認'    => \Uri::base().'reservation',
			'予約確認詳細' => false,
		);

		$data['reservation'] = $reservation;
		$data['reservation_no'] = $reservation_no;
		$data['hashkey'] = $this->_hashkey;

		$this->template->content = self::view('reservation/detail', $data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	/**
	 * Cancel booking
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @date 24/06/2015
	 */
	public function action_cancel()
	{
		$model = new Model_reservation();

		$reservation_no = \Input::get('reservation_no');
		$reservation = $model->get_reservation_info($reservation_no);

		if($this->_hashkey)
		{
			$reservation = $model->get_reservation_by_hashkey($this->_hashkey);
		}

		if( ! $reservation)
		{
			\Response::redirect(\Uri::base().'reservation/error?hashkey='.$this->_hashkey);
		}

		$reservation_no = $reservation['reservation_no'];

		//check cancel booking yes or no
		$start_time = date('Y-m-d', strtotime($reservation['start_time']));
		$tomorow = date('Y-m-d', strtotime("+1 days"));
		//it may be cancel
		if($reservation['start_time'] != null && strtotime($start_time) <= strtotime($tomorow))
		{
			\Response::redirect(\Uri::base().'reservation/detail?hashkey='.$this->_hashkey.'&reservation_no='.$reservation_no);
		}

		//if member_id permission
		if($this->_hashkey == null && $reservation['member_id'] != $this->_memberid)
		{
			\Response::redirect(\Uri::base().'reservation');
		}

		//delete record
		$this->send_mail($reservation);

		try {
			DB::start_transaction();
			$reservation_status = $model->reservation_delete($reservation_no);
			if($this->_hashkey && $reservation_status)
			{
				$model_oracle = new Model_Customeroracle();
				$rs = $model_oracle->customer_delete($reservation_no);
			}

			if(isset($rs) && ! $rs)
			{
				DB::rollback_transaction();
			}
			else
			{
				DB::commit_transaction();
			}
			
		} catch (\DatabaseException $e) {
			DB::rollback_transaction();
			throw $e;
		}

		\Response::redirect(\Uri::base().'reservation/complete?hashkey='.$this->_hashkey);

		return false;
	}

	/**
	 * Complete booking
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @date 24/06/2015
	 */
	public function action_complete()
	{
		$this->template->title = 'ご予約の確認・キャンセル | Usappyオートサービス';

		$data['breadcrumb'] = array('予約確認' => false);

		$this->template->content = self::view('reservation/complete', $data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	/**
	 * Hashkey not found
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @date 07/10/2015
	 */
	public function action_error()
	{
		$this->template->title = 'ご予約の確認・キャンセル | Usappyオートサービス';

		$data['breadcrumb'] = array('予約確認' => false);

		$this->template->content = self::view('reservation/error', $data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	/**
	 * Function create array
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @date 23/06/2015
	 */
	public function create_array($data, $key, $value)
	{
		$result = array();
		if( ! is_array($data))
		{
			return array();
		}

		foreach ($data as $k => $v)
		{
			$result[$v[$key]] = $v[$value];
		}

		return $result;
	}

	/**
	 * send mail for cancel
	 * @param type $data
	 */

	public function send_mail($reservation)
	{
		$data['reservation_no'] = $reservation['reservation_no'];
		$data['start_time'] = $reservation['start_time'];
		$data['menu_code'] = $reservation['menu_code'];
		$data['menu_name'] = $reservation['menu_name'];
		$data['sscode'] = $reservation['sscode'];

		$data['user'] = Api::get_member_base_info($reservation['member_id']);
		if($this->_hashkey)
		{
			$user_info = Model_Customeroracle::get_member_info_oracle($data['reservation_no']);
			if($user_info)
			{
				$data['user'] = Utility::convert_customer_info_oracel($user_info);
			}
		}

		$params = array('sscode' => $data['sscode']);
		$data['ss_info'] = current(\Api::search_ss($params));
		$subject = 'Usappy【'.Constants::$pit_work[$data['menu_code']].'】キャンセル完了のお知らせ';
		if($data['menu_code'] == 'other')
		{
			$subject = 'Usappy【'.$reservation['menu_name'].'】キャンセル完了のお知らせ';
		}

		$mail_to = array();
		if($data['user']['member_mailAddress2'])
		{
			$mail_to[$data['user']['member_mailAddress2']] = $data['user']['member_kaiinName'];
		}

		if($data['user']['member_mailAddress1'])
		{
			$mail_to[$data['user']['member_mailAddress1']] = $data['user']['member_kaiinName'];
		}

		Utility::sendmail($mail_to, $subject, $data,'mail/index_cancel');
	}
}
