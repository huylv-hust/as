 <script>        
       // shaken price　chiba (11)

   $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p11 #select_1,#ins_p11 .c_1').serializeArray();
   		$('#ins_p11 #results_1').empty();
   		var sum = 59570;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p11 #results_1').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p11 #results_1').text(sum);
        }
    }
 
    $(".c_1:checkbox,.c_1:radio").click(countUpDown);
    $("#ins_p11 #select_1").change(countUpDown);
    countUpDown();
 
  });
  
 
 
     $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p11 #select_2,#ins_p11 .c_2').serializeArray();
   		$('#ins_p11 #results_2').empty();
   		var sum = 70840;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p11 #results_2').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p11 #results_2').text(sum);
        }
    }
 
    $(".c_2:checkbox,.c_2:radio").click(countUpDown);
    $("#ins_p11 #select_2").change(countUpDown);
    countUpDown();
 
  });
  
  
       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p11 #select_3,#ins_p11 .c_3').serializeArray();
   		$('#ins_p11 #results_3').empty();
   		var sum = 79040;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p11 #results_3').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p11 #results_3').text(sum);
        }
    }
 
    $(".c_3:checkbox,.c_3:radio").click(countUpDown);
    $("#ins_p11 #select_3").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p11 #select_4,#ins_p11 .c_4').serializeArray();
   		$('#ins_p11 #results_4').empty();
   		var sum = 87240;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p11 #results_4').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p11 #results_4').text(sum);
        }
    }
 
    $(".c_4:checkbox,.c_4:radio").click(countUpDown);
    $("#ins_p11 #select_4").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p11 #select_5,#ins_p11 .c_5').serializeArray();
   		$('#ins_p11 #results_5').empty();
   		var sum = 50470;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p11 #results_5').text());
    	var sum = sumNumbers ();
         {
        	$('#ins_p11 #results_5').text(sum);
        }
    }
 
    $(".c_5:checkbox,.c_5:radio").click(countUpDown);
    $("#ins_p11 #select_5").change(countUpDown);
    countUpDown();
 
  });


  </script>

	<div id="mainarea">
		<h3 class="tit"><span>宇佐美の車検</span></h3>
		<div id="inspection">
        <h2 class="btit">千葉（第二湾岸千葉新港）の料金表</h2>
			<p class="sub">最大16,000円の割引！赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>

            
 <h2 class="btit">各コースの内容</h2>


<div class="bt_car bge1"><span class="arrow">+</span>エコノミーコース＊24ヶ月点検・診断</div>
<ul id="course">
<li>24ヶ月点検</li>
<li>完成検査</li>
<li>100項目点検・調整</li>
<li>整備保障</li>
</ul>

<div class="bt_car bge2"><span class="arrow">+</span>Cコース＊燃費向上・フィーリングアップ</div>
<ul id="course">
<li>24ヶ月点検</li>
<li>完成検査</li>
<li>100項目点検・調整</li>
<li>整備保障</li>
<li>コンピューター診断</li>
<li>燃料ライン洗浄</li>
</ul>

<div class="bt_car bge3"><span class="arrow">+</span>Bコース＊限りなく新車の状態に戻す</div>
<ul id="course">
<li>24ヶ月点検</li>
<li>完成検査</li>
<li>100項目点検・調整</li>
<li>整備保障</li>
<li>コンピューター診断</li>
<li>燃料ライン洗浄</li>
<li>オイルライン洗浄</li>
<li>オイルフィルター</li>
<li>エンジンオイル(※別途エンジンオイル代金はかかります。)</li>
</ul>          

<div class="bt_car bge4"><span class="arrow">+</span>Aコース＊フルメンテナンス</div>
<ul id="course">
<li>24ヶ月点検</li>
<li>完成検査</li>
<li>100項目点検・調整</li>
<li>整備保障</li>
<li>コンピューター診断</li>
<li>燃料ライン洗浄</li>
<li>オイルライン洗浄</li>
<li>オイルフィルター</li>
<li>エンジンオイル</li>
<li>ブレーキ調整・給油</li>
<li>窒素充填</li>
<li>ブーツコート加工</li>
</ul>        

 <h2 class="btit">料金表</h2>

		  <form id="ins_p11">

				<div class="bt_car bt_car_1"><span class="arrow">+</span>軽自動車</div>

			  <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg2"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・アルト等</span></td>
                </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br>エコノミー</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="0" checked="checked">　¥25,500</label></td>
                </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br>Cコース</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="+3800">　¥29,300</label></td>
                </tr>
                <tr>
                    <td class="bg1 premcc">車検点検料金<br>Bコース</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="+7600">　¥33,100</label></td>
                </tr>
                <tr>
                    <td class="bg1 fulmcc">車検点検料金<br>Aコース</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="+13600">　¥39,100</label></td>
                </tr>
                <tr>
                    <td class="bg1">重量税</td>
                    <td class="bg2">¥6,600</td>
                </tr>
                <tr>
                    <td class="bg1">自賠責</td>
                    <td class="bg2">¥26,370</td>
                </tr>
                <tr>
                    <td class="bg1">印紙代</td>
                    <td class="bg2">¥1,100</td>
                </tr>
                <tr>
                    <td class="bg1">早期予約または<br />ネット割引<sup>※1</sup></td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">入庫日<br />即決割<sup>※2</sup></td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                  <td class="bg1">事前点検割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">リピート割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">家族割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">ハイブリッド<br />割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">平日<br />割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg2"><strong class="red">¥<span id="results_1"></span></strong></td>
                </tr>
              </table>

			  <div class="bt_car bt_car_2"><span class="arrow">+</span>小型自動車（〜1,000kg）</div>

				<table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg3"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・フィット等</span></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー</td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="0" checked="checked">　¥25,500</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br>Cコース</td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="+3800">　¥29,300</label></td>
                  </tr>
                <tr>
                    <td class="bg1 premcc">車検点検料金<br>Bコース</td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="+7900">　¥33,400</label></td>
                  </tr>
                <tr>
                    <td class="bg1 fulmcc">車検点検料金<br>Aコース</td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="+14900">　¥40,400</label></td>
                  </tr>
                <tr>
                    <td class="bg1">重量税</td>
                    <td class="bg3">¥16,400</td>
                  </tr>
                <tr>
                    <td class="bg1">自賠責</td>
                    <td class="bg3">¥27,840</td>
                  </tr>
                <tr>
                    <td class="bg1">印紙代</td>
                    <td class="bg3">¥1,100</td>
                  </tr>
                <tr>
                    <td class="bg1">早期予約または<br />ネット割引<sup>※1</sup></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">入庫日<br />即決割<sup>※2</sup></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                  <td class="bg1">事前点検割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">リピート割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">家族割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">ハイブリッド<br />割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">平日<br />割引</td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg3"><strong class="red">¥<span id="results_2"></span></strong></td>
                  </tr>
                </table>

				<div class="bt_car bt_car_3"><span class="arrow">+</span>中型自動車（1,001kg〜1,500kg以下）</div>

				<table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg4"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜1,500kg以下）<br />カローラ・アコード等</span></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー</td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="0" checked="checked">　¥25,500</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br>Cコース</td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="+4500">　¥30,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 premcc">車検点検料金<br>Bコース</td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="+8600">　¥34,100</label></td>
                  </tr>
                <tr>
                    <td class="bg1 fulmcc">車検点検料金<br>Aコース</td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="+15600">　¥41,100</label></td>
                  </tr>
                <tr>
                    <td class="bg1">重量税</td>
                    <td class="bg4">¥24,600</td>
                  </tr>
                <tr>
                    <td class="bg1">自賠責</td>
                    <td class="bg4">¥27,840</td>
                  </tr>
                <tr>
                    <td class="bg1">印紙代</td>
                    <td class="bg4">¥1,100</td>
                  </tr>
                <tr>
                    <td class="bg1">早期予約または<br />ネット割引<sup>※1</sup></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">入庫日<br />即決割<sup>※2</sup></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                  <td class="bg1">事前点検割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">リピート割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">家族割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">ハイブリッド<br />割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">平日<br />割引</td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg4"><strong class="red">¥<span id="results_3"></span></strong></td>
                  </tr>
                </table>

				<div class="bt_car bt_car_4"><span class="arrow">+</span>大型自動車（1,501kg〜2,000kg以下）</div>

				<table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg5"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜2,000kg以下）<br />クラウン・エスティマ等</span></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー</td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="0" checked="checked">　¥25,500</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br>Cコース</td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="+5500">　¥31,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 premcc">車検点検料金<br>Bコース</td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="+9600">　¥35,100</label></td>
                  </tr>
                <tr>
                    <td class="bg1 fulmcc">車検点検料金<br>Aコース</td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="+16600">　¥42,100</label></td>
                  </tr>
                <tr>
                    <td class="bg1">重量税</td>
                    <td class="bg5">¥32,800</td>
                  </tr>
                <tr>
                    <td class="bg1">自賠責</td>
                    <td class="bg5">¥27,840</td>
                  </tr>
                <tr>
                    <td class="bg1">印紙代</td>
                    <td class="bg5">¥1,100</td>
                  </tr>
                <tr>
                    <td class="bg1">早期予約または<br />ネット割引<sup>※1</sup></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">入庫日<br />即決割<sup>※2</sup></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                  <td class="bg1">事前点検割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">リピート割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">家族割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">ハイブリッド<br />割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">平日<br />割引</td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg5"><strong class="red">¥<span id="results_4"></span></strong></td>
                  </tr>
                </table>

				<div class="bt_car bt_car_5"><span class="arrow">+</span>小型バン（車両総重量2,000kg以下）</div>

				<table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg6"><strong>小型バン自動車</strong><br /><span class="cap">（車両総重量2,000kg以下）<br />カローラバン等</span></td>
                </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー</td>
                    <td class="bg6"><label><input class="c_5" type="radio" name="checkbox5" value="0" checked="checked">　¥25,500</label></td>
                </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br>Cコース</td>
                    <td class="bg6"><label><input class="c_5" type="radio" name="checkbox5" value="+4500">　¥30,000</label></td>
                </tr>
                <tr>
                    <td class="bg1 premcc">車検点検料金<br>Bコース</td>
                    <td class="bg6"><label><input class="c_5" type="radio" name="checkbox5" value="+8600">　¥34,100</label></td>
                </tr>
                <tr>
                    <td class="bg1 fulmcc">車検点検料金<br>Aコース</td>
                    <td class="bg6"><label><input class="c_5" type="radio" name="checkbox5" value="+15600">　¥41,100</label></td>
                </tr>
                <tr>
                    <td class="bg1">重量税</td>
                    <td class="bg6">¥6,600</td>
                </tr>
                <tr>
                    <td class="bg1">自賠責</td>
                    <td class="bg6">¥17,270</td>
                </tr>
                <tr>
                    <td class="bg1">印紙代</td>
                    <td class="bg6">¥1,100</td>
                </tr>
                <tr>
                    <td class="bg1">早期予約または<br />ネット割引<sup>※1</sup></td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">入庫日<br />即決割<sup>※2</sup></td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                  <td class="bg1">事前点検割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">リピート割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">家族割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">ハイブリッド<br />割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">平日<br />割引</td>
                    <td class="bg6"><label><input class="c_5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg6"><strong class="red">¥<span id="results_5"></span></strong></td>
                </tr>
                </table>


			</form>
             
              <div class="pd10">
              <a class="grebt" href="<?php echo Uri::base() ?>inspection/maplist?sscode=325106">この店舗でご予約</a>
              </div>
             
             
             <div class="pd10">
             <a class="grebt" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
             </div>
       
            
			<p class="cap sub">※1:早期予約割引とネット割引の併用はできません。早期割引は1年以上先でもOK<br />※2:車検入庫2週間前までに入庫予定を確定していただいたお客様。<br />※価格は税込みです。<br />
                  ※輸入車の場合はプラス10,800円がかかります<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※CCS千葉は立会い車検のため代車の貸し出しはございません。代車代(3,000円)も不要となります。<br />※トラックのご予約は承っておりません。</p> 
                  
                 

			<div id="com_bt">
				<ul>
					<li class="pr5"><a class="c_gre" href="<?php  echo Uri::base() ?>inspection/search">車検の<br>ご予約</a></li>
					<li class="pr5"><a class="c_dblue" href="<?php  echo Uri::base() ?>inspection/howto">車検の<br>流れ</a></li>
					<li><a class="c_blue" href="./">車検<br>TOP</a></li>
				</ul>
			</div>

		</div><!--/inspection-->
	</div><!--/mainarea-->


