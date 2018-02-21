<?php
namespace Coating;

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
		$this->template->title = '宇佐美のコーティングWEB予約 | Usappyオートサービス';
		$this->template->content = self::view('search/index');
		$this->template->content->jpmap = self::view('partials/jpmap',$data);
		
	}
	
}
