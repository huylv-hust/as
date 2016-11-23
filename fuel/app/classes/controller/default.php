<?php

class Controller_Default extends Controller_Usappy
{
	/*
	 * Index action
	 *
	 * @since 09/06/2015
	 * @author NamNT
	 */
	public function action_index()
	{
		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		//head - css, js
		$this->template->head = self::view('partials/head');
		//navigator
		$this->template->navigator = self::view('partials/navi');
		//footer - footer of page
		$this->template->footer = self::view('partials/footer');
		$this->template->content = self::view('default/index');
	}

	public function action_404()
	{
		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		$data['breadcrumb'] = array(
			'ご指定のページが見つかりません' => false
		);
		//head - css, js
		$this->template->head = self::view('partials/head');
		//navigator
		$this->template->navigator = self::view('partials/navi');
		//footer - footer of page
		$this->template->footer = self::view('partials/footer');
		$this->template->content = self::view('default/404');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	public function action_iderror()
	{
		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		$data['breadcrumb'] = array(
			'エラー' => false
		);
		//head - css, js
		$this->template->head = self::view('partials/head');
		//navigator
		$this->template->navigator = self::view('partials/navi');
		//footer - footer of page
		$this->template->footer = self::view('partials/footer');
		$this->template->content = self::view('default/iderror');
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

}
