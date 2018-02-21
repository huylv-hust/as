<?php
namespace Tire;

class Controller_Search extends \Controller_Usappy
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
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'SSを選ぶ'		=> \Uri::base().'tire/search',
			//'トップページ'	=> false,                
		);
		$this->template->title = '宇佐美のタイヤ交換WEB予約 | Usappyオートサービス';
		$this->template->content = self::view('search/index');
		$this->template->content->jpmap = self::view('partials/jpmap',$data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
	
}
