<?php
/**
 * Stop date  class
 * @author NamNT
 * @date 18/06/2015
 */

class Model_Stopdate extends Fuel\Core\Model_Crud
{
	protected static $_primary_key = 'sscode';
	protected static $_table_name = 'stop_date';
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events'          => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events'          => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	/**
	 * Check stop date
	 * @param type $sscode 
	 * @param type $menu_code type = oil,wash,tire....
	 * @param type $date
	 */
	public function is_stop_date($sscode,$menu_code,$date)
	{
		
		$config['where'][] = array(
			'menu_code',
			'=',
			$menu_code,
		);
		$config['where'][] = array(
			'sscode',
			'=',
			$sscode,
		);
		$config['where'][] = array(
			'stop_date',
			'=',
			$date,
		);
		
		
		$rs = static::forge()->find($config);
		if($rs)
		{
			return true;
		}
		
		return false;
			
	}
}
