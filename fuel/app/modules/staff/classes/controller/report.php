<?php

/**
 * Staff default controller
 * 
 * @author NamNT
 * @since 09/07/2015
 */

namespace Staff;

class Controller_Report extends \Controller_Usappystaff
{

	/**
	 * Index
	 * 
	 * @author NamNT
	 * @since 09/07/2015
	 */
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';
		$model = new \Model_repairreport;
		$error = array();
		$datas = array();
		$staff_info = \Session::get('staff_info');
		$data['info'] = null ;
		$repair_date  = null ;
		
		if((\Input::get('repair_date')))
		{
			$repair_date = \Input::get('repair_date');
			if($model->check_duplicate($staff_info['repair_staff_id'],$repair_date) == 0)
			{
				\Response::redirect('staff/reports?result=1');
			}
		}
		
		$data['info'] = $model->get_repair_report_info($staff_info['repair_staff_id'],$repair_date);
		
		if(\Input::method() == 'POST')
		{
			$datas = \Input::post();
			$datas['repair_staff_id'] = $staff_info['repair_staff_id'];
			$datas['start_time'] = \Input::post('start_time_h') * 60 + \Input::post('start_time_m');
			$datas['end_time']   = \Input::post('end_time_h') * 60 + \Input::post('end_time_m');
			$datas['work_min']   = \Input::post('work_min_h') * 60 + \Input::post('work_min_m');
			$datas['updated_at'] = date('Y-m-d H:i:s');
			unset($datas['start_time_h'],$datas['start_time_m'],$datas['end_time_h'],$datas['end_time_m'],$datas['work_min_h'],$datas['work_min_m']);
			
			if( ! $model ->validate($repair_date))
			{
				$error = $model->get_list_error();
			}
			else
			{
				if((\Input::get('repair_date')))
				{
					try {
						\DB::update('repair_report')
						->set($datas)
						->where('repair_date', \Input::get('repair_date'))
						->where('repair_staff_id',$staff_info['repair_staff_id'])
						->execute();
					}catch (\Exception $e) {
						\Response::redirect('staff/reports?result=2');
					}	
				}
				else
				{
					try {
						$datas['created_at'] = date('Y-m-d H:i:s') ;
						\DB::insert('repair_report')
						->set($datas)
						->execute();
					}catch (\Exception $e) {
						\Response::redirect('staff/reports?result=2');
					}
				}

				$return_reports_url = \Cookie::get('return_reports_url');
				if($return_reports_url)
				{
					\Fuel\Core\Response::redirect($return_reports_url);
				}

				\Response::redirect('staff/reports?result=0');
			}
		}
		
		$data['error'] = $error ;
		$this->template->content = self::view('report/index',$data);
		$this->template->content->ssfinder = self::view('partials/ssfinder');
		
	}
	
	public function action_search_ss()
	{
		$branch = \Input::param('branch');
		$key = \Input::param('ssname');
		
		$data = \api::search($branch, $key);
		$content_type = array('Content-type' => 'application/json');
		return new \Response(json_encode($data), 200, $content_type);
	}
	public function action_delete_report()
	{
		$date = \Input::param('date');
		$id   = \Input::param('id');
		
		$result = \DB::delete('repair_report')
				->where('repair_date', $date)
				->where('repair_staff_id', $id)
				->execute();
		exit();

	}		
	
}	