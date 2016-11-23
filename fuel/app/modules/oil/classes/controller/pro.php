<?php
namespace Oil;
class Controller_Pro extends \Controller_Usappy
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
		
		$this->template->title = '宇佐美のオイルプロショップ | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'宇佐美のオイル交換'  => \Uri::base().'oil',
			'オイルプロショップ'  => false,                
		);
		$this->template->content = self::view('pro/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
