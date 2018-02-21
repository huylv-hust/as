<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utility
{

	/*
	 * Send mail
	 *
	 * @since 05/06/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function sendmail($mailto, $subject, $data, $template = false)
	{
		//config email
		$email = \Email::forge();
		$email_config = Config::get('email');
		$email->from($email_config['from'], $email_config['name']);
		$email->to($mailto);
		$email->subject($subject);
		//$email->body($data['body']);

		//use template
		if($template)
		{
			$email->body(\View::forge($template, $data)); //$data is var pass to template
		}

		//if have attach
		//$email->attach(DOCROOT.'my-pic.jpg');
		try
		{
			$email->send();
			return true;
		}
		catch(\EmailValidationFailedException $e)
		{
			Fuel\Core\Log::error('Mail validation: '.json_encode($mailto));
		}
		catch(\EmailSendingFailedException $e)
		{
			Fuel\Core\Log::error('Mail send failed: '.json_encode($mailto));
		}
	}

	/*
	 * Debug data
	 *
	 * @since 08/05/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function format_jappan_datetime($datetime)
	{
		$year  = date('Y', strtotime($datetime)).'年';
		$month = abs(date('m', strtotime($datetime))).'月';
		$day   = abs(date('d', strtotime($datetime))).'日';
		$time = date('H:i', strtotime($datetime));

		return $year.$month.$day.$time;

	}

	/*
	 * Move last element to top
	 *
	 * @since 10/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function move_last_to_top_array($array)
	{
		$key = end($array);

		$temp = array($key => $array[$key]);

		unset($array[$key]);

		return $temp + $array;;
	}

	/*
	 * String integer to time
	 *
	 * @since 23/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function string_to_time($time_string)
	{
		$time    = $time_string / 60;
		$minutes = $time_string % 60;
		$hours  = (int)$time;

		if($minutes < 10)
		{
			$minutes = '0'.$minutes;
		}

		return $hours.':'.$minutes;
	}

	/*
	 * Subtract month or year
	 *
	 * @since 23/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function sub_month_year($date, $quantity, $type = 'month')
	{
		//date format date('Y-m-d);
		$current_date = date_create($date);
		date_sub($current_date,date_interval_create_from_date_string($quantity.' '.$type));

		return $type == 'month' ? date_format($current_date, "m") : date_format($current_date, "Y");
	}


	/*
	 * Debug data
	 *
	 * @since 08/05/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function debug($value, $die = true)
	{
		echo '<pre>';
		print_r($value);
		echo '</pre>';
		if ($die)
		{
			die();
		}
	}

	/*
	 * array_column for PHP5.4
	 *
	 * @since 09/01/2015
	 * @author Y.hasegawa
	 */
	public static function array_column($array, $column_key, $index_key = null)
	{
		$result = array();

		foreach ($array as $row)
		{
			if ($index_key !== null)
			{
				$result[$row[$index_key]] = $row[$column_key];
			} else {
				$result[] = $row[$column_key];
			}
		}

		return $result;
	}
	public static function convert_customer_info_oracel($customer)
	{
		$info = array();
		$customer = current($customer);
		if($customer)
		{
			$info['member_kaiinName']    = $customer['customer_name'];
			$info['member_kaiinKana']    = $customer['customer_kana'];
			$info['member_telNo1']       = $customer['mobile_tel'];
			$info['member_telNo2']       = $customer['house_tel'];
			$info['member_mailAddress1'] = $customer['email_mobile'];
			$info['member_mailAddress2'] = $customer['email_pc'];
		}

		return $info;
	}

}
