<?php
namespace Inspection;
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
		$this->template->title = '宇佐美車検のWEB予約 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'SSを選ぶ'		=> \Uri::base().'inspection/search',
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('search/index',$data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);

	}
	
}
