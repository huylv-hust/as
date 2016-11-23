<?php
namespace Inspection;
class Controller_mito extends \Controller_Usappy
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
		$this->template->title = '宇佐美車検の料金 水戸（６号水戸）の料金表 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'車検の料金'  => \Uri::base().'inspection/price',
			'水戸'  => false,                
		);
		$this->template->content = self::view('mito/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
