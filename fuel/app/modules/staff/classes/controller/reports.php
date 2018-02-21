<?php

/**
 * Staff reports
 *
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @since 21/07/2015
 */

namespace Staff;

class Controller_Reports extends \Controller_Usappystaff
{
	/**
	 * List reports
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 22/07/2015
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';

		$flag = in_array(\Input::get('flag'), array('true', 'false')) ? \Input::get('flag') : 'true';

		$data_date = \Model_Repairreport::valadate_date($flag);
		$year = $data_date['year'];
		$month = $data_date['month'];

		$staff_info = \Session::get('staff_info');
		$repair_staff_id = $staff_info['repair_staff_id'];

		//get repair reports list
		$data['repair_report'] = \Model_Repairreport::get_repair_reports_list($repair_staff_id, $year, $month);

		//get total a&b piece_count
		foreach ($data['repair_report'] as $key => $value)
		{
			$data['repair_report'][$key]['total_piece'] = \Model_Repairreservation::get_total_piece_count_reports($repair_staff_id, $value['repair_date']);
			$data['repair_report'][$key]['total_piece_to'] = \Model_Repairreservation::get_total_piece_count_reports($repair_staff_id, $value['repair_date'], true);
		}

		//get total price from firt month
		$data['total_price_report'] = \Model_Repairreport::get_total_price_fist($repair_staff_id, $month, $year);
		$data['total_price_remain'] = \Model_Repairreservation::get_total_price_remain($repair_staff_id, $month, $year);

		//get staff plan
		$data['staff_plan'] = \Model_Repairstaffplan::get_info($repair_staff_id, $year, $month);

		//get list ss
		$list_ss = \Api::search_ss(array(), false);
		$data['list_ss'] = array();
		if($list_ss)
		{
			$data['list_ss'] = \Utility::array_column($list_ss, 'ss_name', 'sscode');
		}

		//set cookie return url
		$return_url = \Uri::current();
		if(\Input::get('flag'))
		{
			$return_url = \Uri::current().'?'.http_build_query($_GET);
		}

		\Cookie::set('return_reports_url', $return_url, 60 * 60 * 24);

		$data['list_month'] = $data_date['list_month'];
		$data['list_year'] = $data_date['list_year'];
		$data['set_month'] = $month;
		$data['set_year'] = $year;

		$this->template->content = self::view('reports/index', $data);
	}

	/**
	 * Delete staff report
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 23/07/2015
	 */
	public function action_delete()
	{
		$staff_info = \Session::get('staff_info');
		$repair_staff_id = $staff_info['repair_staff_id'];

		$repair_date = \Input::get('repair_date');
		if( ! $repair_date)
		{
			\Fuel\Core\Response::redirect(\Uri::base().'staff/reports');
		}

		\Model_Repairreport::reports_delete($repair_staff_id, $repair_date);

		$return_reports_url = \Cookie::get('return_reports_url');
		if($return_reports_url)
		{
			\Fuel\Core\Response::redirect($return_reports_url);
		}

		\Fuel\Core\Response::redirect(\Uri::base().'staff/reports');
	}
}