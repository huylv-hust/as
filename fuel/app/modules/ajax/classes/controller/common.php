<?php

/**
 * List function
 *
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 2/06/2015
 */
namespace Ajax;
class Controller_Common extends \Controller_Usappy
{
	/**
	 * @author NamDD <namdd6566@seta-asia.com.vn>
	 * get info car
	 * @return \Response
	 */
	public function action_car()
	{
		$maker_code = \Input::param('car_maker_code','');
		$model_code = \Input::param('car_model_code','');
		$year = \Input::param('car_year','');
		$type_code = \Input::param('car_type_code','');
		$selected = \Input::param('selected','');
		$level = \Input::param('level','');
		if($maker_code && $model_code && $year && $type_code && $level == 4)
		{
			$list_grade_code = \Api::get_list_grade_code($maker_code,$model_code,$year,$type_code,$selected);
			return new \Response(\Constants::array_to_option($list_grade_code,'grade_code','grade'), 200,array());
		}

		if($maker_code && $model_code && $year && $level == 3)
		{
			$list_type_code = \Api::get_list_type_code($maker_code,$model_code,$year);
			return new \Response(\Constants::array_to_option($list_type_code,'type_code','type',$selected), 200,array());
		}

		if($maker_code && $model_code && $level == 2)
		{
			$list_year = \Api::get_list_year_month($maker_code,$model_code);
			$list_year_format = array();
			for($i = 0; $i < count($list_year); ++$i)
			{
				$list_year_format[$i]['year_format'] = \Constants::to_jp_date($list_year[$i]['year']);
				$list_year_format[$i]['year'] = $list_year[$i]['year'];
			}

			return new \Response( \Constants::array_to_option($list_year_format,'year','year_format',$selected), 200,array() );
		}

		if($maker_code && $level == 1)
		{
			$list_model_code = \Api::get_list_model($maker_code);
			return new \Response(\Constants::array_to_option($list_model_code,'model_code','model',$selected), 200,array());
		}

		if($level == 0)
		{
			$list_maker_code = \Api::get_list_maker();
			return new \Response(\Constants::array_to_option($list_maker_code,'maker_code','maker',$selected), 200,array());
		}
	}
	public function action_map_move()
	{
		$check_smartphone = false;
		if(\Agent::is_smartphone())
		{
			$check_smartphone = true;
		}

		$menu_setting = new \Model_Menusetting();
		$lon = \Fuel\Core\Input::post('lon');
		$lat = \Fuel\Core\Input::post('lat');
		$menu_code = \Fuel\Core\Input::post('menu_code');
		$config = array(
			'lon' => $lon,
			'lat' => $lat,
		);
		$list_ss_search = \Api::search_ss($config);
		$_array_ss = array();
		foreach($list_ss_search as $_temp)
		{
			$_array_ss[] = $_temp['sscode'];
		}


		$list_sscode_menu = $menu_setting->get_list_available_sscode($_array_ss, $menu_code);
		$_array_available_ss = array();
		foreach($list_sscode_menu as $_temp)
		{
			$_array_available_ss[$_temp['sscode']] = $_temp['sscode'];
		}

		$_array_ss_map = array();
		$_array_ss_show = array();
		$i = 1;
		foreach($list_ss_search as $_temp)
		{
			if(isset($_array_available_ss[$_temp['sscode']]))
			{
				$href_link = \Fuel\Core\Uri::base().$menu_code.'/reserve/?sscode='.$_temp['sscode'];
				$_array_ss_show[] = $_temp;
				$_array_ss_map[$i]['name'] = $_temp['ss_name'];
				$_array_ss_map[$i]['lon'] = $_temp['lon'];
				$_array_ss_map[$i]['lat'] = $_temp['lat'];
				$_array_ss_map[$i]['text'] = '<div id="makera"><a href="https://usappy.jp/ss/'.$_temp['sscode'].'" target="_blank">'.$_temp['ss_name'].'</a><br />'.$_temp['address'].'<br />Tel '.$_temp['tel'].'<br /><a href="'.$href_link.'" class="rese">予約する</a></div>';
				$_array_ss_map[$i]['popUpType'] = 2;
				$_array_ss_map[$i]['imageUrl'] = $_temp['icon'];
				$_array_ss_map[$i]['height'] = '30';
				$_array_ss_map[$i]['width'] = '30';
				++$i;
				if($i > 10)
					break;
			}
		}

		$point = '[';
		foreach($_array_ss_map as $_temp)
		{
			$point .= '{ name: \''.$_temp['name'].'\', lon: '.$_temp['lon'].', lat: '.$_temp['lat'].',
						  text: \''.$_temp['text'].'\',
						  popUpType: 2, imageUrl:\''.$_temp['imageUrl'].'\', width:30, height:30 },';
		}

		$point .= ']';
		$ss = '';
		$style = '';
		if($check_smartphone)
		{
			$style = 'style="height:165px"';
		}

		foreach($_array_ss_show as $row)
		{
			$ss .= '<li '.$style.'>
						<a href="https://usappy.jp/ss/'.$row['sscode'].'" target="_blank" class="ssname">'.$row['ss_name'].'</a>
						<p>TEL:'.$row['tel'].'<br />
							住所:'.$row['address'].'　<br />
							管轄会社・支店:'.$row['branch_name'].'
						</p>';
			if($check_smartphone)
				$ss .= '<div class="pd10"><a class="grebt" href="'.\Fuel\Core\Uri::base().$menu_code.'/reserve/?sscode='.$row['sscode'].'">このSSで予約する</a></div>';
			else
				$ss .= '<a class="btrese" href="'.\Fuel\Core\Uri::base().$menu_code.'/reserve/?sscode='.$row['sscode'].'">このSSで予約する</a>';
			$ss .= '</li>';
		}

		$response = $point.'||'.$ss;
		return new \Response($response, 200, array());

	}

	public function action_setcookie()
	{
		$start_time	= str_replace('/','-',\Input::param('start_time'));
		$name_cookie = \Fuel\Core\Input::param('name_cookie');
		\Fuel\Core\Cookie::set($name_cookie.'_url_redirect',$start_time);
		return new \Response(1, 200, array());

	}
}
