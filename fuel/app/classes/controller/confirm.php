<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/06/2015
 */
class Controller_Confirm extends Controller_Usappy
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		
		//head - css, js
		$this->template->head = self::view('partials/head');
		//navigator
		$this->template->navigator = self::view('partials/navi');
		//footer - footer of page
		$this->template->footer = self::view('partials/footer');
		
		$this->template->module = 'common/usercar/index';
	}
}
