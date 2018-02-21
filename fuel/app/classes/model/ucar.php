<?php
/**
 * Ucar class
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 11/06/2015
 */

class Model_Ucar
{
	private $validation;
	private $error = array();
	private $reservation;
	private $reservationno;
	function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
		$this->validation = Validation::forge('ucar');
		$this->reservation = new Model_Reservation();
		$this->reservationno = new Model_Reservationno();
	}
	public function validate()
	{
		$menu_code = strtolower(Fuel\Core\Uri::segment('1'));
		$this->validation->add_field('plate_no',\Fuel\Core\Lang::get('plate_no'),'required|valid_string[numeric]|exact_length[4]');
		$this->validation->add_field('car_maker_code',\Fuel\Core\Lang::get('car_maker_code'),'required');
		$this->validation->add_field('car_model_code',\Fuel\Core\Lang::get('car_model_code'),'required');
		$this->validation->add_field('cok',\Fuel\Core\Lang::get('cok'),'required');
		$this->validation->add_field('other_request',\Fuel\Core\Lang::get('other_request'),'max_length[1000]');

		if($menu_code == 'coating')
		{
			$this->validation->add_field('car_color_code',\Fuel\Core\Lang::get('car_color_code'),'required');
			$this->validation->add_field('coating_code',\Fuel\Core\Lang::get('coating_code'),'required');
		}

		if($menu_code == 'inspection')
		{
			$this->validation->add_field('inspection_month',\Fuel\Core\Lang::get('inspection_month'),'required');
			$this->validation->add_field('inspection_year',\Fuel\Core\Lang::get('inspection_year'),'required');
			$this->validation->add_field('inspection_day',\Fuel\Core\Lang::get('inspection_day'),'required');
			$this->validation->add_field('car_size_code',\Fuel\Core\Lang::get('car_size_code'),'required');
			$this->validation->add_field('car_weight_code',\Fuel\Core\Lang::get('car_weight_code'),'required');
		}


		if($menu_code == 'tire')
		{
			$this->validation->add_field('tire_preparation_code',\Fuel\Core\Lang::get('tire_preparation_code'),'required');
			if((int)$this->validation->input('tire_preparation_code'))
				$this->validation->add_field('wheel_preparation_code',\Fuel\Core\Lang::get('wheel_preparation_code'),'required');

			$this->validation->add_field('tire_size_code',\Fuel\Core\Lang::get('tire_size_code'),'required');
		}

		if($menu_code == 'wash')
		{
			$this->validation->add_field('car_color_code',\Fuel\Core\Lang::get('car_color_code'),'required');
		}

		if( ! $this->validation->run())
		{
			foreach ($this->validation->error() as $field => $error)
			{
				$this->validation->set_message('required',':label '.\Fuel\Core\Lang::get('required'));
				$this->validation->set_message('max_length',':label '.\Fuel\Core\Lang::get('max_length'));
				$this->validation->set_message('exact_length',':label '.\Fuel\Core\Lang::get('exact_length'));
				$this->validation->set_message('valid_string',':label '.\Fuel\Core\Lang::get('valid_string'));
				if($field == 'inspection_month' || $field == 'inspection_year' || $field == 'inspection_day')
				{
					$this->error['inspection'] = $error->get_message();
				}

				elseif($field == 'other_request')
				{
					$this->error[$field] = \Fuel\Core\Lang::get('other_request').\Fuel\Core\Lang::get('max_length_other');
				}

				elseif($field == 'wheel_preparation_code')
				{
					$this->error['wheel_preparation_code_'.(int)$this->validation->input('tire_preparation_code')] = \Fuel\Core\Lang::get('wheel_preparation_code_'.$this->validation->input('tire_preparation_code')).\Fuel\Core\Lang::get('required');
				}

				else
				{
					$this->error[$field] = $error->get_message();
				}
			}
		}

		$check_inspection = true;
		if($this->validation->input('inspection_day') == '' && $this->validation->input('inspection_month') == '' && $this->validation->input('inspection_year') == '')
		{
			$check_inspection = false;
		}

		if($check_inspection)
		{
			if( ! checkdate((int)$this->validation->input('inspection_month'), (int)$this->validation->input('inspection_day'), (int)$this->validation->input('inspection_year')))
			{
				$this->error['inspection_date'] = \Fuel\Core\Lang::get('inspection').\Fuel\Core\Lang::get('date_error');
			}
		}

		if($this->validation->input('sscode'))
		{
			$params = array('sscode' => $this->validation->input('sscode'));
			$sscode_check = \Api::search_ss($params);
			if( ! count($sscode_check))
			{
				$this->error['sscode'] = \Fuel\Core\Lang::get('sscode');
			}
		}
		else
		{
			$this->error['sscode'] = \Fuel\Core\Lang::get('sscode');
		}

		$sscode = $this->validation->input('sscode');
		$menu_code = $this->validation->input('menu_code');
		$start_time = $this->convert_time($this->validation->input('start_time'));
		$end_time = $this->convert_time($this->validation->input('end_time'));

		if(count($start_time) && count($end_time))
		{
			$ucalendar = new Model_Ucalendar($sscode,$menu_code);
			$opentime_model = new \Model_Opentimerdetail();
			if( ! $ucalendar->is_rang_booking($start_time['date']))
			{
				$this->error['date_booking'] = \Fuel\Core\Lang::get('date_booking');
			}

			if($start_time['time_int'] >= $end_time['time_int'] || $start_time['time_int'] < 0 || $end_time['time_int'] < 0 || $end_time['time_int'] > 1440 || $start_time['time_int'] > 1440)
			{
				$this->error['date_booking'] = \Fuel\Core\Lang::get('date_booking');
			}
		}

		else
		{
			$this->error['date_booking'] = \Fuel\Core\Lang::get('date_booking');
		}


		if(count($this->error))
			return false;

		return true;

	}
	public function get_errors()
	{
		return $this->error;
	}
	public function save_info($data,$ident = 'W',$reservationo_no = '')
	{
		if($reservationo_no == '')
			$reservationo_no = $this->reservationno->create_reservationo_no($ident);

		$data['reservation_no'] = $reservationo_no;
		return $this->reservation->reservation_save($data);
	}
	/**
	 * 2015-05-23 08:12
	 * @param type $date_time
	 */
	public function convert_time($date_time)
	{
		$date_time = trim($date_time);
		$_arr_date_time = explode(' ',$date_time);

		if(count($_arr_date_time) != 2)
		{
			return array();
		}

		$time = explode(':',$_arr_date_time['1']);

		if(count($time) != 2)
		{
			return array();
		}

		$time_int = (int)$time['0'] * 60 + (int)$time['1'];

		return array(
			'date'     => $_arr_date_time['0'],
			'time_int' => $time_int,
		);
	}

}
