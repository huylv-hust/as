<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 12/06/2015
 */
class Controller_Battery extends Controller_Usappy
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = '宇佐美のバッテリー | Usappyオートサービス';
		$this->set_teamplate();
		$data['breadcrumb'] = array(
			'バッテリー'		=> false,
			//'トップページ'	=> false,                
		);
		$this->template->content = self::view('battery/index');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
}
