<?php

/**
 * Calendar Staff Controller
 *
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @since 14/07/2015
 */

namespace Staff;

class Controller_Calendar extends \Controller_Usappystaff
{
	/**
	 * Calendar list
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 14/07/2015
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';

		$staff_info = \Session::get('staff_info');

		//set cookie return url
		\Cookie::set('return_staff_url', \Uri::current().'?redirect=1', 60 * 60 * 24);

		$data['repair_staff_id'] = $staff_info['repair_staff_id'];

		$this->template->content = self::view('calendar/index', $data);
	}

	/**
	 * Get repair reservation
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 14/07/2015
	 */
	public function action_get_reservation()
	{
		if (\Input::method() != 'POST')
		{
			return false;
		}

		$repair_staff_id = \Input::post('repair_staff_id');

		//get list repair reservation today
		$reservation_calendar = array();
		$repair_reservation = \Model_Repairreservation::get_repair_reservation_list($repair_staff_id, false);
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

				$model_name = '';
				$list_model = \Api::get_list_model($value['car_maker_code']);
				//var_dump($value['car_model_code']);
				foreach($list_model as $_temp)
				{
					if(isset($_temp['model_code']) && $_temp['model_code'] == $value['car_model_code'])
					{
						$model_name = $_temp['model'];
						break;
					}
				}

				$reservation_calendar[$key]['title'] = '';
				if($value['is_car_request'] == 1)
					$reservation_calendar[$key]['title'] .= '代';

				if($value['is_shuttle_request'] == 1)
					$reservation_calendar[$key]['title'] .= '送';

				$reservation_calendar[$key]['title'] .= date('Hi',strtotime($value['arrival_time']));

				if($value['return_time'])
					$reservation_calendar[$key]['title'] .= date('Hi',strtotime($value['return_time']));

				$reservation_calendar[$key]['title'] .= '_A'.$value['a_piece_count'].'B'.$value['b_piece_count'].'_'.$model_name;
				$reservation_calendar[$key]['title'] = trim($reservation_calendar[$key]['title'],'_');
				//$reservation_calendar[$key]['title'] = array_key_exists($value['sscode'], $list_ss_name) ? $list_ss_name[$value['sscode']] : '';
				$reservation_calendar[$key]['start'] = $value['arrival_time'];
				$reservation_calendar[$key]['reservation_no'] = $value['reservation_no'];



				$reservation_calendar[$key]['end'] = $end_time;
				//$reservation_calendar[$key]['color'] = '#0050CB';

				$return_time = explode(' ', $value['return_time']);
				$start_time = explode(' ', $value['arrival_time']);
				$range = strtotime($return_time[0]) - strtotime($start_time[0]);

				if($range < 0)
				{
					$range = strtotime($start_time[0]) - strtotime($return_time[0]);
				}

				if( ! $value['return_time'])
				{
					$reservation_calendar[$key]['color'] = '#FF0000';
				}

				elseif($range / 3600 == 0)
				{
					$reservation_calendar[$key]['color'] = '#0000FF';
				}

				elseif($range / 3600 == 24)
				{
					$reservation_calendar[$key]['color'] = '#008000';
				}

				elseif($range / 3600 == 48)
				{
					$reservation_calendar[$key]['color'] = '#9400D3';
				}

				else
				{
					$reservation_calendar[$key]['color'] = '#FF8C00';
				}
			}

			$content_type = array('Content-type' => 'application/json');
			return new \Response(json_encode($reservation_calendar), 200, $content_type);
		}

		return false;
	}
}
