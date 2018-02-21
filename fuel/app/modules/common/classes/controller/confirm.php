<?php

/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 2/06/2015
 */
namespace Common;
class Controller_Confirm extends \Controller_Usappy
{
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * form User
	 * @return \Response
	 */
	public function action_index()
	{	
		$data = array();
		return self::view('confirm/index',$data);
	}
	
}
