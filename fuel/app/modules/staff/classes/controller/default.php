<?php

/**
 * Staff default controller
 *
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @since 26/06/2015
 */

namespace Staff;

class Controller_Default extends \Controller_Usappystaff
{

	/**
	 * List staff
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 02/07/2015
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';

		$staff_info = \Session::get('staff_info');

		//setcookie
		\Cookie::set('return_staff_url', \Uri::current(), 60 * 60 * 24);

		$data['repair_staff_id'] = $staff_info['repair_staff_id'];

		$this->template->content = self::view('default/index', $data);
	}

	/**
	 * Get data staff for calendar
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 02/07/2015
	 */
	public function action_get_repair_reservation()
	{
		if (\Input::method() != 'POST')
		{
			return false;
		}

		$repair_staff_id = \Input::post('repair_staff_id');

		//get list repair reservation today
		$reservation_calendar = array();
		$repair_reservation = \Model_Repairreservation::get_repair_reservation_list($repair_staff_id);
		if($repair_reservation)
		{
			//get list ss
			$list_ss = \Api::search_ss(array(), false);
			$list_ss_name = \Utility::array_column($list_ss, 'ss_name', 'sscode');

			foreach($repair_reservation as $key => $value)
			{
				$end_time = date('Y-m-d H:i:s',strtotime('+30 minutes', strtotime($value['arrival_time'])));
				if($value['return_time'] != null)
				{
					$end_time = $value['return_time'];
				}

				$reservation_calendar[$key]['start'] = $value['arrival_time'];
				$reservation_calendar[$key]['reservation_no'] = $value['reservation_no'];
				$reservation_calendar[$key]['title'] = array_key_exists($value['sscode'], $list_ss_name) ? $list_ss_name[$value['sscode']] : '';
				$reservation_calendar[$key]['end'] = $end_time;
			}

			$content_type = array('Content-type' => 'application/json');
			return new \Response(json_encode($reservation_calendar), 200, $content_type);
		}

		return false;
	}

	/**
	 * Staff logout
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 02/07/2015
	 */
	public function action_logout()
	{
		\Session::delete('staff_info');
		\Response::redirect(\Uri::base().'staff/login');
	}

}
