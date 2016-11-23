<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/06/2015
 */
class Controller_Wiper extends Controller_Usappy
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = '宇佐美のワイパー | Usappyオートサービス';
		$this->set_teamplate();
		$data['breadcrumb'] = array(
			'ワイパー'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('wiper/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
