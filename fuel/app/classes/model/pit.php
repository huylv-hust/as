<?php
/**
 * Pit class
 * @author NamNT
 * @date 18/06/2015
 */

class Model_Pit extends Fuel\Core\Model_Crud
{
	protected static $_primary_key = 'sscode';
	protected static $_table_name = 'pit';
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
	 * 
	 * @param type $sscode 
	 * @param type $menu_code type = oil,wash,tire....
	 * @param type $date
	 */
	public function get_pitcnt($sscode,$menu_code)
	{
		$query = DB::select(DB::expr('count(pit.pit_no) as pit_count'))
			->from(self::$_table_name)
			->join('pit_enable_menu')
			->on('pit_enable_menu.sscode', '=', 'pit.sscode')
			->on('pit_enable_menu.pit_no', '=', 'pit.pit_no');
		$query->where('pit.sscode', $sscode);
		$query->and_where('pit_enable_menu.menu_code', '=', $menu_code);
		$query->and_where('is_public', 1);
		$result = $query->execute()->as_array();
		
		return $result[0]['pit_count'];
		
			
	}
	/**
	 * @author NamDD
	 * @param type $sscode
	 * @param type $menu_code
	 * @return array object list pit
	 */
	public function get_list_pit_available($sscode, $menu_code)
	{
		if( ! $sscode)
			return array();
		if( ! $menu_code)
			return array();
		
		$sql = 'SELECT sscode,pit_no FROM pit_enable_menu WHERE sscode = "'.$sscode.'" AND menu_code = "'.$menu_code.'"';
		$rs = Fuel\Core\DB::query($sql)->execute();
		if(count($rs))
		{
			$_pit = '';
			foreach($rs as $_temp)
			{
				$_pit .= $_temp['pit_no'].',';
			}
			
			$_pit = trim($_pit,',');
			$sql_pit = 'SELECT sscode,pit_no FROM pit WHERE sscode = "'.$sscode.'" AND pit_no IN ('.$_pit.') AND is_public = 1';
			/*get pit public */
			$rs_pit = Fuel\Core\DB::query($sql_pit)->execute();
			return $rs_pit;
		}
		
		return array();
		
	}
	
	/**
	 * @author NamDD
	 * @param type $sscode
	 * @param type $menu_code
	 * @param type $start
	 * @param type $end
	 * @return  pit_no
	 */
	
	public function get_pit_no($sscode,$menu_code,$start,$end)
	{
		$rs_pit = $this->get_list_pit_available($sscode, $menu_code);
		if(count($rs_pit))
		{
			$arr_pit_no_available = array();
			$_pit_no = '';
			foreach($rs_pit as $_temp)
			{
				$arr_pit_no_available[] = $_temp['pit_no'];
				$_pit_no .= $_temp['pit_no'].',';
			}

			$_pit_no = trim($_pit_no,',');
			$sql_re = 'SELECT sscode,pit_no,COUNT(*) FROM reservation WHERE sscode ="'.$sscode.'" AND pit_no IN ('.$_pit_no.') AND ((start_time >= "'.$start.'" AND start_time < "'.$end.'") OR (end_time > "'.$start.'" AND  end_time <= "'.$end.'") OR ("'.$start.'" >= start_time AND  end_time >= "'.$end.'")) GROUP BY sscode,pit_no HAVING COUNT(*) > 0';
			$rs_pit_re = Fuel\Core\DB::query($sql_re)->execute();
			$arr_pit_no_is_booked = array();
			if(count($rs_pit_re))
			{
				foreach($rs_pit_re as $_temp)
				{
					$arr_pit_no_is_booked[] = $_temp['pit_no'];
				}
				
				$_arr_pit_no = array_diff($arr_pit_no_available, $arr_pit_no_is_booked);
				
				if(count($_arr_pit_no))
					return min($_arr_pit_no);

				return null;
			}
			else
			{
				$arr_pit_no_available = explode(',', $_pit_no);
				return min($arr_pit_no_available);
			}
		}
		
		return null;
	}

}
