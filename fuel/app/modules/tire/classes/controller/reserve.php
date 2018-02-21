<?php
namespace Tire;
use \Model\Pit;

class Controller_Reserve extends \Controller_Booking
{
	/**
	 * Search
	 * @author NamNT
	 * @since 1.0.0
	 * @param
	 * @return 
	*/
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
