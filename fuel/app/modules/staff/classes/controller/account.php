<?php

/**
* Staff user account
* 
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 24/07/2015
*/

namespace Staff;

class Controller_Account extends \Controller_Usappystaff
{
	public $template = 'template-staff';
	
	public function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
	}
	
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';
		
		$staff_session = \Session::get('staff_info');
		$repair_staff_id = $staff_session['repair_staff_id'];
		
		$data['errors'] = array();
		if (\Input::method() == 'POST')
		{
			$post = \Input::post();
			
			$model = new \Model_Repairestaff();
			
			if( ! $model->validate())
			{
				//get errors pass to view
				$data['errors'] = $model->get_list_errors();
			}
			else
			{
				if($model->update_password($repair_staff_id, $post['password']))
				{
					$data['status'] = true;
				}
			}
		}
		
		$this->template->content = self::view('account/index', $data);
	}
	
}