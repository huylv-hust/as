<?php

/**
* Repair reservation list
*
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 15/07/2015
*/

namespace Staff;

class Controller_List extends \Controller_Usappystaff
{
	/*
	 * List repair reservation
	 *
	 * @since 15/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';

		$staff_info = \Session::get('staff_info');

		$repair_staff_id = $staff_info['repair_staff_id'];

		//get list ss
		$list_ss = \Api::search_ss(array(), false);
		$data['list_ss'] = \Utility::array_column($list_ss, 'ss_name', 'sscode');

		//get search value
		$seacrch_arr = array(
			'arrival_time' => \Input::get('arrival_time'),
			'return_time'  => \Input::get('return_time'),
		);

		//set return url after edit
		$pagination_url = \Uri::base().'staff/list/index';
		$return_url = \Uri::current();
		if($seacrch_arr['arrival_time'] != null || $seacrch_arr['return_time'] != null)
		{
			$pagination_url = \Uri::base().'staff/list/index'.'?'.http_build_query($_GET);
			$return_url = \Uri::current().'?'.http_build_query($_GET);
		}

		//setcookie
		\Cookie::set('return_staff_url', $return_url, 60 * 60 * 24);

		//config pagination
		$config = array(
			'pagination_url' => $pagination_url,
			'total_items'    => count(\Model_Repairreservation::get_repair_reservation_list($repair_staff_id, false, null, null, $seacrch_arr)),
			'per_page'       => \Constants::$per_page,
			'uri_segment'    => 4,
			'num_links'      => \Constants::$num_links,
			'link_offset'    => 1,
		);

		//setup pagination
		$pagination = \Pagination::forge('list-pagination', $config);

		//get total piece count
		$data['total_a_piece'] = \Model_Repairreservation::get_total_piece_count($repair_staff_id, $seacrch_arr);
		$data['total_b_piece'] = \Model_Repairreservation::get_total_piece_count($repair_staff_id, $seacrch_arr, 'b_piece_count');

		//get all repair reservation
		$data['repair_reservation'] = \Model_Repairreservation::get_repair_reservation_list($repair_staff_id, false, $pagination->per_page, $pagination->offset, $seacrch_arr);

		$this->template->content = self::view('list/index', $data);
	}

	/*
	 * Delete repair reservation
	 *
	 * @since 15/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public function action_delete()
	{
		if (\Input::method() == 'POST')
		{
			$reservation_no = \Input::post('reservation_no');
			$model = \Model_Repairreservation::find_by_pk($reservation_no);
			if($model)
			{
				$model->delete();
				return true;
			}
		}

		return false;
	}
}