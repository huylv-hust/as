<?php

/**
* Oil list controller
* 
* @author Ha Huu Don <donhh6551@seta-asia.com.vn>
* @since 2015-06-15
*/

namespace Oil;

class Controller_List extends \Controller_Usappy
{
	public function action_index()
	{
		\Cookie::set('back_url', \Uri::current().'?'.$_SERVER['QUERY_STRING'], 60 * 60 * 24);

		$this->template->title = 'Oil list';
		
		$data['list_ss'] = array();
		//set name class
		$data['class_name'] = strtolower(\Uri::segment(1));
		
		if (\Input::method() == 'GET') 
		{
			$post = \Input::get();
			if($post['keyword'])
			{
				$keywords = array('keyword' => $post['keyword']);
			
				$data['list_ss'] = $this->find_ss_by_keywords($keywords, $data['class_name']);
			}
		}
		
		$data['breadcrumb'] = array(
			'SSを選ぶ'       => \Uri::base().'oil/search',
			'キーワード検索'   => false,                
		);
		
		$this->template->content = self::view('general/list', $data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}
	
}