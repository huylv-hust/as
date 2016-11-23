  <script>        
// shaken price　ibaragi (9)

   $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p9 #select_1,#ins_p9 .c_1').serializeArray();
   		$('#ins_p9 #results_1').empty();
   		var sum = 42370;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p9 #results_1').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p9 #results_1').text(sum);
        }
    }
 
    $(".c_1:checkbox,.c_1:radio").click(countUpDown);
    $("#ins_p9 #select_1").change(countUpDown);
    countUpDown();
 
  });
  
 
 
     $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p9 #select_2,#ins_p9 .c_2').serializeArray();
   		$('#ins_p9 #results_2').empty();
   		var sum = 53940;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p9 #results_2').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p9 #results_2').text(sum);
        }
    }
 
 
     $(".c_2:checkbox,.c_2:radio").click(countUpDown);
    $("#ins_p9 #select_2").change(countUpDown);
    countUpDown();
 
  });
  
  
       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p9 #select_3,#ins_p9 .c_3').serializeArray();
   		$('#ins_p9 #results_3').empty();
   		var sum = 62140;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p9 #results_3').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p9 #results_3').text(sum);
        }
    }
 
    $(".c_3:checkbox,.c_3:radio").click(countUpDown);
    $("#ins_p9 #select_3").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p9 #select_4,#ins_p9 .c_4').serializeArray();
   		$('#ins_p9 #results_4').empty();
   		var sum = 70440;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p9 #results_4').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p9 #results_4').text(sum);
        }
    }
 
    $(".c_4:checkbox,.c_4:radio").click(countUpDown);
    $("#ins_p9 #select_4").change(countUpDown);
    countUpDown();
 

});

$(document).ready(function(){
	$(".dn1").css("display", "none");
	$(".dn2").css("display", "none");
	$(".dn3").css("display", "none");
	$(".dn4").css("display", "none");
});


$(function() {
    $('.psb1').click(function(){ $(".dn1").css("display", "none");$(".db1").show();});
	$('.psb2').click(function(){ $(".dn1").show();$(".db1").css("display", "none");});
	$('.psb3').click(function(){ $(".dn1").show();$(".db1").css("display", "none");});
	$('.psb4').click(function(){ $(".dn1").show();$(".db1").css("display", "none");});
	
	$('.psb5').click(function(){ $(".dn2").css("display", "none");$(".db2").show();});
	$('.psb6').click(function(){ $(".dn2").show();$(".db2").css("display", "none");});
	$('.psb7').click(function(){ $(".dn2").show();$(".db2").css("display", "none");});
	$('.psb8').click(function(){ $(".dn2").show();$(".db2").css("display", "none");});
	
	$('.psb9').click(function(){ $(".dn3").css("display", "none");$(".db3").show();});
	$('.psb10').click(function(){ $(".dn3").show();$(".db3").css("display", "none");});
	$('.psb11').click(function(){ $(".dn3").show();$(".db3").css("display", "none");});
	$('.psb12').click(function(){ $(".dn3").show();$(".db3").css("display", "none");});
	
	$('.psb13').click(function(){ $(".dn4").css("display", "none");$(".db4").show();});
	$('.psb14').click(function(){ $(".dn4").show();$(".db4").css("display", "none");});
	$('.psb15').click(function(){ $(".dn4").show();$(".db4").css("display", "none");});
	$('.psb16').click(function(){ $(".dn4").show();$(".db4").css("display", "none");});
});

 
  </script>

	<div id="mainarea">
		<h3 class="tit"><span>宇佐美の車検</span></h3>
		<div id="inspection">
        <h2 class="btit">水戸（６号水戸 ）の料金表</h2>
        <p class="sub">車検のご予約は満了日の6ヶ月前から承ります。最大18,000円の割引！赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>
        


<h2 class="btit">各コースの内容</h2>


<div class="bt_car bge4"><span class="arrow">+</span>ベーシック</div>
<ul id="course">
<li>法定24ヶ月点検</li>
<li>完成検査</li>
<li>登録証明</li>
<li>100項目点検</li>
<li>整備保証</li>
<li>洗車</li>
<li>ローテション</li>
<li>コンピューター診断</li>
</ul>


<div class="bt_car bge1"><span class="arrow">+</span>エコノミー・エコ</div>
<ul id="course">
<li>法定24ヶ月点検</li>
<li>完成検査</li>
<li>登録証明</li>
<li>100項目点検</li>
<li>整備保証</li>
<li>洗車</li>
<li>ローテション</li>
<li>コンピューター診断</li>
<li>代車</li>
<li>ブレーキオーバーホール（部品代別途）</li>
<li>ブレーキオイル</li>
<li>燃料ライン洗浄</li>
</ul>

<div class="bt_car bge2"><span class="arrow">+</span>スタンダード・エコ</div>
<ul id="course">
<li>法定24ヶ月点検</li>
<li>完成検査</li>
<li>登録証明</li>
<li>100項目点検</li>
<li>整備保証</li>
<li>洗車</li>
<li>ローテション</li>
<li>コンピューター診断</li>
<li>代車</li>
<li>ブレーキオーバーホール（部品代別途）</li>
<li>ブレーキオイル</li>
<li>燃料ライン洗浄</li>
<li>ヘッドライトクリーン＆プロテクト</li>
</ul>

<div class="bt_car bge3"><span class="arrow">+</span>プレミアム・エコ</div>
<ul id="course">
<li>法定24ヶ月点検</li>
<li>完成検査</li>
<li>登録証明</li>
<li>100項目点検</li>
<li>整備保証</li>
<li>洗車</li>
<li>ローテション</li>
<li>コンピューター診断</li>
<li>代車</li>
<li>ブレーキオーバーホール（部品代別途）</li>
<li>ブレーキオイル</li>
<li>燃料ライン洗浄</li>
<li>エンジンオイル交換（フルコース）</li>
<li>ヘッドライトクリーン＆プロテクト</li>
</ul>

<h2 class="btit">料金表</h2>
			<form id="ins_p9">

				<div class="bt_car bt_car_1"><span class="arrow">+</span>軽自動車</div>
                
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg2"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・アルト等</span></td>
                  </tr>
                  <tr>
                    <td class="bg1 bascc">車検点検料金<br />ベーシック</td>
                    <td class="bg2"><label><input class="c_1 psb1" type="radio" name="checkbox1" value="0" checked="checked"> ¥8,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー・エコ</td>
                    <td class="bg2"><label><input class="c_1 psb2" type="radio" name="checkbox1" value="+24000"> ¥32,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br />スタンダード・エコ</td>
                    <td class="bg2"><label><input class="c_1 psb3" type="radio" name="checkbox1" value="+30000"> ¥38,000</label></td>
                  </tr>
                <tr>
                　　<td class="bg1 premcc">車検点検料金<br />プレミアム・エコ</td>
                    <td class="bg2"><label><input class="c_1 psb4" type="radio" name="checkbox1" value="+37000"> ¥45,000</label></td>
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
                    <td class="bg2">¥1,400</td>
                  </tr>
                <td class="bg1">事前点検<br />割引</td>
                  <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db1">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db1">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">家族<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db1">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db1">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">他社見積<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db1">-</span></td>
                  </tr>
                  <tr>
                    <td class="bg1">リピート<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db1">-</span></td>
                  </tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg2"><strong class="red dn1">¥<span id="results_1"></span></strong><strong class="red db1">¥42,370</strong></td>
                    </tr>
                </table>

				<div class="bt_car bt_car_2"><span class="arrow">+</span>小型自動車（〜1,000kg）</div>
				<table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg3"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・フィット等</span></td>
                  </tr>
                  <tr>
                    <td class="bg1 bascc">車検点検料金<br />ベーシック</td>
                    <td class="bg3"><label><input class="c_2 psb5" type="radio" name="checkbox2" value="0" checked="checked"> ¥8,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー・エコ</td>
                    <td class="bg3"><label><input class="c_2 psb6" type="radio" name="checkbox2" value="+24000"> ¥32,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br />スタンダード・エコ</td>
                    <td class="bg3"><label><input class="c_2 psb7" type="radio" name="checkbox2" value="+30000"> ¥38,000</label></td>
                  </tr>
                <tr>
                　　<td class="bg1 premcc">車検点検料金<br />プレミアム・エコ</td>
                    <td class="bg3"><label><input class="c_2 psb8" type="radio" name="checkbox2" value="+37000"> ¥45,000</label></td>
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
                    <td class="bg3">¥1,700</td>
                  </tr>
                    <td class="bg1">事前点検<br />割引</td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db2">-</span></td>
                    </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db2">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">家族<br />割引</td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db2">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db2">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">他社見積<br />割引</td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db2">-</span></td>
                  </tr>
                  <tr>
                    <td class="bg1">リピート<br />割引</td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db2">-</span></td>
                  </tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg3"><strong class="red dn2">¥<span id="results_2"></span></strong><strong class="red db2">¥53,940</strong></td>
                    </tr>
                </table>

				<div class="bt_car bt_car_3"><span class="arrow">+</span>中型自動車（1,001kg〜1,500kg以下）</div>
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg4"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜1,500kg以下）<br />カローラ・アコード等</span></td>
                  </tr>
                  <tr>
                    <td class="bg1 bascc">車検点検料金<br />ベーシック</td>
                    <td class="bg4"><label><input class="c_3 psb9" type="radio" name="checkbox3" value="0" checked="checked"> ¥8,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー・エコ</td>
                    <td class="bg4"><label><input class="c_3 psb10" type="radio" name="checkbox3" value="+24000"> ¥32,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br />スタンダード・エコ</td>
                    <td class="bg4"><label><input class="c_3 psb11" type="radio" name="checkbox3" value="+30000"> ¥38,000</label></td>
                  </tr>
                <tr>
                　　<td class="bg1 premcc">車検点検料金<br />プレミアム・エコ</td>
                    <td class="bg4"><label><input class="c_3 psb12" type="radio" name="checkbox3" value="+37000"> ¥45,000</label></td>
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
                    <td class="bg4">¥1,700</td>
                  </tr>
                    <td class="bg1">事前点検<br />割引</td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db3">-</span></td>
                    </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db3">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">家族<br />割引</td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db3">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db3">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">他社見積<br />割引</td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db3">-</span></td>
                  </tr>
                  <tr>
                    <td class="bg1">リピート<br />割引</td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db3">-</span></td>
                  </tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg4"><strong class="red dn3">¥<span id="results_3"></span></strong><strong class="red db3">¥62,140</strong></td>
                    </tr>
                </table>
				<div class="bt_car bt_car_4"><span class="arrow">+</span>大型自動車（1,501kg〜2,000kg以下）</div>
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg5"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜2,000kg以下）<br />クラウン・エスティマ等</span></td>
                  </tr>
                  <tr>
                    <td class="bg1 bascc">車検点検料金<br />ベーシック</td>
                    <td class="bg5"><label><input class="c_4 psb13" type="radio" name="checkbox4" value="0" checked="checked"> ¥8,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー・エコ</td>
                    <td class="bg5"><label><input class="c_4 psb14" type="radio" name="checkbox4" value="+24000"> ¥32,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br />スタンダード・エコ</td>
                    <td class="bg5"><label><input class="c_4 psb15" type="radio" name="checkbox4" value="+30000"> ¥38,000</label></td>
                  </tr>
                <tr>
                　　<td class="bg1 premcc">車検点検料金<br />プレミアム・エコ</td>
                    <td class="bg5"><label><input class="c_4 psb16" type="radio" name="checkbox4" value="+37000"> ¥45,000</label></td>
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
                    <td class="bg5">¥1,800</td>
                  </tr>
                    <td class="bg1">事前点検<br />割引</td>
                      <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db4">-</span></td>
                    </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">家族<br />割引</td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">他社見積<br />割引</td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db4">-</span></td>
                  </tr>
                  <tr>
                    <td class="bg1">リピート<br />割引</td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db4">-</span></td>
                  </tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg5"><strong class="red dn4">¥<span id="results_4"></span></strong><strong class="red db4">¥70,440</strong></td>
                  </tr>
                </table>
			</form>
             
              <div class="pd10">
              <a class="grebt" href="<?php echo Uri::base() ?>inspection/maplist??sscode=353030">この店舗でご予約</a>
              </div>
             
             
             <div class="pd10">
             <a class="grebt" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
             </div>
       
            
			<p class="cap sub">※価格は税込みです。<br />
                  ※輸入車の場合はプラス10,800円がかかります<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※ベーシックコース以外は、オプションプランになっております。ご希望の方はご予約の際に承ります。<br />※トラックのご予約は承っておりません。</p> 
                  
                 

			<div id="com_bt">
				<ul>
					<li class="pr5"><a class="c_gre" href="<?php  echo Uri::base() ?>inspection/search">車検の<br>ご予約</a></li>
					<li class="pr5"><a class="c_dblue" href="<?php  echo Uri::base() ?>inspection/howto">車検の<br>流れ</a></li>
					<li><a class="c_blue" href="./">車検<br>TOP</a></li>
				</ul>
			</div>

		</div><!--/inspection-->
	</div><!--/mainarea-->


