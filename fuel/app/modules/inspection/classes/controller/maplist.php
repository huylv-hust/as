<?php

/**
 * Maplist sscode
 * 
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 * @since 2015-06-10
 */

namespace Inspection;

class Controller_Maplist extends \Controller_Usappy
{

	public function action_index()
	{
		
		\Cookie::set('back_url', \Uri::current().'?'.$_SERVER['QUERY_STRING'], 60 * 60 * 24);
		$this->template->title = 'Usappyオートサービス管理';

		//get sscode
		$sscode = \Input::get('sscode');
		//get ss info
		$data['ss_info'] = \Api::search_ss(array('sscode' => $sscode));
		if ( ! $data['ss_info'])
		{
			\Response::redirect(\Uri::base().'inspection/search');
		}

		//get listss fill to map
		$data['list_ss'] = \Api::search_ss(array('workshop_sscode' => $sscode));
		$data['breadcrumb'] = array(
			'SSを選ぶ'                      => \Uri::base().'inspection/search',
			$data['ss_info'][0]['ss_name'] => false,
		);

		$this->template->content = self::view('maplist/index', $data);
		$this->template->breadcrumb = self::view('partials/breadcrumb', $data);
	}

	public function action_map_move()
	{
		if (\Input::method() != 'POST')
		{
			return false;
		}

		$config = array(
			'lon' => \Input::post('lon'),
			'lat' => \Input::post('lat'),
		);
		
		$liss_ss = \Api::search_ss($config);
		if ( ! $liss_ss)
		{
			return false;
		}

		$point = '[';
		$i = 1;
		foreach ($liss_ss as $_temp)
		{
			$href_link = \Uri::base().'inspection/reserve/?sscode='.$_temp['sscode'];
			$text = '<div id="makera"><a href="https://usappy.jp/ss/'.$_temp['sscode'].'" target="_blank">'.$_temp['ss_name'].'</a><br />'.$_temp['address'].'<br />Tel '.$_temp['tel'].'<br /><a href="'.$href_link.'" class="rese">予約する</a></div>';
			$point .= '{ name: \''.$_temp['ss_name'].'\', lon: '.$_temp['lon'].', lat: '.$_temp['lat'].',
						  text: \''.$text.'\',
						  popUpType: 2, imageUrl:\''.$_temp['icon'].'\', width:30, height:30 },';
			if($i == 10)
			{
				break;
			}
			
			$i++;
		}

		$point .= ']';

		$ss = '';
		$j = 1;
		foreach ($liss_ss as $row)
		{
			$ss .= '<li><a href="https://usappy.jp/ss/'.$row['sscode'].'" target="_blank" class="ssname">'.$row['ss_name'].'</a><p>TEL:'.$row['tel'].'<br />住所:'.$row['address'].'<br />管轄会社・支店:'.$row['branch_name'].'</p></li>';
			if($j == 10)
			{
				break;
			}
			
			$j++;
		}

		$response = $point.'||'.$ss;
		return new \Response($response, 200, array());
	}

}
