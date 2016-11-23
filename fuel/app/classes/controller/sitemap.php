<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/06/2015
 */
class Controller_Sitemap extends Controller_Usappy
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = 'サイトマップ | Usappyオートサービス';
		$this->set_teamplate();
		$data['breadcrumb'] = array(
			'サイトマップ'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('sitemap/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
