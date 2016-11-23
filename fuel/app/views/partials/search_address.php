<?php Fuel\Core\Config::load('apidefine');?>

	<h3 class="tit"><?php echo $title; ?>のご予約</h3>
	<div id="search_key">
		<form  action="" method="post">
			<input type="text" id="address" name="address" class="seabox" value="<?php echo $address; ?>"/>
			<input type="button" class="seabt search-address" value="検索" onClick="searchAddress();"/>
		</form>
	</div>
	<p class="cap clear"> ※複数の単語で検索する場合は、スペースで区切って入力してください。　例：東京都　大森</p>


	<h4 class="subtit">住所フリーワード: 「<span class="search-key">神奈川県横浜市戸塚</span>」<span class="rearch-message">で下記の住所候補が見つかりました。住所を選択してください。</span></h4>

	<div id="adlist">

	</div><!--/adlist-->


<script>
	var curr = moment().format('YYYYMMDDHHMMSS');
	$(function (e)
    {
		Util.getKey("<?php echo Fuel\Core\Config::get('map_appid');?>","<?php echo Fuel\Core\Config::get('map_auth_host');?>",curr,search);
//		if($('#address').val()!=''){
//			searchAddress();
//		}
	});

	function searchAddress(){
		$('.search-address').attr('disabled','disabled');
		if(Util.checkCookie('key')!=''){
			search();
		}else{
			Util.getKey("<?php echo Fuel\Core\Config::get('map_appid');?>","<?php echo Fuel\Core\Config::get('map_auth_host');?>",curr,search);
		}
	}
	function search(){
	   var address = $('#address').val();
	   $('.search-key').text(address);
	   var auth_key = Util.getCookie('key');
	   $('#adlist').html('');
	   if(Util.checkCookie('key') == ''){
			$('.search-address').removeAttr('disabled');
			alert("認証キーの取得に失敗しました。");
			return;
	   }


	   if(address == ''){
		   $('.search-address').removeAttr('disabled');
		   $('.subtit').hide();
		   return;
	   }
	   var search_host = "<?php echo Fuel\Core\Config::get('map_search_host');?>";
	   $.ajax({
        type: "GET",
        url: "https://"+search_host+"/v1/addr?key="+auth_key+"&addr="+address,
        dataType: 'jsonp',
        async:true,
        crossDomain:true,
        success: function (data) {
			$('.subtit').show();
			$('.search-address').removeAttr('disabled');
			var option = '<ul>';
			if(data.results){
				$('.rearch-message').text('で下記の住所候補が見つかりました。住所を選択してください。');
				$.each( data.results, function( index, value ){
					option += '<li><a href="<?php echo Uri::base().Uri::segment('1'); ?>/maplist?lat='+value.lat+'&lon='+value.lon+'&name='+value.name+'">'+value.name+'</a></li>'
				});

			}else{
				$('.rearch-message').text('で住所候補が見つかりませんでした。');
			}
			$('#adlist').append(option);
        },
		error : function (data) {
           $('.search-address').removeAttr('disabled');
        }
    });
	};

</script>
