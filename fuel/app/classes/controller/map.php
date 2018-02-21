<?php
/**
* Maplist sscode
* @author NamDD<NamDD6566@seta-asia.com.vn>
* @since 2015-06-22
*/
class Controller_Map extends Controller_Usappy
{
	/**
	 * @author NamDD <NamDD6566@seta-asia.com.vn>
	 * Maplist
	 */
	public function maplist()
	{
		\Cookie::set('back_url', \Uri::current().'?'.$_SERVER['QUERY_STRING'], 60 * 60 * 24);

		$this->template->title = '車検・リペア・コーティングなど愛車のメンテナンスは宇佐美で。 | Usappyオートサービス';
		$menu_code = strtolower(\Fuel\Core\Uri::segment(1));
		$menu_code_name = \Constants::$pit_work[$menu_code];
		$menu_setting = new \Model_Menusetting();
		$lat = \Input::get('lat','');
		$lon = \Input::get('lon','');
		$region = \Input::get('region');
		$region_name = \Fuel\Core\Input::get('name','');
		$map_scale = 10;
		if($region)
		{
			$region = str_replace('a','',$region);
			if(isset(\Constants::$province_map[$region]))
			{
				$lat = \Constants::$province_map[$region]['0'];
				$lon = \Constants::$province_map[$region]['1'];
				$map_scale = \Constants::$province_map[$region]['2'];
				$region_name = \Constants::$province_map[$region]['3'];
			}
		}

		if( ! ($lon && $lat))
		{
			\Fuel\Core\Response::redirect(\Fuel\Core\Uri::base().$menu_code.'/search/');
		}

		$list_ss_search = \Api::search_ss(array(
			'lon' => $lon,
			'lat' => $lat,
		));
		$_array_ss = array();
		if(count($list_ss_search))
		{
			$_array_ss = \Utility::array_column($list_ss_search,'sscode');
			$list_sscode_menu = $menu_setting->get_list_available_sscode($_array_ss, $menu_code);
			$_array_available_ss = array();
			if(count($list_sscode_menu))
			{
				foreach($list_sscode_menu as $_temp)
				{
					$_array_available_ss[$_temp['sscode']] = $_temp['sscode'];
				}
			}

			$_array_ss_map = array();
			$_array_ss_show = array();
			$i = 1;
			foreach($list_ss_search as $_temp)
			{
				if(isset($_array_available_ss[$_temp['sscode']]))
				{
					$_array_ss_show[] = $_temp;
					$_array_ss_map[$i]['name'] = $_temp['ss_name'];
					$_array_ss_map[$i]['lon'] = $_temp['lon'];
					$_array_ss_map[$i]['lat'] = $_temp['lat'];
					$_array_ss_map[$i]['text'] = '<div id="makera"><a href="https://usappy.jp/ss/'.$_temp['sscode'].'" target="_blank">'.$_temp['ss_name'].'</a><br />'.$_temp['address'].'<br />Tel '.$_temp['tel'].'<br /><a href="'.\Fuel\Core\Uri::base().\Fuel\Core\Uri::segment(1).'/reserve/?sscode='.$_temp['sscode'].'" class="rese">予約する</a></div>';
					$_array_ss_map[$i]['popUpType'] = 2;
					$_array_ss_map[$i]['imageUrl'] = $_temp['icon'];
					$_array_ss_map[$i]['height'] = '30';
					$_array_ss_map[$i]['width'] = '30';
					++$i;
					if($i > 10) break;
				}
			}
		}

		$data['lon'] = $lon;
		$data['lat'] = $lat;
		if(count($_array_ss_show))
		{
			$first = current($_array_ss_show);
			$data['lon'] = $first['lon'];
			$data['lat'] = $first['lat'];
		}

		$data['array_ss'] = $_array_ss_show;
		$data['menu_code'] = $menu_code;
		$data['point_data'] = $_array_ss_map;
		$data['map_scale'] = $map_scale;
		$data['region_name'] = $region_name;
		$this->template->content = self::view('maplist/index',$data);
	}
}