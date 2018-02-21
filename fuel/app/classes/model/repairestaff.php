<?php

class Model_Repairestaff extends Fuel\Core\Model_Crud
{
	private $validation;
	private $errors = array();
	
	protected static $_primary_key = 'repair_staff_id';
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
	
	protected static $_table_name = 'repaire_staff';

	public function __construct()
	{
		\Fuel\Core\Config::set('language', 'jp');
		\Fuel\Core\Lang::load('validation');
		\Fuel\Core\Lang::load('labelfield');
		$this->validation = \Validation::instance();
	}
	
	/*
	 * Get staff info
	 *
	 * @since 26/06/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function get_staff_info($login_id, $password)
	{
		$result = DB::select('*')
			->from(self::$_table_name)
			->where('login_id', $login_id)
			->where('password', $password)
			->where('state', 0)
			->execute()->as_array();
		
		if($result)
		{
			return $result[0];
		}
		
	}
	
	/*
	 * Get staff info
	 *
	 * @since 26/06/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public static function update_password($repair_staff_id, $password)
	{
		$db = array(
			'password'   => $password,
			'updated_at' => date('Y-m-d H:i:s'),
		);
		
		return DB::update(self::$_table_name)
				->set($db)
				->where('repair_staff_id', $repair_staff_id)
				->execute();
	}
	
	/*
	 * Validate staff account
	 *
	 * @since 24/07/2015
	 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
	 */
	public function validate()
	{
		if( ! $this->validation->input('current_password'))
		{
			$this->errors['current_password'] = '必須です';
		}
		
		if( ! $this->validation->input('password'))
		{
			$this->errors['password'] = '必須です';
		}
		
		if( ! $this->validation->input('re-password'))
		{
			$this->errors['re-password'] = '必須です';
		}
		
		if($this->validation->input('password') && strlen($this->validation->input('password')) < 6 )
		{
			$this->errors['password'] = '新しいパスワードが正しくありません';
		}
		
		if($this->validation->input('password') && strlen($this->validation->input('password')) > 30 )
		{
			$this->errors['password'] = '新しいパスワードが正しくありません';
		}
		
		if($this->validation->input('password') && $this->validation->input('re-password'))
		{
			if($this->validation->input('password') != $this->validation->input('re-password'))
			{
				$this->errors['re-password'] = '新しいパスワード(確認)が一致しません';
			}
		}
		
		$rule = '/^[\x21-\x7e]+$/'; // is half-size
		if($this->validation->input('password') && ! preg_match($rule, $this->validation->input('password')))
		{
			$this->errors['password'] = '新しいパスワードが正しくありません';
		}
		
		if($this->validation->input('current_password'))
		{
			$info = self::find_by(array('password' => $this->validation->input('current_password')));
			if( ! $info)
			{
				$this->errors['current_password'] = '現在のパスワードが正しくありません';
			}
		}
		
		if($this->errors)
		{
			return false;
		}
		
		return true;
	}
	
	public function get_list_errors()
	{
		return $this->errors;
	}
}
