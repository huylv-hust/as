<?php Fuel\Core\Config::load('apidefine'); ?>
<script type="text/javascript">

	// 地図APIサーバ指定
	Mfapi.mapHost = '<?php echo Fuel\Core\Config::get('map_host');?>';
	Mfapi.auth('<?php echo Fuel\Core\Config::get('map_appid');?>', drawMap)

	// 各種処理：認証手続き完了後に、実行されます。
	function drawMap() {

		//###### 地図描画 ######

		// 地図作成条件の設定：MapOptionsクラス参照

		var options = {
			centerPosition: new Mfapi.Util.LonLat(<?php echo $ss_info[0]['lon']; ?>, <?php echo $ss_info[0]['lat']; ?>),
			mapScale: 12,
			zoomButtonOffset: Mfapi.Util.ScreenPoint(35, 35),
			mapStyle: 'std_sp'

		};

		// 地図初期処理メソッドの実行：id='map_canvas'のDIVタグ上に地図を生成します。
		if (Mfapi.mapCreate('map_canvas', options) == false) {
			window.alert('地図作成に失敗しました。');
		}

		function onMoveMapCenter(position, pointData)
		{
			$.post('<?php echo Fuel\Core\Uri::base()?>inspection/maplist/map_move',
				{
					'lat':position.lat,
					'lon':position.lon,
					'menu_code':'<?php echo Fuel\Core\Uri::segment(1)?>'
				},
				function(data){
					arr_data = data.split('||');
					$("#data_ss_list").html(arr_data['1']);
					drawSSToMap(Mfapi,eval(arr_data['0']));
				}
			);
		};

		//Mfapi.Events.onChangedMapCenter = onMoveMapCenter;
		//###### マーカー描画 ######
		<?php
		$current_lat = $ss_info[0]['lat'];
		$current_lon = $ss_info[0]['lon'];
		?>
		// マーカーのデータ
		offsetData = [
			{name: '<?php echo $ss_info[0]['ss_name']; ?>', lon: <?php echo $current_lon; ?>, lat: <?php echo $current_lat; ?>,
			text: '<div id="makera"><a href="https://usappy.jp/ss/<?php echo $ss_info[0]['sscode']; ?>" target="_blank"><?php echo $ss_info[0]['ss_name']; ?></a><br /><?php echo $ss_info[0]['address']; ?><br />Tel <?php echo $ss_info[0]['tel']; ?><br /><a href="<?php echo \Uri::base().'inspection/reserve?sscode='.$ss_info[0]['sscode']; ?>" class="rese">予約する</a></div>',
					popUpType: 2, imageUrl: '<?php echo \Uri::base(); ?>assets/img/bl1s.png', width: 87, height: 48},
		];
		pointData = [
		{name: '<?php echo $ss_info[0]['ss_name']; ?>', lon: <?php echo $current_lon; ?>, lat: <?php echo $current_lat; ?>,
			text: '<div id="makera"><a href="https://usappy.jp/ss/<?php echo $ss_info[0]['sscode']; ?>" target="_blank"><?php echo $ss_info[0]['ss_name']; ?></a><br /><?php echo $ss_info[0]['address']; ?><br />Tel <?php echo $ss_info[0]['tel']; ?><br /><a href="<?php echo \Uri::base().'inspection/reserve?sscode='.$ss_info[0]['sscode']; ?>" class="rese">予約する</a></div>',
					popUpType: 2, imageUrl: '<?php echo $ss_info[0]['icon']; ?>', width: 30, height: 30},
		<?php if (isset($list_ss) && $list_ss != null) { ?>
		<?php foreach ($list_ss as $items) { ?>
		{name: '<?php echo $items['ss_name'] ?>', lon: <?php echo $items['lon'] ?>, lat: <?php echo $items['lat'] ?>,
			text: '<div id="makera"><a href="https://usappy.jp/ss/<?php echo $items['sscode'] ?>" target="_blank"><?php echo $items['ss_name'] ?></a><br /><?php echo $items['address'] ?><br />Tel <?php echo $items['tel'] ?><br /><a href="<?php echo \Uri::base().'inspection/reserve?sscode='.$items['sscode']; ?>" class="rese">予約する</a></div>',
					popUpType: 2, imageUrl: '<?php echo $items['icon'] ?>', width: 30, height: 30},
		<?php } } ?>
		];

		//start draw ss
		drawSSToMap(Mfapi, pointData);
		drawInspectionIcon(Mfapi, offsetData[0]);

	}

	function drawInspectionIcon(Mfapi,pointData)
	{
	   Mfapi.Map.addMarkerLayer('markerlayer2');
	   // マーカー作成条件の設定
	   var id2 = pointData.lon + '-marker';
	   var opt2 = {
		position: new Mfapi.Util.LonLat(pointData.lon, pointData.lat),
		imageOffset : new Mfapi.Util.ScreenPoint(-45, -65)
	   };
	   if (pointData.imageUrl !== undefined) {
		opt2.imageUrl = pointData.imageUrl;
		opt2.imageSize = new Mfapi.Util.ScreenSize(pointData.width, pointData.height);
	   } else {
		opt2.markerType = pointData.markerType;
	   }

	   // マーカー作成＆マーカーレイヤーに登録
	   Mfapi.Map.MarkerLayer["markerlayer2"].addMarker(opt2, id2);

	}

	function drawSSToMap(Mfapi, pointData)
	{
		// マーカーレイヤー
		Mfapi.Map.addMarkerLayer('markerlayer1');

		// マーカー
		for (var i = 0; i < pointData.length; i++) {

			// ポップアップ作成条件の設定
			var id1 = pointData[i].name + '-popup';
			var opt1 = {
				size: new Mfapi.Util.ScreenSize(200, 100),
				popUpType: pointData[i].popUpType,
				contentHtml: pointData[i].text,
				visible: false
			};

			// ポップアップ作成
			Mfapi.Features.createPopUp(opt1, id1);

			// マーカー作成条件の設定
			var id2 = pointData[i].name + '-marker';
			var opt2 = {
				position: new Mfapi.Util.LonLat(pointData[i].lon, pointData[i].lat),
				popUpKey: id1
			};
			if (pointData[i].imageUrl !== undefined) {
				opt2.imageUrl = pointData[i].imageUrl;
				opt2.imageSize = new Mfapi.Util.ScreenSize(pointData[i].width, pointData[i].height);
			} else {
				opt2.markerType = pointData[i].markerType;
			}

			// マーカー作成＆マーカーレイヤーに登録
			Mfapi.Map.MarkerLayer["markerlayer1"].addMarker(opt2, id2);
		}

	}
</script>


<h3 class="tit"><span>車検のご予約</span></h3>
<h4 class="subtit">地図から探す</h4>

<div id="ss_search">
	<div id="map_canvas"></div><!-- map-->
</div><!--/ss_search-->

<h4 class="subtit">車検工場（WEB予約可能）</h4>
<p class="pd10 clear" style="font-size:16px; font-weight:bold;">※車検工場へ直接来店される方のみWEB予約が可能です。</p>
<?php
if ($ss_info[0]['sscode'] == '330840' or $ss_info[0]['sscode'] == '249733' ){
	echo '<p class="pd10">※当SSは認証工場の為、土日祝の受付及び整備は行なえますが、『検査（車検）』に関しては平日のみ実施となりますので、土日祝にご予約を希望されるお客様は店舗にご確認下さい。<br>尚、『1日車検』『55分車検』に於きましても実施しておりません。ご予約は検査日の一週間前までの受付とさせて頂きます。</p>';
	}
?>
<div id="sslist">
	<ul>
		<li>
			<a href="https://usappy.jp/ss/<?php echo $ss_info[0]['sscode']; ?>" target="_blank" class="ssname"><?php echo $ss_info[0]['ss_name']; ?></a>
			<p>TEL:<?php echo $ss_info[0]['tel']; ?><br />
				住所:<?php echo $ss_info[0]['address']; ?>　<br />
				管轄会社・支店:<?php echo $ss_info[0]['branch_name']; ?>
			</p>
			 <div class="pd10">
				<a class="grebt" href="<?php echo \Uri::base().'inspection/reserve?sscode='.$ss_info[0]['sscode']; ?>">このSSで予約する</a>
			 </div>
		</li>
	</ul>
</div>

<h4 class="subtit" style="margin-top:40px;">車検受付店舗一覧</h4>
<p class="pd10 clear" style="font-size:16px; font-weight:bold;">※下記SSでWEB予約は行なえません。詳しくは各SSへお問い合わせ下さい。</p>
<div id="sslist">
	<ul id="data_ss_list">
		<?php if (isset($list_ss) && $list_ss != null) { ?>
		<?php foreach ($list_ss as $items) { ?>
		<li>
			<a href="https://usappy.jp/ss/<?php echo $items['sscode']; ?>" target="_blank" class="ssname"><?php echo $items['ss_name']; ?></a>
			<p>TEL:<?php echo $items['tel']; ?><br />
				住所:<?php echo $items['address']; ?>　<br />
				管轄会社・支店:<?php echo $items['branch_name']; ?>
			</p>
		</li>
		<?php } } ?>
	</ul>
</div><!--/slist-->

