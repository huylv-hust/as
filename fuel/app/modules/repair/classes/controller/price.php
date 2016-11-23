<?php
namespace Repair;
class Controller_Price extends \Controller_Usappy
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
		$this->template->title = '宇佐美ボディリペアの料金 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'ボディリペアトップ'		=> \Uri::base().'repair',
			'料金'	=> false,                
		);
		$this->template->content = self::view('price/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);

	}
	
}
