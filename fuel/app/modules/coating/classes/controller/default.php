<?php
namespace Coating;
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
		
		$this->template->title = 'コーティングなら宇佐美。WEB予約も可能 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'宇佐美のコーティング'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('default/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
