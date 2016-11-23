<?php
namespace Inspection;
class Controller_Default extends \Controller_Usappy
{

	/**
	 * Search
	 * @author NamNT
	 * @since 1.0.0
	 * @param
	 * @return 
	*/
	public function action_index()
	{
		$this->template->title = '車検のことなら宇佐美。WEB予約も可能 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'宇佐美車検の特徴'		=> false,
			         
		);
		$this->template->content = self::view('default/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);

	}
	
}
