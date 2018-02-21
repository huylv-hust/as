<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of repairreport
 *
 * @author Seta
 */
class Model_Repairreport extends Fuel\Core\Model_Crud
{
	private $validation;
	private $error = array();
	protected static $_primary_key = 'repair_staff_id';
	protected static $_table_name = 'repair_report';

	function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
		$this->validation = Validation::instance();
	}

	public function validate($repair_date)
	{
		$start_time = $this->validation->input('start_time_h') * 60 + $this->validation->input('start_time_m');
		$end_time = $this->validation->input('end_time_h') * 60 + $this->validation->input('end_time_m');

		$staff_info = \Session::get('staff_info');

		if( ! trim($this->validation->input('repair_date')))
		{
			$this->error['repair_date_error'] = '必要です';
		}
		else
		{
			$date = explode('-',$this->validation->input('repair_date'));
			if( ! (count($date) == 3 && checkdate($date[1], $date[2], $date[0])))
			{
				$this->error['repair_date_error'] = '日付が正しくありません';
			}
			else
			{
				// TODO : check a date > now
				$now = date('Y-m-d');

				if($now < $this->validation->input('repair_date'))
				{
					$this->error['repair_date_error'] = '未来の日付を入力できません。';
				}
			}
		}

		if( ! trim($this->validation->input('work_code')))
		{
			$this->error['work_code_error'] = '必要です';
		}

		if(trim($this->validation->input('work_code')) == '1' && ! trim($this->validation->input('weather_code')))
		{
			$this->error['weather_code_error'] = '必要です';
		}

		if(trim($this->validation->input('work_code')) == '1' || trim($this->validation->input('work_code')) == '6')
		{
			if( ! trim($this->validation->input('sscode1')))
			{
				$this->error['sscode1_error'] = '必要です';
			}

			if(trim($this->validation->input('start_time_h')) == '' ||  trim($this->validation->input('start_time_m')) == '' )
			{
				$this->error['time_error'] = '必要です';
			}

			if(trim($this->validation->input('end_time_h')) == '' || trim($this->validation->input('end_time_m')) == '')
			{
				$this->error['time_error'] = '必要です';
			}
		}

		if(trim($this->validation->input('start_time_h')) || trim($this->validation->input('end_time_h')))
		{
			if( trim($this->validation->input('start_time_m')) == '' ||  trim($this->validation->input('end_time_m')) == '')
			{
				$this->error['time_error'] = '必要です';
			}
		}
		if(trim($this->validation->input('start_time_m')) || trim($this->validation->input('end_time_m')))
		{
			if( trim($this->validation->input('start_time_h')) == '' ||  trim($this->validation->input('end_time_h')) == '')
			{
				$this->error['time_error'] = '必要です';
			}
		}

		if(trim($this->validation->input('work_min_h')) < 0 || ! is_numeric($this->validation->input('work_min_h')))
		{
			$this->error['work_min_error'] = '正しくありません';
		}

		if(trim($this->validation->input('rule_piece_count')) < 0 || ! is_numeric($this->validation->input('rule_piece_count')))
		{
			$this->error['rule_piece_count_error'] = 'ゼロ以上の数字で入力してください.';
		}
		if(trim($this->validation->input('car_count')) < 0 || ! is_numeric($this->validation->input('car_count')))
		{
			$this->error['car_count'] = '必要です.';
		}

		if(trim($this->validation->input('sales_piece_count')) < 0 || ! is_numeric($this->validation->input('sales_piece_count')))
		{
			$this->error['sales_piece_count_error'] = 'ゼロ以上の数字で入力してください.';
		}

		if(trim($this->validation->input('price')) < 0 || ! is_numeric($this->validation->input('price')) || strlen($this->validation->input('price')) > 10)
		{
			$this->error['price_error'] = 'ゼロ以上の数字で入力してください.';
		}

		if(trim($this->validation->input('cancel_price') < 0 || ! is_numeric($this->validation->input('cancel_price'))) || strlen($this->validation->input('cancel_price')) > 10)
		{
			$this->error['cancel_price_error'] = 'ゼロ以上の数字で入力してください.';
		}

		if(trim($this->validation->input('cancel_count')) < 0 || ! is_numeric($this->validation->input('cancel_count')) || strlen($this->validation->input('cancel_count')) > 10)
		{
			$this->error['cancel_count_error'] = 'ゼロ以上の数字で入力してください.';
		}

		if(trim($this->validation->input('cost_price')) < 0 || ! is_numeric($this->validation->input('cost_price')) || strlen($this->validation->input('cost_price')) > 10)
		{
			$this->error['cost_price_error'] = 'ゼロ以上の数字で入力してください.';
		}

		if(mb_strlen($this->validation->input('note')) > 30)
		{
			$this->error['note'] = '30文字以内で入力してください.';
		}

		if($this->validation->input('sscode1') != '')
		{
			if($this->check_ss($this->validation->input('sscode1')) != '')
			{
				$this->error['sscode1_error'] = $this->check_ss($this->validation->input('sscode1'));
			}
		}

		if($this->validation->input('sscode2') != '')
		{
			if($this->check_ss($this->validation->input('sscode2')) != '')
			{
				$this->error['sscode2_error'] = $this->check_ss($this->validation->input('sscode2'));
			}
		}

		if($this->validation->input('start_time_h') && $this->validation->input('end_time_h'))
		{

			if($start_time > $end_time)
			{
				if( ! isset($this->error['time_error']))
				{
					$this->error['time_error'] = '正しくありません';
				}
			}
		}

		if (trim($this->validation->input('work_code')) == '1' && $start_time == $end_time)
		{
			$this->error['time_error'] = '必須です';
		}

		if(trim($this->validation->input('start_time_h')) > 23 || trim($this->validation->input('end_time_h')) > 23 )
		{
			$this->error['time_error'] = '正しくありません';

		}

		if(trim($this->validation->input('start_time_m')) > 59 || trim($this->validation->input('end_time_m')) > 59)
		{
			$this->error['time_error'] = '正しくありません';
		}

		if(trim($this->validation->input('repair_date')) != $repair_date)
		{
			if($this->check_duplicate($staff_info['repair_staff_id'], trim($this->validation->input('repair_date'))) != 0)
			{
				$this->error['repair_date_error'] = '入力した日付は既存にあります。別の日付を入力して下さい';
			}
		}

		if($this->validation->input('work_min_h') == '')
		{
			$this->error['work_min_error'] = '必要です';
		}

		if($this->validation->input('rule_piece_count') == '')
		{
			$this->error['rule_piece_count_error'] = '必要です';
		}

		if($this->validation->input('sales_piece_count') == '')
		{
			$this->error['sales_piece_count_error'] = '必要です';
		}

		if($this->validation->input('price') == '')
		{
			$this->error['price_error'] = '必要です';
		}

		if($this->validation->input('cancel_count') == '')
		{
			$this->error['cancel_count_error'] = '必要です';
		}

		if($this->validation->input('cancel_price') == '')
		{
			$this->error['cancel_price_error'] = '必要です';
		}

		if($this->validation->input('cost_price') == '')
		{
			$this->error['cost_price_error'] = '必要です';
		}

		if(strlen($this->validation->input('work_min_h')) > 10)
		{
			$this->error['work_min_error'] = '10桁以下の数字で入力してください';
		}

		if(strlen($this->validation->input('sales_piece_count')) > 10)
		{
			$this->error['sales_piece_count_error'] = '10桁以下の数字で入力してください';
		}

		if(strlen($this->validation->input('rule_piece_count')) > 10)
		{
			$this->error['rule_piece_count_error'] = '10桁以下の数字で入力してください';
		}

		if(strlen($this->validation->input('price')) > 10)
		{
			$this->error['price_error'] = '10桁以下の数字で入力してください';
		}

		if(strlen($this->validation->input('cancel_count')) > 10)
		{
			$this->error['cancel_count_error'] = '10桁以下の数字で入力してください';
		}

		if(strlen($this->validation->input('cancel_price')) > 10)
		{
			$this->error['cancel_price_error'] = '10桁以下の数字で入力してください';
		}

		if(strlen($this->validation->input('cost_price')) > 10)
		{
			$this->error['cost_price_error'] = '10桁以下の数字で入力してください';
		}
		if(strlen($this->validation->input('car_count')) > 10)
		{
			$this->error['car_count'] = '10桁以下の数字で入力してください';
		}
		if(count($this->error))
		{
			return false;
		}

		return true;
	}

	/*
	 * Validate year month
	 *
	 * @since 24/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function valadate_date($flag)
	{
		//get last month year
		$past_date = date("Y-m-d", strtotime("first day of last month"));
		$selected = array(
			'false' => date('Y', strtotime($past_date)),
			'true'  => date('Y'),
		);

		$current_month = abs(date("m"));
		$current_year = date('Y');
		$last_month = abs(date('m', strtotime($past_date)));
		$last_year = date('Y', strtotime($past_date));

		//set list year and month to view
		$list_year = array($current_year => $current_year);
		$list_month = array(
			$last_month    => $last_month,
			$current_month => $current_month,
		);

		//check year
		if($last_year == $current_year)
		{
			$year = $last_year;
		}
		else
		{
			$list_year = array(
				$last_year    => $last_year,
				$current_year => $current_year,
			);
			$v = $selected[$flag];
			if($v == $last_year)
			{
				$year = $last_year;
			}
			else
			{
				$year = $current_year;
			}
		}

		//check month
		if($last_year == $current_year)
		{
			$selected = array(
				'false' => $last_month,
				'true'  => $current_month,
			);
			$v = $selected[$flag];
			if($v == $last_month)
			{
				$month = $last_month;
			}
			else
			{
				$month = $current_month;
			}
		}
		else
		{
			if($flag == 'false')
			{
				$list_month = array($last_month => $last_month);
				$month = $last_month;
			}
			else
			{
				$list_month = array($current_month => $current_month);
				$month = $current_month;
			}
		}

		return array(
			'list_month' => $list_month,
			'list_year'  => $list_year,
			'month'      => $month,
			'year'       => $year,
		);
	}


	public function get_list_error()
	{
		return $this->error;
	}

	private function check_ss($sscode)
	{
		$rs = '';
		$ss = \Api::get_ss_name($sscode);

		if( ! preg_match('/^[0-9]{6}$/',$sscode))
		{
			$rs = '６桁の数字で入力してください.';
		}
		else if( ! count($ss))
		{
			$rs = '正しくありません';
		}

		return $rs;

	}
	public function check_duplicate($repair_staff_id,$repair_date)
	{
		$query = 'SELECT count(repair_staff_id) as count'
			.' FROM repair_report'
			.' WHERE repair_staff_id = "'.$repair_staff_id.'"'
			.' AND   repair_date = "'.$repair_date.'"'
		;
		$result = DB::query($query)->as_object('Model_Repairreport')->execute();
		return $result[0]->count;
	}

	public function get_repair_report_info($repair_staff_id,$repair_date)
	{
		$rs = array();
		$query = DB::select('*')
			->from(self::$_table_name)
			->where('repair_staff_id', $repair_staff_id)
			->where('repair_date',$repair_date);
		$rs = $query->execute()->as_array();
		if($rs)
		{
			return $rs[0];
		}
	}

	/*
	 * Get repair reports list
	 *
	 * @since 22/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_repair_reports_list($repair_staff_id, $year, $month)
	{
		//repair_date format = date('Y-m')
		$month = $month < 10 ? '0'.$month : $month;
		$repair_date = $year.'-'.$month;
		return DB::select('*')
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where(DB::expr("DATE_FORMAT(repair_date,'%Y-%m') = '{$repair_date}'"))
				->execute()->as_array();
	}

	/*
	 * Get total price from first month to now
	 *
	 * @since 29/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_total_price_fist($repair_staff_id, $month, $year)
	{
		$month = $month < 10 ? '0'.$month : $month;
		$first_date = $year.'-'.$month.'-01';
		$past_date = date("Y-m-d", strtotime("first day of last month"));
		$last_month = date('m', strtotime($past_date));

		$to_date = date('Y-m-d');
		if($month == $last_month)
		{
			$to_date = $year.'-'.$month.'-'.cal_days_in_month(CAL_GREGORIAN, $month ,$year);
		}

		$query = DB::select(DB::expr("SUM(price) as total"))
				->from(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where(DB::expr("repair_date >= '".$first_date."' AND repair_date <= '".$to_date."'"));

		$result = $query->execute()->as_array();
		if($result[0]['total'])
		{
			return $result[0]['total'];
		}

		return 0;
	}

	/*
	 * Get repair reports list
	 *
	 * @since 22/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function reports_delete($repair_staff_id, $repair_date)
	{
		return DB::delete(self::$_table_name)
				->where('repair_staff_id', $repair_staff_id)
				->where('repair_date', $repair_date)
				->execute();
	}
}
