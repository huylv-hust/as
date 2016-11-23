<?php

/**
* Staff login controller
*
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 03/07/2015
*/

class Model_Repairreservation extends Fuel\Core\Model_Crud
{
	private $validation;
	private $errors = array();

	protected static $_primary_key = 'reservation_no';
	protected static $_table_name = 'repair_reservation';
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

	public function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
		$this->validation = \Validation::instance();
	}

	/*
	 * Validate staff info booking
	 *
	 * @since 10/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public function validate()
	{
		$max_length = 2147483647;
		if( ! $this->validation->input('sscode'))
		{
			$this->errors['sscode'] = '必須です';
		}

		if($this->validation->input('sscode') && ! is_numeric($this->validation->input('sscode')))
		{
			$this->errors['sscode'] = '数字で入力してください';
		}

		if($this->validation->input('sscode') && strlen($this->validation->input('sscode')) != 6)
		{
			$this->errors['sscode'] = 'SSコードは6桁の数字で入力してください';
		}

		if( ! \Api::search_ss(array('sscode' => $this->validation->input('sscode'))))
		{
			$this->errors['sscode'] = '正しくありません';
		}

		if( ! $this->validation->input('arrival_time_date'))
		{
			$this->errors['arrival_time_date'] = '必須です';
		}

		if($this->validation->input('price') == null)
		{
			$this->errors['price'] = '必須です';
		}

		if($this->validation->input('price') && ! is_numeric($this->validation->input('price')))
		{
			$this->errors['price'] = '数字で入力してください';
		}

		if( ! $this->validation->input('plate_no'))
		{
			$this->errors['plate_no'] = '必須です';
		}

		if( ! is_numeric($this->validation->input('plate_no')))
		{
			$this->errors['plate_no'] = '数字で入力してください';
		}

		if( ! $this->validation->input('car_maker_code'))
		{
			$this->errors['car_maker_code'] = '必須です';
		}

		if($this->validation->input('car_model_code') == null || $this->validation->input('car_model_code') == 0)
		{
			if( ! $this->validation->input('check_model_code')){
				$this->errors['check_model_code'] = '必須です';
			}
		}

		if( ! preg_match('/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/', $this->validation->input('arrival_time_date')))
		{
			$this->errors['arrival_time_date'] = '利用の期間が正しくありません';
		}

		if($this->validation->input('arrival_time_date') && $this->validation->input('return_time_date')){
			$arrival_time = $this->validation->input('arrival_time_date').' '.$this->validation->input('arrival_time_hh').':'.$this->validation->input('arrival_time_mm').':00';
			$return_time  = $this->validation->input('return_time_date').' '.$this->validation->input('return_time_hh').':'.$this->validation->input('return_time_mm').':00';
			if(strtotime($arrival_time) >= strtotime($return_time)){
				$this->errors['return_time_date'] = '入庫予定には納車予定より過去を指定して下さい。';
			}
		}

		if($this->validation->input('a_piece_count') == null)
		{
			$this->errors['a_piece_count'] = '必須です';
		}

		if($this->validation->input('b_piece_count') == null)
		{
			$this->errors['b_piece_count'] = '必須です';
		}

		$a_piece_count = trim($this->validation->input('a_piece_count'));
		if($a_piece_count != null && ( ! is_numeric($a_piece_count) || $a_piece_count < 0))
		{
			$this->errors['a_piece_count'] = '数字で入力してください';
		}

		if($a_piece_count != null && $a_piece_count > $max_length)
		{
			$this->errors['a_piece_count'] = '正しくありません';
		}

		$total_piece = $this->validation->input('a_piece_count') + $this->validation->input('b_piece_count');
		if($total_piece <= 0){
			$this->errors['b_piece_count'] = 'ピース数を入力して下さい';
		}

		$rule = '/[^ｦ-ﾟ0-9\-\+\s\(\)]/u'; // is fullsize
		if(preg_match($rule, $this->validation->input('a_piece_count')))
		{
			$this->errors['a_piece_count'] = '数字で入力してください';
		}

		if(preg_match($rule, $this->validation->input('b_piece_count')))
		{
			$this->errors['b_piece_count'] = '数字で入力してください';
		}

		$b_piece_count = $this->validation->input('b_piece_count');
		if($b_piece_count != null && ( ! is_numeric($b_piece_count) || $b_piece_count < 0))
		{
			$this->errors['b_piece_count'] = '数字で入力してください';
		}

		if($b_piece_count != null && $b_piece_count > $max_length)
		{
			$this->errors['b_piece_count'] = '正しくありません';
		}

		$validate_arrival = $this->validate_date($this->validation->input('arrival_time_date'), $this->validation->input('arrival_time_hh'), $this->validation->input('arrival_time_mm'));
		if($validate_arrival === 'not-exists')
		{
			$this->errors['arrival_time_date'] = '利用の期間が正しくありません';
		}

		if($this->validation->input('return_time_date') && ! preg_match('/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/', $this->validation->input('return_time_date')))
		{
				$this->errors['return_time_date'] = '利用の期間が正しくありません';
		}

		$validate_return = $this->validate_date($this->validation->input('return_time_date'), $this->validation->input('return_time_hh'), $this->validation->input('return_time_mm'));
		if($this->validation->input('return_time_date') && $validate_return === 'not-exists')
		{
			$this->errors['return_time_date'] = '利用の期間が正しくありません';
		}

		if($this->validation->input('return_time_hh') > 0 || $this->validation->input('return_time_mm') > 0)
		{
			if( ! $this->validation->input('return_time_date'))
			{
				$this->errors['return_time_date'] = '利用の期間が正しくありません';
			}
		}

		if($this->validation->input('arrival_time_date') && $this->validation->input('return_time_date'))
		{
			$arrival_time_hh = $this->validation->input('arrival_time_hh');
			$arrival_time_mm = $this->validation->input('arrival_time_mm');
			$arrival_time_date = strtotime($this->validation->input('arrival_time_date').' '.$arrival_time_hh.':'.$arrival_time_mm.':00');
			$return_time_hh = $this->validation->input('return_time_hh');
			$return_time_mm = $this->validation->input('return_time_mm');
			$return_time_date = strtotime($this->validation->input('return_time_date').' '.$return_time_hh.':'.$return_time_mm.':00');
			if($arrival_time_date > $return_time_date)
			{
				$this->errors['return_time_date'] = '入庫予定が納車予定より過去を修正して下さい。';
			}
		}

		if(strlen($this->validation->input('plate_no')) != 4)
		{
			$this->errors['plate_no'] = '4桁の数字で入力してください';
		}

		if($this->validation->input('price') > $max_length)
		{
			$this->errors['price'] = '正しくありません';
		}

		if($this->validation->input('color_number') && ! preg_match('/^[a-zA-Z0-9]+$/', $this->validation->input('color_number')))
		{
			$this->errors['color_number'] = '半角英数字の10桁以内で入力してください';
		}

		if($this->errors)
		{
			return false;
		}

		return true;
	}

	public function validate_date($date, $hours, $minute)
	{
		//validate date
		$rule = '/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/';
		if( ! preg_match($rule, $date))
		{
			return 'not-exists';
		}

		$date_month = explode('-', $date);
		if( ! checkdate($date_month[1], $date_month[2], $date_month[0]))
		{
			return 'not-exists';
		}

		$input_date = strtotime($date.' '.$hours.':'.$minute.':00');
		$now_date   = strtotime(date('Y-m-d H:i:s'));
		if($input_date < $now_date)
		{
			return 'past';
		}

		return true;
	}


	/*
	 * Get list error validate
	 *
	 * @since 10/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public function get_list_errors()
	{
		return $this->errors;
	}


	/*
	 * Get staff info
	 *
	 * @since 26/06/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_repair_reservation_list($repair_staff_id, $nowdate = true, $limit = null, $offset = null, $keyword = array())
	{
		$query = DB::select('*')
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id);
		if($nowdate)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') = '".date('Y-m-d')."'"));
		}

		if(isset($keyword['arrival_time']) && $keyword['arrival_time'] != null)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') >= '".$keyword['arrival_time']."'"));
		}

		if(isset($keyword['return_time']) && $keyword['return_time'] != null)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') <= '".$keyword['return_time']."'"));
		}

		$query->order_by('arrival_time', 'desc');

		if($limit)
		{
			$query->limit($limit);
		}

		if($offset)
		{
			$query->offset($offset);
		}

		return $query->execute()->as_array();
	}

	/*
	 * Get total piece count
	 *
	 * @since 21/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_total_piece_count($repair_staff_id, $keyword = array(), $type = 'a_piece_count')
	{
		$query = DB::select(DB::expr("SUM($type) as total"))
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id);

		if(isset($keyword['arrival_time']) && $keyword['arrival_time'] != null)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') >= '".$keyword['arrival_time']."'"));
		}

		if(isset($keyword['return_time']) && $keyword['return_time'] != null)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') <= '".$keyword['return_time']."'"));
		}

		$result = $query->execute()->as_array();

		if($result)
		{
			return $result[0]['total'];
		}

		return 0;
	}

	/*
	 * Get total piece join repair_reports
	 *
	 * @since 23/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_total_piece_count_reports($repair_staff_id, $arrival_time, $percen = false)
	{
		$current_year = date('Y', strtotime($arrival_time));
		$current_month = date('m', strtotime($arrival_time));
		$first_date = $current_year.'-'.$current_month.'-01';

		$query = DB::select(DB::expr("(SUM(a_piece_count) + SUM(b_piece_count)) as total"))
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id);
		if( ! $percen)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') = '".$arrival_time."'"));
		}

		if($percen)
		{
			$query->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') >= '".$first_date."' AND DATE_FORMAT(arrival_time,'%Y-%m-%d') <= '".$arrival_time."'"));
		}

		$result = $query->execute()->as_array();

		if($result)
		{
			return $result[0]['total'];
		}
	}

	/*
	 * Get total price remain
	 *
	 * @since 29/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_total_price_remain($repair_staff_id, $month, $year)
	{
		$month = $month < 10 ? '0'.$month : $month;
		$past_date = date("Y-m-d", strtotime("first day of last month"));
		$last_month = date('m', strtotime($past_date));

		//if is last month
		if($month == $last_month)
		{
			return 0;
		}

		$query = DB::select(DB::expr("SUM(price) as total"))
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where(DB::expr("DATE_FORMAT(arrival_time,'%Y-%m-%d') > '".date('Y-m-d')."' AND DATE_FORMAT(arrival_time,'%Y-%m-%d') <= '".date('Y-m-t')."'"));

		$result = $query->execute()->as_array();
		if($result[0]['total'])
		{
			return $result[0]['total'];
		}

		return 0;
	}

	/*
	 * Save data
	 *
	 * @since 10/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function save_data($data)
	{
		$reservation_no = $data['reservation_no'];

		$image_keys_json = null;
		if (isset($data['image_keys']) and is_array($data['image_keys']))
		{
			$image_keys_json = json_encode($data['image_keys']);
		}

		$db = array(
			'sscode'             => $data['sscode'],
			'a_piece_count'      => $data['a_piece_count'] == null ? 0 : $data['a_piece_count'],
			'b_piece_count'      => $data['b_piece_count'] == null ? 0 : $data['b_piece_count'],
			'arrival_time'       => $data['arrival_time_date'].' '.$data['arrival_time_hh'].':'.$data['arrival_time_mm'].':00',
			'price'              => $data['price'],
			'plate_no'           => $data['plate_no'],
			'car_maker_code'     => $data['car_maker_code'] != '' ? $data['car_maker_code'] : null,
			'car_model_code'     => $data['car_model_code'] != '' ? $data['car_model_code'] : null,
			'car_type_code'      => $data['car_type_code'] != '' ? $data['car_type_code'] : null,
			'car_year'           => $data['car_year'] != '' ? $data['car_year'] : null,
			'car_month'          => $data['car_month'] != '' ? $data['car_month'] : null,
			'car_grade_code'     => $data['car_grade_code'] != '' ? $data['car_grade_code'] : null,
			'car_color_code'     => $data['car_color_code'] != '' ? $data['car_color_code'] : null,
			'is_car_request'     => $data['is_car_request'] != '' ? $data['is_car_request'] : null,
			'is_shuttle_request' => $data['is_shuttle_request'] != '' ? $data['is_shuttle_request'] : null,
			'image_keys_json'    => $image_keys_json,
			'color_number'       => $data['color_number'] != '' ? $data['color_number'] : null,
			'updated_at'         => date('Y-m-d H:i:s'),
		);

		if($data['return_time_date'])
		{
			$db['return_time'] = $data['return_time_date'].' '.$data['return_time_hh'].':'.$data['return_time_mm'].':00';
		}
		else
		{
			$db['return_time'] = null;
		}

		return DB::update(self::$_table_name)
				->set($db)
				->where('reservation_no', $reservation_no)
				->execute();
	}
}
