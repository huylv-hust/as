<?php

/**
* Repair Staff Plan
* 
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 22/07/2015
*/

class Model_Repairstaffplan extends Fuel\Core\Model_Crud
{
	protected static $_primary_key = array(
		'repair_staff_id',
		'year',
		'month',
	);
	protected static $_table_name = 'repair_staff_plan';
	
	/*
	 * Get list by repair_staff_id
	 *
	 * @since 22/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_list($repair_staff_id, $year)
	{
		return DB::select('*')
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where('year', $year)
				->execute()
				->as_array();
	}
	
	/*
	 * Get info by repair_staff_id
	 *
	 * @since 23/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_info($repair_staff_id, $year, $month)
	{
		$result = DB::select('*')
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where('year', $year)
				->where('month', $month)
				->execute()
				->as_array();
		if($result)
		{
			return $result[0]['piece_count'];
		}
		
		return 0;
	}
	
	/*
	 * Delete all
	 *
	 * @since 22/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function delete_all($repair_staff_id, $year)
	{
		return DB::delete(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where('year', $year)
				->execute();
	}
	
	/*
	 * Validate data
	 *
	 * @since 27/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function validate($post)
	{
		$max_length = 2147483647; //2^31 - 1
		if( !is_array($post['month']))
		{
			return false;
		}
		
		$flag = true;
		$data['error'] = array();
		//validate input data
		foreach ($post['month'] as $key => $value)
		{
			if($value && ( ! is_numeric($value) || $value < 0))
			{
				$flag = false;
				$data['error'][$key] = '数字で入力してください';
			}
			
			if($value != null && $value > $max_length)
			{
				$flag = false;
				$data['error'][$key] = '正しくありません';
			}
		}
		
		$data['flag'] = $flag;
		
		return $data;
	}
	
	/*
	 * Save data
	 *
	 * @since 22/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function register($data, $repair_staff_id)
	{
		if ( ! $data)
		{
			return false;
		}
		
		foreach ($data['month'] as $key => $value)
		{
			$insert = array(
				'repair_staff_id' => $repair_staff_id,
				'year'            => $data['year'],
				'month'           => $key,
				'piece_count'     => $value != null ? $value : 0,
				'created_at'      => date('Y-m-d H:i:s'),
				'updated_at'      => date('Y-m-d H:i:s'),
			);
			
			DB::insert(self::$_table_name)
			->set($insert)
			->execute();
		}

	}
}