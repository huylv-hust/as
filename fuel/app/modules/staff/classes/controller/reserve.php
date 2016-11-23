<?php

/**
 * Edit staff - Reserve controller
 *
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @since 09/07/2015
 */

namespace Staff;

class Controller_Reserve extends \Controller_Usappystaff
{
	public function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
	}

	/**
	 * Edit staff
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 09/07/2015
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';

		//session staff
		$staff_info = \Session::get('staff_info');
		$repair_staff_id = $staff_info['repair_staff_id'];

		$reservation_no = \Input::get('reservation_no');
		$repairreservation = \Model_Repairreservation::find_by_pk($reservation_no);

		//if record not fond
		if( ! $repairreservation || $repair_staff_id != $repairreservation->repair_staff_id)
		{
			\Response::redirect(\Uri::base().'staff');
		}

		$data['a_piece_count'] = $repairreservation->a_piece_count;
		$data['b_piece_count'] = $repairreservation->b_piece_count;

		//get list car maker
		//$list_car_maker = \Api::get_list_maker();
		//$data['list_maker_range'] = $this->create_array($list_car_maker, 'maker_code', 'maker');

		//get list car model
		$list_car_model = \Api::get_list_model($repairreservation->car_maker_code);
		$data['list_model_range'] = $this->create_array($list_car_model, 'model_code', 'model');

		//get list_type_code
		$list_type_code = \Api::get_list_type_code($repairreservation->car_maker_code, $repairreservation->car_model_code, $repairreservation->car_year);
		$data['list_type_code'] = $this->create_array($list_type_code, 'type_code', 'type');

		//get list_grade_code
		$list_grade_code = \Api::get_list_grade_code($repairreservation->car_maker_code, $repairreservation->car_model_code, $repairreservation->car_year, $repairreservation->car_type_code);
		$data['list_grade_code'] = $this->create_array($list_grade_code, 'grade_code', 'grade');

		//get car year
		$list_car_year = \Api::get_list_year_month($repairreservation->car_maker_code, $repairreservation->car_model_code);
		$data['list_car_year'] = $this->create_array($list_car_year, 'year', 'year');

		if ($repairreservation->image_keys_json !== null)
		{
			$data['image_keys'] = json_decode($repairreservation->image_keys_json, true);
		}

		if (\Input::method() == 'POST')
		{
			$post = \Input::post();
			$model = new \Model_Repairreservation();

			//get list code by api ajax after submit
			$list_car_model = \Api::get_list_model($post['car_maker_code']);
			$list_car_year  = \Api::get_list_year_month($post['car_maker_code'], $post['car_model_code']);
			$list_type_code = \Api::get_list_type_code($post['car_maker_code'], $post['car_model_code'], $post['car_year']);
			$list_grade_code = \Api::get_list_grade_code($post['car_maker_code'], $post['car_model_code'], $post['car_year'], $post['car_type_code']);

			//set value select after submit
			$data['list_model_range'] = $this->create_array($list_car_model, 'model_code', 'model');
			$data['list_car_year'] = $this->create_array($list_car_year, 'year', 'year');
			$data['list_type_code'] = $this->create_array($list_type_code, 'type_code', 'type');
			$data['list_grade_code'] = $this->create_array($list_grade_code, 'grade_code', 'grade');

			// repair images.
			$data['image_keys'] = (isset($post['image_keys']) and is_array($post['image_keys'])) ? $post['image_keys'] : array();

			$data['errors'] = array();
			if( ! $model->validate())
			{
				//get errors pass to view
				$data['errors'] = $model->get_list_errors();
			}
			else
			{
				$model->save_data($post);

				$return_staff_url = \Cookie::get('return_staff_url');
				if($return_staff_url)
				{
					\Fuel\Core\Response::redirect($return_staff_url);
				}

				\Fuel\Core\Response::redirect(\Uri::base().'staff');
			}
		}

		$data['repairreservation'] = $repairreservation;

		$this->template->content = self::view('reserve/index', $data);
	}

	/**
	 * Search ss
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 09/07/2015
	 */
	public function action_ss_search()
	{
		if (\Input::method() == 'POST')
		{
			$branch_code = \Input::post('branch');
			$keyword = \Input::post('ssname');
			$data = \api::search_ss(array('branch_code' => $branch_code, 'keyword' => $keyword));

			$content_type = array('Content-type' => 'application/json');
			return new \Response(json_encode($data), 200, $content_type);
		}

		return false;
	}

	/**
	 * Ajax reserve
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 13/07/2015
	 */
	public function action_ajax()
	{
		if (\Input::method() != 'POST')
		{
			return false;
		}

		$maker_code = \Input::post('car_maker_code','');
		$model_code = \Input::post('car_model_code','');
		$year = \Input::post('car_year','');
		$type_code = \Input::post('car_type_code','');
		$level = \Input::post('level','');
		if($maker_code && $model_code && $year && $type_code && $level == 4)
		{
			$list_grade_code = \Api::get_list_grade_code($maker_code,$model_code,$year,$type_code);
			return new \Response(\Constants::array_to_option($list_grade_code,'grade_code','grade'), 200,array());
		}

		if($maker_code && $model_code && $year && $level == 3)
		{
			$list_type_code = \Api::get_list_type_code($maker_code,$model_code,$year);
			return new \Response(\Constants::array_to_option($list_type_code,'type_code','type'), 200,array());
		}

		if($maker_code && $model_code && $level == 2)
		{
			$list_year = \Api::get_list_year_month($maker_code,$model_code);
			return new \Response( \Constants::array_to_option($list_year,'year','year'), 200,array() );
		}

		if($maker_code && $level == 1)
		{
			$list_model_code = \Api::get_list_model($maker_code);
			return new \Response(\Constants::array_to_option($list_model_code,'model_code','model'), 200,array());
		}

		return false;
	}

	/**
	 * Delete reserve
	 *
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 * @since 13/07/2015
	 */
	public function action_delete()
	{
		if (\Input::method() == 'POST')
		{
			$reservation_no = \Input::post('reservation_no');
			$repairreservation = \Model_Repairreservation::find_by_pk($reservation_no);
			if($repairreservation)
			{
				$repairreservation->delete();

				return true;
			}

			return false;
		}
	}

	public function create_array($data, $key, $value)
	{
		if( ! $data)
		{
			return array();
		}

		if(isset($data[0][$key]))
		{
			return \Utility::array_column($data, $value, $key);
		}

		return array();
	}
}
