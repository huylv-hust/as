<?php

/**
 * Plan of staff
 *
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @since 21/07/2015
 */

namespace Staff;

class Controller_Plan extends \Controller_Usappystaff
{
	/**
	 * Setting plan
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 21/07/2015
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';

		$staff_info = \Session::get('staff_info');
		$repair_staff_id = $staff_info['repair_staff_id'];

		//check year
		$year = \Input::get('year');
		$current_year = date('Y');
		if($year != $current_year && $year != ($current_year + 1))
		{
			$year = $current_year;
		}

		//get repair staff plan
		$repair_staff_plan = \Model_Repairstaffplan::get_list($repair_staff_id, $year);
		if($repair_staff_plan)
		{
			$data['repair_staff_plan'] = \Utility::array_column($repair_staff_plan, 'piece_count', 'month');
		}

		$data['error'] = array();
		if (\Input::method() == 'POST')
		{
			$post = \Input::post();

			//validate input data
			$validate = \Model_Repairstaffplan::validate($post);

			if($validate['flag'] == true)
			{
				//save data
				\Model_Repairstaffplan::delete_all($repair_staff_id, $post['year']);
				\Model_Repairstaffplan::register($post, $repair_staff_id);

				$data['status'] = true;
			}
			else
			{
				$data['error'] = $validate['error'];

			}
		}

		$data['active_year'] = $year;

		$this->template->content = self::view('plan/index', $data);
	}

}