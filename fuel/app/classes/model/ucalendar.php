<?php
/**
 * Ureserve class
 * @author NamNT
 * @date 18/06/2015
 */

class Model_Ucalendar extends Fuel\Core\Model_Crud
{
	private $sscode;
	private $menucode;

	function __construct($sscode,$menucode)
	{
		$this->menucode = $menucode;
		$this->sscode = $sscode;
	}

	public function get_calendar_status_of_month($step)
	{
		//TODO : noww => now + 2day ==> get year + month
		// view date voi step = 0 now1= now + 2day  => () now = now1 + now1.month + $step
		$now = date_create(date('Y-m-d'));
		date_add($now,date_interval_create_from_date_string('2 days'));
		$now = date_create(date_format($now,'Y-m-1'));
		date_add($now,date_interval_create_from_date_string($step.' month'));

		$now = date_format($now,'Y-m-d');

		$d = explode('-',$now);
		$y = $d[0];
		$m = $d[1];

		return $this->get_reservation_status_of_month($y,$m, $step);
	}
	// True / False check date thuoc now + 2 -> now + 90
	public function is_rang_booking($date,$step = 0)
	{
		$ago_2day = date_format(date_add(date_create(date('Y-m-d')),date_interval_create_from_date_string('2 days')),'Y-m-d');
		$ago_90day = date_format(date_add(date_create(date('Y-m-d')),date_interval_create_from_date_string('90 days')),'Y-m-d');

		if((strtotime($date) + $step * 24 * 60 * 60) >= strtotime($ago_2day) && strtotime($ago_90day) >= (strtotime($date) + $step * 24 * 60 * 60))
		{
			return true;
		}

		return false;
	}
	// TODO : them 1 status 3
	private function get_reservation_status_of_month($y, $m, $step)
	{
		$result1['next'] = 0;
		// 対象月の末日を取得
		$end_of_month = date('t', mktime(23, 59, 59, $m + 1 , 0, $y));
		// max_parallel_count取得
		$menu_setting_model = new \Model_Menusetting();
		$pit_model = new \Model_Pit();

		$max = $menu_setting_model->get_max_parallel_count($this->sscode,$this->menucode);
		$result = [];
		//$date_of_month = 1;
		for($i = 1; $i <= $end_of_month; $i++)
		{
			$date = sprintf('%s-%02d-%02d', $y, $m, $i);
			if($this->is_rang_booking($date))
			{
				$result['calendar'][$date] = $this->is_reservable_day($date,$max);
			}
			else
			{
				$result['calendar'][$date] = 3;
			}
		}

		$result['year'] = $y;
		$result['month'] = sprintf('%02d',$m);
		$result['prev'] = 1;
		$result['step'] = $step;
		$result['start_day'] = date('N',strtotime(sprintf('%s-%02d-%02d', $y, $m, 1)));
		$result['end_day'] = $end_of_month;

		if($step == 0)
		{
			$result['prev'] = 0;
		}

		if($this->is_rang_booking($date,1))
		{
			$result['next'] = 1;
		}

		$result = $result + $result1;
		return $result;
	}

	public function get_reservation_status_of_day($y, $m, $d)
	{
		$result = array();
		$result1['next'] = 0;
		$result1['prev'] = 0;
		// 対象月の末日を取得
		$date = sprintf('%s-%02d-%02d', $y, $m, $d);

		if($this->is_rang_booking($date,1))
		{
			$result1['next'] = 1;
		}

		if($this->is_rang_booking($date,-1))
		{
			$result1['prev'] = 1;
		}

		if( ! $this->is_rang_booking($date,0))
		{
			$result1['next'] = 1;
			$result1['prev'] = 0;
			$result = $result + $result1;
			return $result;
		}

		$is_holyday = $this->check_is_holiday($date);

		if($is_holyday != 2)
		{
			$result = $result + $result1;
			return $result;
		}

		$menu_setting_model = new \Model_Menusetting();
		$pit_model = new \Model_Pit();
		$max = $menu_setting_model->get_max_parallel_count($this->sscode,$this->menucode);
		$opentime_model = new \Model_Opentimerdetail();
		$list_open_time = $opentime_model->get_list_open_time($this->sscode,$this->menucode,$date);

		if( ! $list_open_time)
		{
			$result = $result + $result1;
			return $result;
		}

		$result = $this->is_reservable_by_date($list_open_time,$date,$max);

		$result = $result + $result1;
		return $result;
	}
	private function check_is_holiday($date)
	{
		$stop_date_model = new \Model_Stopdate();
		if($stop_date_model->is_stop_date($this->sscode,$this->menucode,$date))
		{
			return 0;
		}

		$opentime_model = new \Model_Opentimerdetail();
		$list_open_time = $opentime_model->get_list_open_time($this->sscode,$this->menucode,$date);

		if( ! $list_open_time)
		{
			return 1;
		}

		return 2;
	}


	public function is_reservable_day($date, $max_parallel_count)
	{
		$is_holyday = $this->check_is_holiday($date);

		if($is_holyday != 2)
		{
			return $is_holyday;
		}

		$opentime_model = new \Model_Opentimerdetail();
		$list_open_time = $opentime_model->get_list_open_time($this->sscode,$this->menucode,$date);

		$ischeck = $this->is_reservable_by_date($list_open_time,$date,$max_parallel_count);
		return $ischeck['status'];
	}


	public function is_reservable_by_date($open_times,$date,$max)
	{
		$result = 1;
		$dayinfor = array();
		foreach($open_times as $open_time)
		{
			$status = $this->is_reservable($open_time, $date, $max);
			$timeinfor = array();
			$timeinfor['start_time'] = $open_time->start_time;
			$timeinfor['end_time'] = $open_time->end_time;
			$timeinfor['status'] = $status;
			$dayinfor[] = $timeinfor;
			if($status)
			{
				$result = 2;
			}
		}

		$rs['status'] = $result;
		$rs['open_time'] = $dayinfor;
		return $rs;
	}


	protected function is_reservable($open_time, $date, $max)
	{
		$model	   = new \Model_Reservation();
		$model_pit = new \Model_Pit();

		$start = $date.' '.$this->conver_int_to_time($open_time->start_time);
		$end   = $date.' '.$this->conver_int_to_time($open_time->end_time);

		$pits  = $model_pit->get_list_pit_available($this->sscode, $this->menucode);

		$rs = array();
		$pit_cnt = 0;
		foreach ($pits as $key => $value)
		{
			$rs[] = $value['pit_no'];
			$pit_cnt++;
		}

		if($max == 0)
		{
			$max = $pit_cnt;
		}

		$rsv_cnt_menu = $model->get_reserve_count_by_menucode($this->sscode, $start,$end,$this->menucode);
		// check staff can work
		if($max <= $rsv_cnt_menu)
		{
			return false;
		}

		// check pit
		if($this->menucode == 'oil' || $this->menucode == 'inspection' || $this->menucode == 'tire')
		{
			if($pit_cnt == 0)
			{
				return false;
			}

			$pit_list = join(',',$rs);
			$rsv_cnt = $model->get_reserve_count($this->sscode, $start,$end,$this->menucode,$pit_list);
			if($pit_cnt <= $rsv_cnt)
			{
				return false;
			}
		}

		return true;
	}

	private function conver_int_to_time($time)
	{
		$hour = $time / 60;
		$minute = $time % 60;
		$rs = sprintf('%02d:%02d', $hour, $minute);
		return $rs;
	}
	public function validation_booking($start, $end)
	{
		$datetime = explode(' ',$start);
		$date = $datetime[0];
		$is_holyday = $this->check_is_holiday($date);
		if($is_holyday != 2)
		{
			return false;
		}

		$menu_setting_model = new \Model_Menusetting();
		$pit_model = new \Model_Pit();
		$max = $menu_setting_model->get_max_parallel_count($this->sscode,$this->menucode);
		$pits  = $pit_model->get_list_pit_available($this->sscode, $this->menucode);
		$rs = array();
		$pit_cnt = 0;
		foreach ($pits as $key => $value)
		{
			$rs[] = $value['pit_no'];
			$pit_cnt++;
		}

		if($max == 0)
		{
			$max = $pit_cnt;
		}

		$model    = new \Model_Reservation();
		$rsv_cnt_menu = $model->get_reserve_count_by_menucode($this->sscode, $start,$end,$this->menucode);
		// check staff can work
		if($max <= $rsv_cnt_menu)
		{
			return false;
		}

		// check pit
		if($this->menucode == 'oil' || $this->menucode == 'inspection' || $this->menucode == 'tire')
		{
			$pit_list = join(',',$rs);
			$rsv_cnt = $model->get_reserve_count($this->sscode, $start,$end,$this->menucode,$pit_list);
			if($pit_cnt <= $rsv_cnt)
			{
				return false;
			}
		}

		return true;
	}
}
