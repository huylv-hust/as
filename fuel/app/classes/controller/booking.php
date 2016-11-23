<?php
/**
* Booking
* @author NamDD<NamDD6566@seta-asia.com.vn>
* @since 2015-06-22
*/
class Controller_Booking extends Controller_Usappy
{

	protected $cs_info = array();
	function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
	}
	/**
	 * change time when time error
	*/
	public function change_time()
	{
		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		if(Fuel\Core\Input::get('change_time') == '1')
		{
			if(Fuel\Core\Input::method() == 'POST')
				$this->set_session('form_'.$menu_code,\Input::post());

			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/time/');
		}
	}
	/**
	 * redirect page when session timeout
	*/
	public function redirect_page()
	{
		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		if($this->get_session('sscode') == '')
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/search/');
		}

		if($this->get_session('start_time_booking_'.$menu_code) == '')
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/time/');
		}

		if($this->get_session('date_booking_'.$menu_code) == '')
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/');
		}

	}

	/**
	 * form input
	*/
	public function form()
	{

		$this->change_time();
		$data = array();
		$cs = new \Model_Customer();
		$ucar = new \Model_Ucar();
		$pit = new \Model_Pit();
		$error_cs = array();
		$error_car = array();
		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		$menu_code_name = \Constants::$pit_work[$menu_code];
		/*process post*/

		if(Fuel\Core\Input::post('post'))
		{
			$time_start = Fuel\Core\Input::post('start');
			$time_end = Fuel\Core\Input::post('end');
			$this->set_session('start_time_booking_'.$menu_code,$time_start);
			$this->set_session('end_time_booking_'.$menu_code,$time_end);
		}
		else
		{
			$time_start = $this->get_session('start_time_booking_'.$menu_code);
			$time_end = $this->get_session('end_time_booking_'.$menu_code);
		}

		if(Fuel\Core\Input::post('curr_date'))
		{
			$this->set_session('date_booking_'.$menu_code,Fuel\Core\Input::post('curr_date'));
		}

		$this->cs_info = \Api::login(Uri::current());
		// check black
		$blacks = Fuel\Core\Config::load('black');
		if (is_array($blacks) && in_array($this->cs_info['member_id'], $blacks))
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().'iderror');
		}

		$this->redirect_page();

		/*check post page reserve/time then not process*/

		if(\Input::method() == 'POST' && Fuel\Core\Input::post('sscode'))
		{
			if($this->cs_info['member_id'] != Fuel\Core\Input::post('member_id'))
			{
				\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base());
			}

			if( ! $cs ->validate())
			{
				$error_cs = $cs->get_errors();
			}

			if( ! $ucar->validate())
			{
				$error_car = $ucar->get_errors();
			}

			if(count($error_car) && count($error_car))
				$data['error'] = array_merge($error_cs,$error_car);
			else
				$data['error'] = $error_cs + $error_car;

			if( ! count($data['error']))
			{
				$this->clear_all_session();
				\Fuel\Core\Session::set('form_'.$menu_code,\Input::post());
				\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/check/');
			}
		}

		/*end process*/
		$data['action'] = \Fuel\Core\Uri::base().$menu_code.'/reserve/form/';
		$sscode = $this->get_session('sscode');
		$params = array('sscode' => $sscode);
		$data['ss_info'] = current(\Api::search_ss($params));
		$data['ss_info']['href'] = 'https://usappy.jp/ss/'.$data['ss_info']['sscode'];
		$data['type_book'] = $menu_code_name;


		$time_day = $this->get_session('date_booking_'.$menu_code);


		$data['start_time'] = $time_day.' '.$this->convert_time($time_start);
		$data['start_time_show'] = $time_day.'日 '.$this->convert_time($time_start);
		$data['end_time'] = $time_day.' '.$this->convert_time($time_end);
		$data['menu_code'] = $menu_code;
		if(Fuel\Core\Input::server('HTTP_REFERER') != \Fuel\Core\Uri::base().$menu_code.'reserve/check')
		{
			$pit_no = $pit->get_pit_no($params['sscode'], $menu_code, $data['start_time'], $data['end_time']);
			if(($pit_no == null) && ($menu_code == 'tire' || $menu_code == 'oil' || $menu_code == 'inspection'))
			{
				$data['date_booking'] = \Fuel\Core\Lang::get('date_booking');
			}

			$ucalendar = new \Model_Ucalendar($params['sscode'], $menu_code);
			if( ! $ucalendar->validation_booking($data['start_time'], $data['end_time']))
			{
				$data['date_booking'] = \Fuel\Core\Lang::get('date_booking');
			}
		}

		$data['pit_no'] = $pit_no;
		$data['show_car_size_code'] = false;
		$data['show_coating_code'] = false;
		$data['show_car_color_code'] = false;
		$data['show_is_car_request'] = true;
		$data['show_tire_preparation_code'] = false;

		if($menu_code == 'coating')
		{
			$data['show_coating_code'] = true;
			$data['coating_code'] = array();
			$sql = 'SELECT coating_code FROM enable_coating WHERE sscode = '.$sscode;
			$result = \Fuel\Core\DB::query($sql)->execute();
			if(count($result))
			{
				foreach($result as $_temp)
				{
					$data['coating_code'][]['coating_code'] = $_temp['coating_code'];
				}
			}

			$data['show_car_color_code'] = true;
			$data['show_is_car_request'] = false;
		}

		elseif($menu_code == 'oil')
		{
			$data['show_is_car_request'] = false;
		}

		elseif($menu_code == 'reserve')
		{
			$data['show_car_color_code'] = true;
		}

		elseif(($menu_code == 'inspection'))
		{
			$data['show_car_size_code'] = true;
		}

		elseif(($menu_code == 'wash'))
		{
			$data['show_car_color_code'] = true;
			$data['show_is_car_request'] = false;
		}

		else
		{
			$data['show_tire_preparation_code'] = true;
			$data['show_is_car_request'] = false;
		}

		//MiengTQ MOD check error
		if(Fuel\Core\Input::get('error') || Fuel\Core\Input::get('error_api'))
		{
			$data['error'][] = 'エラーが発生しました';
		}
		$data['user'] = $this->cs_info;
		$data['info_session']  = $this->get_session('form_'.$menu_code);
		$this->template->title = 'Usappy オートサービス　車検　オイル交換　コーティング　ボディリペア　タイヤ交換';
		$this->template->content = self::view('form/index',$data);
	}
	public function check()
	{

		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		$menu_code_name = \Constants::$pit_work[$menu_code];
		$data_info = \Fuel\Core\Session::get('form_'.$menu_code);
		$date_booking = Fuel\Core\Session::get('date_booking_'.$menu_code);

		/*Not member*/
		if($menu_code == 'inspection' && $data_info['member_id'] == 0)
		{
			$this->cs_info['member_id']  = 0;
		}
		else
		{
			$this->cs_info = \Api::login(Uri::current());
		}

		if($date_booking == '')
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/time/');
		}

		if($data_info == '')
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?session_or_log=1');
		}

		/* Session time out*/
		if($this->cs_info['member_id'] != $data_info['member_id'])
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base());
		}

		$data = array();
		$data['menu_code'] = $menu_code;
		$data['pit_no'] = $data_info['pit_no'];
		$data['cs_info'] = array();
		$data['car_info'] = array();
		$data['action'] = \Fuel\Core\Uri::base().$menu_code.'/reserve/save/';
		$data['sscode'] = $data_info['sscode'];
		$data['ss_name'] = $data_info['ss_name'];
		$data['start_time'] = $data_info['start_time'];
		$data['end_time'] = $data_info['end_time'];
		$ucalendar = new \Model_Ucalendar($data['sscode'], $menu_code);
		if( ! $ucalendar->validation_booking($data['start_time'], $data['end_time']))
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?vali_booking=1');
		}

		$data['cs_info']['member_kaiinName'] = $data_info['member_kaiinName'];
		$data['cs_info']['member_kaiinKana'] = $data_info['member_kaiinKana'];
		$data['cs_info']['member_telNo1'] = $data_info['member_telNo1'];
		$data['cs_info']['member_telNo2'] = $data_info['member_telNo2'];
		$data['cs_info']['member_id'] = $data_info['member_id'];
		$data['cs_info']['pc_email'] = $data_info['pc_email'];
		$data['cs_info']['mobile_email'] = $data_info['mobile_email'];
		$data['car_info']['plate_no'] = $data_info['plate_no'];
		$data['car_info']['car_maker_code']  = $data_info['car_maker_code'];
		$data['car_info']['car_model_code']  = $data_info['car_model_code'];
		$data['car_info']['car_year']  = $data_info['car_year'];
		$data['car_info']['car_month']  = $data_info['car_month'];
		$data['car_info']['car_type_code']  = $data_info['car_type_code'];
		$data['car_info']['car_grade_code']  = $data_info['car_grade_code'];

		if(isset($data_info['car_size_code']))
			$data['car_info']['car_size_code']  = $data_info['car_size_code'];

		if(isset($data_info['tire_preparation_code']))
			$data['car_info']['tire_preparation_code']  = $data_info['tire_preparation_code'];

		if(isset($data_info['tire_size_code']))
			$data['car_info']['tire_size_code']  = $data_info['tire_size_code'];

		if(isset($data_info['wheel_preparation_code']))
			$data['car_info']['wheel_preparation_code']  = $data_info['wheel_preparation_code'];

		if(isset($data_info['car_weight_code']))
			$data['car_info']['car_weight_code']  = $data_info['car_weight_code'];

		if(isset($data_info['car_color_code']))
			$data['car_info']['car_color_code']  = $data_info['car_color_code'];

		if(isset($data_info['coating_code']))
			$data['car_info']['coating_code']  = $data_info['coating_code'];

		if(isset($data_info['is_car_request']))
			$data['car_info']['is_car_request']  = $data_info['is_car_request'];

		if($data_info['inspection_year'])
			$data['car_info']['inspection_date']  = $data_info['inspection_year'].'-'.str_pad($data_info['inspection_month'],2,'0',STR_PAD_LEFT).'-'.str_pad($data_info['inspection_day'],2,'0',STR_PAD_LEFT);

		$data['car_info']['other_request']  = $data_info['other_request'];

		$this->template->title = 'Usappy オートサービス　車検　オイル交換　コーティング　ボディリペア　タイヤ交換';
		$this->template->content = self::view('check/index',$data);
	}
	public function save()
	{

		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		$cs_car = new \Model_Ucustomerreservation();
		$pit = new \Model_Pit();
		$date_booking = Fuel\Core\Session::get('date_booking_'.$menu_code);
		if($date_booking == '')
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/time/');
		}

		/*Not member*/

		if(\Input::method() == 'POST')
		{

			if($menu_code == 'inspection' && Fuel\Core\Input::post('member_id') == 0)
			{
				$this->cs_info['member_id']  = 0;
			}
			else
			{
				$this->cs_info = \Api::login(Uri::current());
			}
			/* Session time out */
			if($this->cs_info['member_id'] != Fuel\Core\Input::post('member_id'))
			{
				\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base());
			}

			if($cs_car->validate())
			{

				$cs_car->lock_tabale_reservation();
				$data = \Fuel\Core\Input::post();
				$ucalendar = new \Model_Ucalendar($data['sscode'], $menu_code);
				if( ! $ucalendar->validation_booking($data['start_time'], $data['end_time']))
				{
					$cs_car->unlock_table();
					\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?vali_booking=1');
				}

				$params['sscode'] = $data['sscode'];
				$pit_no = $pit->get_pit_no($params['sscode'], $menu_code, $data['start_time'], $data['end_time']);
				if(($pit_no == null) && ($menu_code == 'tire' || $menu_code == 'oil' || $menu_code == 'inspection'))
				{
					$cs_car->unlock_table();
					\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?pit_no_full=1');
				}

				$data['pit_no'] = $pit_no;

				$rs = $cs_car->save($data);
				$cs_car->unlock_table();
				if($rs === false)
				{
					\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?error=1');
				}

				elseif($rs === 0)
				{
					\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?error_api=1');
				}

				else
				{
					$data['reservation_no'] = $rs['reservation_no'];
					$this->send_mail($data);
					\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/complete/');
				}
			}
			else
			{

				\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/form/?error=2');
			}
		}

	}
	/**
	 * send mail
	 * @param array $data
	 */
	public function send_mail($data)
	{
		//$data['user'] = $this->cs_info;
		// Get API

		if($data['member_id'] == 0 && \Fuel\Core\Uri::segment(1) == 'inspection')
		{
			$oracle = new Model_Customeroracle();
			$reservation = new Model_Reservation();
			$reservation_info = $reservation->get_reservation_info($data['reservation_no']);
			$data['href_inspection'] = \Fuel\Core\Uri::base().'reservation/detail?hashkey='.$reservation_info['hashkey'];
			$data['user'] = Utility::convert_customer_info_oracel($oracle->get_member_info_oracle($data['reservation_no']));
		}
		else
		{
			$data['user'] = Api::get_member_base_info($data['member_id']);
		}

		if( ! count($data['user'])) return false;

		$params = array('sscode' => $data['sscode']);
		$data['ss_info'] = current(\Api::search_ss($params));
		$subject = 'Usappy 【'.Constants::$pit_work[$data['menu_code']].'】予約完了のお知らせ';
		if($data['menu_code'] == 'other')
			$subject = 'Usappy 【'.$data['menu_name'].'】予約完了のお知らせ';

		$mail_to = array();
		if($data['user']['member_mailAddress2'])
		{
			$mail_to[$data['user']['member_mailAddress2']] = $data['user']['member_kaiinName'];
		}

		if($data['user']['member_mailAddress1'])
		{
			$mail_to[$data['user']['member_mailAddress1']] = $data['user']['member_kaiinName'];
		}

		Utility::sendmail($mail_to, $subject, $data,'mail/index');
	}

	/**
	 * Complete
	 */

	public function complete()
	{
		$data = array();
		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		$name = 'form_'.$menu_code;
		Fuel\Core\Session::delete($name);
		Fuel\Core\Session::delete('date_booking_'.$menu_code);
		Fuel\Core\Session::delete('start_time_booking_'.$menu_code);
		Fuel\Core\Session::delete('end_time_booking_'.$menu_code);
		$check_no_member = \Fuel\Core\Session::get('nocard') || \Fuel\Core\Session::get('user_info');
		$data['check_no_member'] = $check_no_member;
		$data['menu_code'] = $menu_code;
		if( ! Fuel\Core\Input::server('HTTP_REFERER'))
		{
			Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/reserve/');
		}

		$this->template->title = 'Usappy オートサービス　車検　オイル交換　コーティング　ボディリペア　タイヤ交換';
		$this->template->content = self::view('complete/index',$data);
	}

	public function convert_time($time)
	{
		$min = $time % 60;
		$hour = ($time - $min) / 60;
		return str_pad($hour,'2','0',STR_PAD_LEFT).':'.str_pad($min,'2',STR_PAD_LEFT);
	}
}
