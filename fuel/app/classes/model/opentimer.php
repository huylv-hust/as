<?php
/**
 * Open time  class
 * @author NamNT
 * @date 18/06/2015
 */

class Model_Opentimer extends Fuel\Core\Model_Crud
{
	protected static $_primary_key = 'open_timer_id';
	protected static $_table_name = 'open_timer';

	/**
	 * Check stop date
	 * @param type $sscode
	 * @param type $menu_code type = oil,wash,tire....
	 * @param type $date
	 */
	public function get_open_time_id($sscode,$menu_code,$date, $holidays)
	{
		$day = date('N',strtotime($date));
		$is_holiday = 0;
		if($day == 6 || $day == 7)
		{
			$is_holiday = 1;
		}


		$_date = explode('-',$date);
		$year = $_date[0];
		if(isset($holidays[$year][$_date[2].'-'.$_date[1]]))
		{
			$is_holiday = 1;
		}

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
			'is_holiday',
			'=',
			$is_holiday,
		);
		$config['where'][] = array(
			'start_date',
			'<=',
			$date,
		);
		$config['where'][] = array(
			'end_date',
			'>=',
			$date,
		);
		$config['limit'] = 1;

		$rs = static::forge()->find($config);
		if($rs)
		{
			return $rs[0]->open_timer_id;
		}
		else
		{
			$id = $this->get_open_time_from($sscode,$menu_code,$date, $is_holiday);
			if($id == -1)
			{
				return $this->get_open_time_id_default($sscode,$menu_code,$date, $is_holiday);
			}

			return $id;
		}

		return -1;

	}
	/**
	 *
	 * @param type $sscode
	 * @param type $menu_code
	 * @param type $date
	 * @return type
	 */
	public function get_open_time_id_default($sscode,$menu_code,$date,$is_holiday)
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
			'is_holiday',
			'=',
			$is_holiday,
		);
		$config['where'][] = array(
			'start_date',
			'=',
			null,
		);
		$config['where'][] = array(
			'end_date',
			'=',
			null,
		);
		$config['limit'] = 1;

		$rs = static::forge()->find($config);
		if($rs)
		{
			return $rs[0]->open_timer_id;
		}

		return -1;

	}

	public function get_open_time_from($sscode,$menu_code,$date, $is_holiday)
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
			'is_holiday',
			'=',
			$is_holiday,
		);
		$config['where'][] = array(
			'start_date',
			'<=',
			$date,
		);
		$config['where'][] = array(
			'end_date',
			'=',
			null,
		);
		$config['order_by'] = array('start_date' => 'desc');
		$config['limit'] = 1;

		$rs = static::forge()->find($config);
		if($rs)
		{
			return $rs[0]->open_timer_id;
		}

		return -1;

	}
}
