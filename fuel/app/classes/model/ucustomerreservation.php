<?php
/**
 * Customer class
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/05/2015
 */

class Model_Ucustomerreservation
{
	private $validation;
	private $ucar;
	private $customer;
	private $errors = array();
	function __construct()
	{
		$this->ucar = new Model_Ucar();
		$this->customer = new Model_Customer();
	}
	public function validate()
	{
		$rs = true;

		if( ! $this->ucar->validate())
		{
			$rs = false;
			$this->errors = array_merge($this->errors,$this->ucar->get_errors());
		}

		if( ! $this->customer->validate())
		{
			$rs = false;
			$this->errors = array_merge($this->errors, $this->customer->get_errors());

		}

		return $rs;
	}

	public function get_errors()
	{
		return $this->errors;
	}

	public function save($data,$ident ='W' ,$reservation_no = '')
	{
			DB::start_transaction();
			$rs = $this->ucar->save_info($data);
			if(count($rs))
			{

				if($this->customer->save_user_info($rs))
				{
					DB::commit_transaction();
					return $rs;
				}
				else
				{
					DB::rollback_transaction();
				}

				return 0;
			}

			return false;
	}
	/**
	 * lock tablse
	 * @param type $table
	 * @param type $type
	 */
	public function lock_table($table,$type)
	{
		$sql = 'LOCK TABLES '.$table.' '.$type;
		Fuel\Core\DB::query($sql);
	}
	/**
	 * Lock tabale before save reser
	 */
	public function  lock_tabale_reservation()
	{
		$this->lock_table('pit', 'WRITE');
		$this->lock_table('reservation', 'READ');
	}
	/**
	 * unlock tablse after save
	 */
	public function unlock_table()
	{
		$sql = 'UNLOCK TABLES';
		Fuel\Core\DB::query($sql);
	}

}