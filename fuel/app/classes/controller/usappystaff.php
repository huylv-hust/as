<?php
/**
* Usappy staff
* 
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 03/07/2015
*/

class Controller_Usappystaff extends Controller_Template
{
	public $template = 'template-staff';
	
	/**
	* Check staff login
	* 
	* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	* @since 03/07/2015
	*/
	public function before()
	{
		parent::before();
		
		//check staff permistion
		$staff_info =  \Session::get('staff_info');
		if( ! $staff_info)
		{
			\Response::redirect(\Uri::base().'staff/login');
		}
		
		//session destroy after 30 minutes
		$last_activity = \Session::get('last_activity');
		if ($last_activity && (time() - $last_activity > 1800)) {
			// last request was more than 30 minutes ago
			\Session::destroy();     // unset $_SESSION variable for the run-time 
			\Response::redirect(\Uri::base().'staff/login');
		}
		
		//set sesstion
		\Session::set('staff_info', $staff_info);
		\Session::set('last_activity', time());
		
		
		$this->template->head = self::view('partials-staffs/head');
		//navigator
		$this->template->navigator = self::view('partials-staffs/navigator');
		//footer - footer of page
		$this->template->footer = self::view('partials-staffs/footer');
		
	}

	/**
	* Load view for PC and Mobile
	* 
	* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	* @since 03/07/2015
	*/
	public static function view($file, $data = array())
	{
		return (View::forge($file, $data));
	}
}
