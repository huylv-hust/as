<?php
/**
 * Open time  class
 * @author NamNT
 * @date 23/06/2015
 */

class Model_Opentimerdetail extends Fuel\Core\Model_Crud
{
	protected static $_primary_key = 'open_timer_id';
	protected static $_table_name = 'open_timer_detail';

	/**
	 * Check stop date
	 * @param type $sscode
	 * @param type $menu_code type = oil,wash,tire....
	 * @param type $date
	 */
	public function get_list_open_time($sscode, $menu_code, $date)
	{
		$rs = array();
		$holidays = Fuel\Core\Config::load('isholidays',true);
		$model = new \Model_Opentimer();
		$id = $model->get_open_time_id($sscode, $menu_code, $date,$holidays);
		if($id == -1)
		{
			return $rs;
		}

		$config['where'][] = array(
			'open_timer_id',
			'=',
			$id,
		);
		$config['order_by'] = array('start_time' => 'ASC');

		$rs = static::forge()->find($config);
		return $rs;

	}
}
