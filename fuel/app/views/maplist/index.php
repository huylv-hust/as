<?php
$point = '';
foreach($point_data as $_temp)
{
	$point .= '{ name: \''.$_temp['name'].'\', lon: '.$_temp['lon'].', lat: '.$_temp['lat'].',
				  text: \''.htmlspecialchars_decode($_temp['text']).'\',
				  popUpType: 2, imageUrl:\''.$_temp['imageUrl'].'\', width:30, height:30 },';

}
$point = trim($point,',');

?>
<style>
	#data_ss_list li
	{
		height: 138px;
		overflow: hidden;
	}
</style>
	    <script type="text/javascript">
		// 地図APIサーバ指定
		Mfapi.mapHost = "<?php echo Fuel\Core\Config::get('map_host');?>";
		// 各種処理：認証手続き完了後に、実行されます。
		function task_func() {
			//###### 地図描画 ######
			// 地図作成条件の設定：MapOptionsクラス参照
			var options = {
				centerPosition : new Mfapi.Util.LonLat(<?php echo $lon?>,<?php echo $lat?>),
				mapScale : <?php echo $map_scale ?>,
				zoomButtonOffset : Mfapi.Util.ScreenPoint(880,10)
			};
			// 地図初期処理メソッドの実行：id='map_canvas'のDIVタグ上に地図を生成します。
			if( Mfapi.mapCreate("map_canvas",options) == false ) {
				window.alert("地図作成に失敗しました。");
			}
			pointData = <?php echo '['.$point.']';?>;
			pointData = eval(pointData);
			function onMoveMapCenter(position,pointData)
			{

				$.post("<?php echo Fuel\Core\Uri::base()?>ajax/common/map_move",
					{
						"lat":position.lat,
						"lon":position.lon,
						"menu_code":"<?php echo Fuel\Core\Uri::segment(1)?>"
					},
					function(data){
						arr_data = data.split("||");
						$("#data_ss_list").html(arr_data["1"]);
						drawsscode(Mfapi,eval(arr_data["0"]));
					}
				);

				//alert(position.lat);
			};
			Mfapi.Events.onChangedMapCenter = onMoveMapCenter;
			//###### マーカー描画 ######
			// マーカーのデータ
			drawsscode(Mfapi,pointData);
			// マーカーレイヤー
		}
		function drawsscode(Mfapi,pointData ){
			Mfapi.Map.addMarkerLayer("markerlayer1");
			// マーカー
			for( var i=0; i<pointData.length; i++ ) {
				// ポップアップ作成条件の設定

				var id1 = pointData[i].name+"-popup";
				var opt1 = {
					size : new Mfapi.Util.ScreenSize(200,100),
					popUpType : pointData[i].popUpType,
					contentHtml : pointData[i].text,
					visible : false
				};
				// ポップアップ作成
				Mfapi.Features.createPopUp(opt1, id1);
				// マーカー作成条件の設定
				var id2 = pointData[i].name+"-marker";
				var opt2 = {
					position : new Mfapi.Util.LonLat(pointData[i].lon, pointData[i].lat),
					popUpKey : id1
				};
				if( pointData[i].imageUrl !== undefined ) {
					opt2.imageUrl = pointData[i].imageUrl;
					opt2.imageSize = new Mfapi.Util.ScreenSize( pointData[i].width, pointData[i].height);
				} else {
					opt2.markerType = pointData[i].markerType;
				}
				// マーカー作成＆マーカーレイヤーに登録
				Mfapi.Map.MarkerLayer["markerlayer1"].addMarker(opt2, id2);
			}
		}
		window.onload = function(){
			Mfapi.auth("<?php echo Fuel\Core\Config::get('map_appid');?>", task_func);
		}
</script>
<div id="breadcrumb">
	<ul>
		<li><a href="<?php echo \Fuel\Core\Uri::base()?>">トップページ &gt;</a></li>
		<li><a href="<?php echo \Fuel\Core\Uri::base().\Fuel\Core\Uri::segment(1).'/search/'?>">SSを選ぶ &gt;</a></li>
		<li><?php echo $region_name ?></li>
	</ul>
</div>
<h3 class="tit"><?php echo \Constants::$pit_work[\Fuel\Core\Uri::segment(1)] ?>のご予約</h3>
<h4 class="subtit">地図から探す</h4>
<div id="ss_search">
	<div id="map_canvas" class="olMap"></div><!-- map-->
</div><!--/ss_search-->
<h4 class="subtit">一覧から探す</h4>
<div id="sslist">
	<ul id="data_ss_list">

		<?php
		foreach($array_ss as $row)
		{
			echo '<li>
				<a href="https://usappy.jp/ss/'.$row['sscode'].'" target="_blank" class="ssname">'.$row['ss_name'].'</a>
				<p>TEL:'.$row['tel'].'<br />
					住所:'.$row['address'].'　<br />
					管轄会社・支店:'.$row['branch_name'].'
				</p>
				<a class="btrese" href="'.Fuel\Core\Uri::base().\Fuel\Core\Uri::segment(1).'/reserve/?sscode='.$row['sscode'].'">このSSで予約する</a>
			</li>';
		}
		?>
	</ul>
</div><!--/slist-->
