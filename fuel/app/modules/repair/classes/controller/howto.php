<?php
namespace Repair;
class Controller_Howto extends \Controller_Usappy
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
		$this->template->title = '宇佐美ボディリペア施工までの流れ | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'ボディリペアトップ'		=> \Uri::base().'repair',
			'施工までの流れ'	=> false,                
		);
		$this->template->content = self::view('howto/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);

	}
	
}
