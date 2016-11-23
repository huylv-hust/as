<?php
/**
 * Menu setting  class
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 16/06/2015
 */

class Model_Menusetting extends Fuel\Core\Model_Crud
{
	protected static $_primary_key = 'sscode';
	protected static $_table_name = 'menu_setting';
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
	 * get list sscode availbale for map
	 * @param type $list_ss_code list sscode for search
	 * @param type $menu_code type = oil,wash,tire....
	 */
	public function get_list_available_sscode($list_ss_code,$menu_code)
	{
		if( ! count($list_ss_code))
		{
			return array();
		}

		if($menu_code == '')
		{
			return array();
		}


		$config['where'][] = array(
			'menu_code',
			'=',
			$menu_code,
		);

		$list_ss = $this->check_sscode_open_time($list_ss_code, $menu_code);
		$list_ss_code_available = array();
		if(count($list_ss))
		{
			foreach($list_ss as $_temp)
			{
				$list_ss_code_available[] = $_temp['sscode'];
			}

			$config['where'][] = array(
				'sscode',
				'IN',
				$list_ss_code_available,
			);

			$rs = static::forge()->find($config);
			return $rs;
		}

		return array();

	}


	public function check_sscode_open_time($list_ss_code,$menu_code)
	{
		$list_ss_code = implode(',', $list_ss_code);
		$sql = 'SELECT a.open_timer_id,a.sscode,a.menu_code FROM open_timer AS a INNER JOIN open_timer_detail AS b ON a.open_timer_id = b.open_timer_id WHERE a.sscode IN ('.$list_ss_code.') AND a.menu_code = "'.$menu_code.'" GROUP BY a.sscode';
		$rs = Fuel\Core\DB::query($sql)->execute();
		return $rs;
	}
	public function get_max_parallel_count($sscode,$menu_code)
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

		$rs = static::forge()->find($config);
		if( ! $rs)
		{
			return 0;
		}

		return $rs[0]->max_parallel_count;

	}
}
