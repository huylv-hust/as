<?php
namespace Inspection;
class Controller_wako extends \Controller_Usappy
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
		$this->template->title = '宇佐美車検の料金 和光（宇佐美カーケアショップ和光）の料金表 | Usappyオートサービス';
		$this->set_teamplate();
		$data['title'] = $this->get_screen_name();
		$data['breadcrumb'] = array(
			'車検の料金'  => \Uri::base().'inspection/price',
			'和光'  => false,                
		);
		$this->template->content = self::view('wako/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
