<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Constants
{

	function __construct()
	{

	}
	static $mail_system = 'mieng.tran@seta-asia.vn,karita@seta-international.co.jp';
	static $inspection_date = array();
	static $branch = array(
		'202480' => '東日本宇佐美　北海道支店',
		'283963' => '東日本宇佐美　東北支店',
		'326855' => '東日本宇佐美　上信越支店',
		'458926' => '東日本宇佐美　東京販売支店',
		'458935' => '東日本宇佐美　神奈川販売支店',
		'458944' => '東日本宇佐美　埼玉栃木販売支店',
		'458953' => '東日本宇佐美　千葉茨城販売支店',
		'451987' => '西日本宇佐美　東海支店',
		'457142' => '西日本宇佐美　中部支店',
		'513545' => '西日本宇佐美　北陸支店',
		'575167' => '西日本宇佐美　関西支店',
		'603074' => '西日本宇佐美　山陽支店',
		'784351' => '西日本宇佐美　九州支店',
		'458720' => 'ダイツー',
	);
	static $pit_work = array(
		'oil'        => 'オイル交換',
		'tire'       => 'タイヤ交換',
		'inspection' => '車検',
		'wash'       => '洗車',
		'coating'    => 'コーティング',
		'other'      => 'その他',
		'repair'     => 'リペア',
	);
	static $coating_code = array(
		''        => 'コーティングの種類を選択して下さい',
		'crystal' => 'クリスタルキーパー',
		'diamond' => ' ダイヤモンドキーパー',
		'double'  => 'ダブルダイヤキーパー',
		'pure'    => 'ピュアキーパー',
	);
	static $car_color = array(
		''   => '色を選択して下さい',
		'1'  => 'パールホワイト',
		'2'  => 'ベージュ',
		'3'  => 'シルバー',
		'4'  => 'グレー',
		'5'  => 'ガンメタ',
		'6'  => 'ピンク',
		'7'  => 'ワインレッド',
		'8'  => 'オレンジ',
		'9'  => 'ゴールド',
		'10' => 'グリーン',
		'11' => 'マジョーラ',
		'12' => '白',
		'13' => '黒',
		'14' => '紫',
		'15' => '赤',
		'16' => '黄',
		'17' => '茶',
		'18' => '水色',
		'19' => '青',
		'20' => '紺',
		'99' => 'その他',
	);
	static $car_size = array(
		''  => '色を選択して下さい',
		'1' => '軽自動車（乗用・貨物）',
		'2' => '普通乗用車 5・7ナンバー',
		'3' => '普通乗用車 3ナンバー',
		'4' => '小型貨物 4ナンバー',
		'5' => '普通貨物 1ナンバー',
	);
	static $car_weight = array(
		''  => '色を選択して下さい',
		'1' => '501kg～1000kg',
		'2' => '1001kg～1500kg',
		'3' => '1501kg～2000kg',
		'4' => '2001kg～2500kg',
		'5' => '2501kg～3000kg',
	);
	static $car_weight_1 = array(
		'1' => '軽自動車',
	);
	static $car_weight_2 = array(
		'1' => '～1000kg',
		'2' => '～1500kg',
		'3' => '～2000kg',
		'4' => '～2500kg',
		'5' => '～3000kg',
	);
	static $car_weight_3 = array(
		'1' => '～1000kg',
		'2' => '～1500kg',
		'3' => '～2000kg',
		'4' => '～2500kg',
		'5' => '～3000kg',
	);
	static $car_weight_4 = array(
		'1' => '車両重量～2000kg',
		'2' => '車両重量～2500kg',
		'3' => '車両重量～3000kg',
		'4' => '車両重量～4000kg',
	);
	static $car_weight_5 = array(
		'1' => '車両重量～2000kg',
		'2' => '車両重量～2500kg',
		'3' => '車両重量～3000kg',
		'4' => '車両重量～4000kg',
	);

	static $is_car_request = array(
		'0' => '希望しない',
		'1' => '希望する',
	);
	static $wheel_preparation_code = array(
		'1' => '有り',
		'2' => '無し',
	);
	static $tire_preparation_code = array(
		'0' => '色を選択して下さい',
		'1' => '購入予定',
		'2' => '交換作業',
	);
	static $tire_size_code = array(
		''  => 'インチを選択して下さい',
		'12' => '12インチ',
		'13' => '13インチ',
		'14' => '14インチ',
		'15' => '15インチ',
		'16' => '16インチ',
		'17' => '17インチ',
		'99' => '不明',
	);
	static $state = array(
		'0' => '実施待ち',
		'1' => '完了',
		'2' => 'キャンセル',
	);
	static $colors = array(
		'oil'        => '#FF7900',
		'tire'       => '#495149',
		'inspection' => '#AC1F28',
		'wash'       => '#006FAE',
		'coating'    => '#021B6B',
		'other'      => '#006837',
		'repair'     => '#0050CB',
	);
	static $month = array(
		''   => '月を選択して下さい',
		'1'  => '1月',
		'2'  => '2月',
		'3'  => '3月',
		'4'  => '4月',
		'5'  => '5月',
		'6'  => '6月',
		'7'  => '7月',
		'8'  => '8月',
		'9'  => '9月',
		'10' =>	'10月',
		'11' => '11月',
		'12' => '12月',
	);
	static $date = array(
		''   => '日を選択して下さい',
		'1'  => '1日',
		'2'  => '2日',
		'3'  => '3日',
		'4'  => '4日',
		'5'  => '5日',
		'6'  => '6日',
		'7'  => '7日',
		'8'  => '8日',
		'9'  => '9日',
		'10' =>	'10日',
		'11' => '11日',
		'12' => '12日',
		'13' => '13日',
		'14' => '14日',
		'15' => '15日',
		'16' => '16日',
		'17' => '17日',
		'18' => '18日',
		'19' => '19日',
		'20' => '20日',
		'21' => '21日',
		'22' =>	'22日',
		'23' => '23日',
		'24' => '24日',
		'25' => '25日',
		'26' => '26日',
		'27' => '27日',
		'28' => '28日',
		'29' => '29日',
		'30' =>	'30日',
		'31' => '31日',
	);

	static $booking_oil = 'oil';
	static $booking_tire = 'tire';
	static $booking_inspection = 'inspection';
	static $booking_wash = 'wash';
	static $bookinh_coating = 'coating';
	static $province_name = array(
		'1'  => '北海道',
		'2'  => '青森県',
		'3'  => '岩手県',
		'4'  => '宮城県',
		'5'  => '秋田県',
		'6'  => '山形県',
		'7'  => '福島県',
		'8'  => '茨城県',
		'9'  => '栃木県',
		'10' => '群馬県',
		'11' => '埼玉県',
		'12' => '千葉県',
		'13' => '東京都',
		'14' => '神奈川県',
		'15' => '新潟県',
		'16' => '富山県',
		'17' => '石川県',
		'18' => '福井県',
		'19' => '山梨県',
		'20' => '長野県',
		'21' => '岐阜県',
		'22' => '静岡県',
		'23' => '愛知県',
		'24' => '三重県',
		'25' => '滋賀県',
		'26' => '京都府',
		'27' => '大阪府',
		'28' => '兵庫県',
		'29' => '奈良県',
		'30' => '和歌山県',
		'31' => '鳥取県',
		'32' => '島根県',
		'33' => '岡山県',
		'34' => '広島県',
		'35' => '山口県',
		'36' => '徳島県',
		'37' => '香川県',
		'38' => '愛媛県',
		'39' => '高知県',
		'40' => '福岡県',
		'41' => '佐賀県',
		'42' => '長崎県',
		'43' => '熊本県',
		'44' => '大分県',
		'45' => '宮崎県',
		'46' => '鹿児島県',
		'47' => '沖縄県',
	);
	/* lat vi do [0] -  lon kinh do [1]*/
	static $province_map = array(

		'1'  => array(
			43.063968,
			141.347899,
			10,
			'北海道',
		),
		'2'  => array(
			40.73810081,
			141.0232544,
			10,
			'青森',
		),
		'3'  => array(
			39.55573017,
			141.4160156,
			9,
			'岩手',
		),
		'4'  => array(
			38.27096353,
			140.7485962,
			10,
			'宮城',
		),
		'5'  => array(
			39.57838507,
			140.280304,
			10,
			'秋田',
		),
		'6'  => array(
			38.46792488,
			139.4934229,
			9,
			'山形',
		),
		'7'  => array(
			37.44259095,
			140.0509644,
			9,
			'福島',
		),
		'8'  => array(
			36.341813,
			140.066793,
			9,
			'茨城',
		),
		'9'  => array(
			36.565725,
			139.883565,
			10,
			'栃木',
		),
		'10' => array(
			36.301208,
			139.260156,
			11,
			'群馬',
		),
		'11' => array(
			35.927428,
			139.618933,
			11,
			'埼玉',
		),
		'12' => array(
			35.605058,
			140.123308,
			10,
			'千葉',
		),
		'13' => array(
			35.689521,
			139.691704,
			11,
			'東京',
		),
		'14' => array(
			35.4097753,
			139.562514,
			11,
			'神奈川',
		),
		'15' => array(
			37.552418,
			138.783221,
			9,
			'新潟',
		),
		'16' => array(
			36.72929,
			137.201338,
			11,
			'富山',
		),
		'17' => array(
			36.494682,
			136.425573,
			10,
			'石川',
		),
		'18' => array(
			35.995219,
			136.121642,
			10,
			'福井',
		),
		'19' => array(
			35.664158,
			138.568449,
			10,
			'山梨',
		),
		'20' => array(
			36.451289,
			138.181224,
			10,
			'長野',
		),
		'21' => array(
			35.421227,
			136.662291,
			11,
			'岐阜',
		),
		'22' => array(
			34.976978,
			138.383054,
			10,
			'静岡',
		),
		'23' => array(
			35.180188,
			136.946565,
			11,
			'愛知',
		),
		'24' => array(
			34.980283,
			136.408591,
			11,
			'三重',
		),
		'25' => array(
			35.254531,
			136.09859,
			10,
			'滋賀',
		),
		'26' => array(
			34.851004,
			135.755608,
			11,
			'京都',
		),
		'27' => array(
			34.686316,
			135.479711,
			11,
			'大阪',
		),
		'28' => array(
			34.731279,
			135.163025,
			11,
			'兵庫',
		),
		'29' => array(
			34.615333,
			135.732744,
			11,
			'奈良',
		),
		'30' => array(
			34.226034,
			135.167506,
			11,
			'和歌山',
		),
		'31' => array(
			35.503869,
			134.237672,
			10,
			'鳥取',
		),
		'32' => array(
			35.222297,
			132.610499,
			9,
			'島根',
		),
		'33' => array(
			34.661772,
			133.934675,
			11,
			'岡山',
		),
		'34' => array(
			34.39656,
			132.809622,
			10,
			'広島',
		),
		'35' => array(
			34.186121,
			131.45512,
			10,
			'山口',
		),
		'36' => array(
			34.06577,
			134.149303,
			10,
			'徳島',
		),
		'37' => array(
			34.340149,
			134.043444,
			11,
			'香川',
		),
		'38' => array(
			33.84166,
			132.765362,
			11,
			'愛媛',
		),
		'39' => array(
			33.559705,
			133.53108,
			10,
			'高知',
		),
		'40' => array(
			33.606785,
			130.508314,
			10,
			'福岡',
		),
		'41' => array(
			33.249367,
			129.798822,
			10,
			'佐賀',
		),
		'42' => array(
			32.744839,
			129.873756,
			11,
			'長崎',
		),
		'43' => array(
			32.789828,
			130.641667,
			11,
			'熊本',
		),
		'44' => array(
			33.358194,
			131.482591,
			10,
			'大分',
		),
		'45' => array(
			31.997109,
			131.223855,
			9,
			'宮崎',
		),
		'46' => array(
			31.560148,
			130.457981,
			10,
			'鹿児島',
		),
		'47' => array(
			26.212401,
			127.680932,
			10,
			'沖縄県',
		),
	);
	static $day_of_week = array(
		1 => '月',
		2 => '火',
		3 => '水',
		4 => '木',
		5 => '金',
		6 => '土',
		7 => '日',
	);
	static $work_code = array(
		0 => '',
		1 => '施工日',
		2 => '休日',
		3 => '会議',
		4 => '研修',
		5 => '支店',
		6 => '準備',
	);
	static $weather_code = array(
		0 => '',
		1 => '晴れ',
		2 => 'くもり',
		3 => '雨',
		4 => '雪',
	);
	public static $url_not_login = '/welcome/404';
	public static $url_loged = '/';
	public static $per_page = 10;
	public static $num_links = 10;

	/**
	 * select
	 * show contstants format input select html
	 *
	 * @param type $name_constants
	 * @param type $field name of tag select
	 * @param type $attributes form css
	 * @return html
	 */
	public static function select($name_constants, $field = '', $value = null, $attributes = array())
	{
		if ($field == '')
			return Form::select($name_constants, $value,Constants::$$name_constants,$attributes,array());
		return Form::select($field, $value, Constants::$$name_constants, $attributes, array());
	}
	/**
	 *
	 * @param type $array
	 * @param type $key
	 * @param type $value
	 * @param type $field
	 * @param type $selected
	 * @param type $attributes
	 * @return select
	 */
	public static function array_to_select($array,$key,$value,$field='',$selected = '', $attributes = array())
	{
		$_array = array();
		if($key)
		{
			foreach ($array as $_temp)
			{
				$_array[$_temp[$key]] = strip_tags(htmlspecialchars($_temp[$value]));
			}

			return Form::select($field, $selected,$_array , $attributes, array());
		}

		return Form::select($field, $selected,$array , $attributes, array());

	}
	/**
	 *
	 * @param type $array
	 * @param type $key
	 * @param type $value
	 * @param type $selected
	 * @return string
	 */
	public static function array_to_option($array,$key,$value,$selected = '')
	{
		$option = '';
		$_array = array();
		foreach ($array as $_temp)
		{
			if(isset($_temp[$value]))
			{
				$_array[$_temp[$key]] = strip_tags(htmlspecialchars($_temp[$value]));
			}
		}

		foreach ($_array as $_key => $_value)
		{
			if($selected == $_key)
			{
				$option .= '<option value="'.$_key.'" selected="selected">'.$_value.'</option>';
			}
			else
			{
				$option .= '<option value="'.$_key.'">'.$_value.'</option>';
			}
		}

		return $option;
	}
	public static function to_option($array,$selected = '')
	{
		$option = '';
		foreach ($array as $_key => $_value)
		{
			if($selected == $_key)
			{
				$option .= '<option value="'.$_key.'" selected="selected">'.$_value.'</option>';
			}
			else
			{
				$option .= '<option value="'.$_key.'">'.$_value.'</option>';
			}
		}

		return $option;
	}
	public static function to_jp_date($year,$month = 1,$day = 1)
	{
		if( ! checkdate($month, $day, $year) || $year < 1800)
		{
			return false;
		}

		$date = (int) sprintf('%04d%02d%02d', $year, $month, $day);
		if($date >= 19890108)
		{
			$era = '平成';
			$jp_year = $year - 1988;
		}

		elseif($date >= 19261225)
		{
			$era = '昭和';
			$jp_year = $year - 1925;
		}

		elseif($date >= 19120730)
		{
			$era = '大正';
			$jp_year = $year - 1911;
		}

		elseif($date >= 18680125)
		{
			$era = '明治';
			$jp_year = $year - 1867;
		}

		elseif($date >= 18650407)
		{
			$era = '慶応';
			$jp_year = $year - 1864;
		}

		elseif ($date >= 18640220)
		{
			$era = '元治';
			$jp_year = $year - 1863;
		}

		elseif ($date >= 18610219)
		{
		$era = '文久';
		$jp_year = $year - 1860;
		}

		elseif ($date >= 18600318)
		{
			$era = '万延';
			$jp_year = $year - 1859;
		}

		elseif ($date >= 18541127)
		{
			$era = '安政';
			$jp_year = $year - 1853;
		}

		elseif ($date >= 18480228)
		{
			$era = '嘉永';
			$jp_year = $year - 1847;
		}

		elseif ($date >= 18441202)
		{
			$era = '弘化';
			$jp_year = $year - 1843;
		}

		elseif ($date >= 18301210)
		{
			$era = '天保';
			$jp_year = $year - 1829;
		}

		elseif($date >= 18180422)
		{
			$era = '文政';
			$jp_year = $year - 1817;
		}

		elseif($date >= 18040211)
		{
			$era = '文化';
			$jp_year = $year - 1803;
		}

		elseif ($date >= 18010205)
		{
			$era = '享和';
			$jp_year = $year - 1800;
		}

		else
		{
		  $era = '寛政';
		  $jp_year = $year - 1789;
		}

		if ($jp_year == 1)
		{
			$wareki = $year.'年 '.'（'.$era.'元年'.'）';
		}

		else
		{
			$wareki = $year.'年 '.'（'.$era.$jp_year.'年'.'）';
		}

		return $wareki;
	}
	public static function get_inspection_date()
	{
		$year = (int)date('Y');
		self::$inspection_date[''] = '年を選択して下さい';
		for($i = 0; $i < 5; ++$i)
		{
			self::$inspection_date[$year + $i] = self::to_jp_date($year + $i);
		}

		return self::$inspection_date;
	}
	public static function convert_kana($text)
	{
		$str = mb_convert_kana($text,'r');
		$str = mb_convert_kana($str,'n');
		$str = mb_convert_kana($str,'a');
		$str = mb_convert_kana($str,'k');
		$str = mb_convert_kana($str,'s');
		return $str;
	}

}
