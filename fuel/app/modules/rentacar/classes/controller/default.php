<?php
namespace Rentacar;
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
		$this->template->title = '宇佐美のレンタカーサービス | Usappyオートサービス';
		$this->set_teamplate();
		
		$data['breadcrumb'] = array(
			'レンタカー'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('default/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);

	}
	
}
