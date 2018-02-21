<?php

/**
* Staff login controller
* 
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 26/06/2015
*/

namespace Staff;

class Controller_Login extends \Controller_Template
{
	public $template = 'template-staff';
	
	public function action_index()
	{
		$this->template->title = 'Usappyオートサービス管理';
		
		//is logged
		$staff_info =  \Session::get('staff_info');
		if($staff_info)
		{
			\Response::redirect(\Uri::base().'staff');
		}
		
		$data['error'] = null;
		if (\Input::method() == 'POST') 
		{
			$post = \Input::post();
			
			$staff_info = \Model_Repairestaff::get_staff_info($post['login_id'], $post['password']);
			if($staff_info)
			{
				//set session
				$staff_ses = array(
					'repair_staff_id' => $staff_info['repair_staff_id'],
					'staff_name'      => $staff_info['staff_name'],
				);

				\Session::set('staff_info', $staff_ses);
				\Session::set('last_activity', time());

				\Response::redirect(\Uri::base().'staff');
			}
			else
			{
				$data['error'] = 'ログインIDもしくはパスワードが正しくありません';
			}
		}
		
		$this->template->head = \View::forge('partials-staffs/head');
		//navigator
		$this->template->navigator = \View::forge('partials-staffs/navigator');
		//footer - footer of page
		$this->template->footer = \View::forge('partials-staffs/footer');
		//content
		$this->template->content = \View::forge('login/index', $data);
	}
	
}