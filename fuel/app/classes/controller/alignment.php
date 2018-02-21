<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/06/2015
 */
class Controller_Alignment extends Controller_Usappy
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = '宇佐美のアライメント調整 | Usappyオートサービス';
		$this->set_teamplate();
		$data['breadcrumb'] = array(
			'アライメント調整'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('alignment/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
