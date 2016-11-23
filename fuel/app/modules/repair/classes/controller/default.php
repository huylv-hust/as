<?php
namespace Repair;
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
		
		$this->template->title = '宇佐美のボディリペアNAOS。車のキズ、ヘコミも元通りに | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'ボディリペアトップ'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('default/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
