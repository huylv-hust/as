<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/06/2015
 */
class Controller_Maintenance extends Controller_Usappy
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = '愛車のメンテナンス。点検・設備の必要性 | Usappyオートサービス';
		$this->set_teamplate();
		$data['breadcrumb'] = array(
			'点検・設備の必要性'		=> false,
			//'トップページ'	=> false,
		);
		$this->template->content = self::view('maintenance/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
