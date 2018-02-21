<?php

/**
 * Stop date  class
 * @author NamNT
 * @date 18/06/2015
 */
class Model_Reservation extends Fuel\Core\Model_Crud {

	protected static $_primary_key = 'reservation_no';
	protected static $_table_name = 'reservation';
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	/**
	 * Check stop date
	 * @param type $sscode
	 * @param type $menu_code type = oil,wash,tire....
	 * @param type $date
	 */
	public function get_reserve_count($sscode, $start, $end, $menu_code, $pit_list) {
		$where_pit = '';
		if ($pit_list != null) {
			$where_pit = ' AND pit_no IN (' . $pit_list . ')';
		}

		$query = 'SELECT count(reservation_no) as reservation_count'
				. ' FROM reservation'
				. ' WHERE sscode = "' . $sscode . '"'
				. $where_pit
				. ' AND ((start_time >= "' . $start . '" AND start_time < "' . $end . '")'
				. ' OR (end_time > "' . $start . '" AND  end_time <= "' . $end . '")'
				. ' OR ("' . $start . '" >= start_time AND  end_time >= "' . $end . '"))';
		$result = DB::query($query)->as_object('Model_Reservation')->execute();

		return $result[0]->reservation_count;
	}

	public function get_reserve_count_by_menucode($sscode, $start, $end, $menu_code) {
		$query = 'SELECT count(reservation_no) as reservation_count'
				. ' FROM reservation'
				. ' WHERE sscode = "' . $sscode . '"'
				. ' AND menu_code = "' . $menu_code . '"'
				. ' AND ((start_time >= "' . $start . '" AND start_time < "' . $end . '")'
				. ' OR (end_time > "' . $start . '" AND  end_time <= "' . $end . '")'
				. ' OR ("' . $start . '" >= start_time AND  end_time >= "' . $end . '"))';
		$result = DB::query($query)->as_object('Model_Reservation')->execute();
		return $result[0]->reservation_count;
	}

	/*
	 * List reservation by member_id
	 *
	 * @since 23/06/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */

	public static function get_reservation_by_memberid($member_id) {
		$query = DB::select('*')
				->from(self::$_table_name)
				->where('member_id', $member_id)
				->where(DB::expr('start_time > NOW()'));

		return $query->execute()->as_array();
	}

	public function set_default_data() {
		$data = array();
		$fields = \DB::list_columns(self::$_table_name);
		foreach ($fields as $k => $v) {
			$data[$k] = $v['default'];
		}

		return $data;
	}

	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * @param type $data
	 * @param type $reservation_no
	 * @return id insert
	 */
	public function reservation_save($data, $reservation_no = '') {

		$user_info = \Fuel\Core\Session::get('user_info');

		if (!count($data))
			return array();

		$data['updated_at'] = date('Y-m-d H:i');
		$data['plate_no'] = mb_convert_kana($data['plate_no'], 'n');

		if (key_exists('car_year', $data))
			$data['car_year'] = (int) $data['car_year'];

		if (key_exists('car_month', $data))
			$data['car_month'] = (int) $data['car_month'];

		if (key_exists('car_grade_code', $data))
			$data['car_grade_code'] = (int) $data['car_grade_code'];

		if (key_exists('car_type_code', $data))
			$data['car_type_code'] = (int) $data['car_type_code'];



		$data_default = $this->set_default_data();

		foreach ($data as $key => $val) {
			if (!key_exists($key, $data_default)) {
				unset($data[$key]);
			}
		}

		if ($reservation_no == '') {
			$data['created_at'] = date('Y-m-d H:i');

			/*Have card*/
			if(\Fuel\Core\Session::get('user_info') != '')
			{
				$data['member_id'] = $user_info['member_kaiinCd'];
				$data['hashkey'] = hash('SHA256',$data['reservation_no'].time().uniqid());
			}

			/* No card*/
			if($data['member_id'] == 0)
			{
				$data['member_id'] = null;
				$data['hashkey'] = hash('SHA256',$data['reservation_no'].time().uniqid());
			}

			$reservation = static::forge();
			$reservation->set($data);
			$rs = $reservation->save();

			if (count($rs)) {
				$rs['reservation_no'] = $data['reservation_no'];
				return $rs;
			}

			return $rs;
		} else {
			$reservation = static::forge()->find_by_pk($reservation_no);
			if (count($reservation)) {
				$reservation->set($data);
				return $reservation->save();
			}

			return array();
		}
	}

	/**
	 * @param type $reservation_no
	 * @return array
	 */
	public function get_reservation_info($reservation_no) {
		$query = DB::select('*')
				->from(self::$_table_name)
				->where('reservation_no', '=', $reservation_no);
		$result = $query->execute()->as_array();
		if (count($result)) {
			return $result[0];
		}

		return array();
	}

	/*
	 * List reservation by haskey
	 *
	 * @since 06/10/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public function get_reservation_by_hashkey($hashkey) {
		$query = DB::select('*')
				->from(self::$_table_name)
				->where('hashkey', '=', $hashkey);
		$result = $query->execute()->as_array();
		if (count($result)) {
			return $result[0];
		}

		return array();
	}

	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * @param type $reservation_no
	 * @return boolean
	 */
	public function reservation_delete($reservation_no) {
		$rs = static::forge()->find_by_pk($reservation_no);
		if (count($rs)) {
			return $rs->delete();
		}

		return false;
	}

}
