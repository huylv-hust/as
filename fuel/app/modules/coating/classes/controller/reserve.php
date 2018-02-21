<?php

/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 2/06/2015
 */
namespace Coating;
use \Model\Pit;
class Controller_Reserve extends \Controller_Booking
{
	
	public function action_index()
	{
		$this->reserve_calendar();
	}
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * form User
	 * @return \Response
	 */
	public function action_form()
	{
		//$pit = new \Model_Pit();
		//$pit_no = $pit ->get_pit_no('112737','tire','2015-08-07', '2015-08-09');
		$this->form();
	}
	
	public function action_check()
	{
		$this->check();
	}
	public function action_save()
	{
		$this->save();
		
	}
	public function action_complete()
	{
		$this->complete();
	}
	public function action_time()
	{
		$this->time_calendar();
	}
}
