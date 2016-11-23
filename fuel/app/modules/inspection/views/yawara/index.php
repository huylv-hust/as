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

	<h3 class="tit">車検の料金</h3>


                <div id="inspection">
           

               
                <div id="price_11">
                <div id="price_a">
               <h1>谷和原（２９４号谷和原インター）の料金表</h1>
               <p>車検のご予約は満了日の6ヶ月前から承ります。最大18,000円の割引！赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>
                 </div>
<table border="0" cellspacing="0" cellpadding="0" id="ins_course">
  <tr>
    <td class="about">&nbsp;</td>
    <td class="about">法定24ヶ月<br />点検</td>
    <td class="about">完成<br />検査</td>
    <td class="about">登録<br />証明</td>
    <td class="about">100項目<br />点検</td>
    <td class="about">整備<br />保証</td>
    <td class="about">洗車</td>
    <td class="about">ローテション</td>
    <td class="about">コンピューター<br />診断</td>
    <td class="about">代車</td>
    <td class="about">ブレーキ<br />オーバーホール<sup>※</sup></td>
    <td class="about">ブレーキ<br />オイル</td>
    <td class="about">燃料ライン<br />洗浄</td>
    <td class="about">エンジンオイル<br />交換（フルコース）</td>
    <td class="about">ヘッドライトクリーン<br />＆プロテクト</td>
  </tr>
  <tr>
    <td class="basicc">ベーシック</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares"><span class="cap">+3000円</span></td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
  </tr>
  <tr>
    <td class="economy">エコノミー<br />エコ</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
  </tr>
  <tr>
    <td class="sefty">スタンダード<br />エコ</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">-</td>
  </tr>
  <tr>
    <td class="premium">プレミアム<br />エコ</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
  </tr>
</table>
<p>※部品代別途</p>
                 
               
                <form id="ins_p9">
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg2"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・アルト等</span></td>
                    <td class="bg3"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・フィット等</span></td>
                    <td class="bg4"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜1,500kg以下）<br />カローラ・アコード等</span></td>
                    <td class="bg5"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜2,000kg以下）<br />クラウン・エスティマ等</span></td>
                  </tr>
                  <tr>
                    <td class="bg1 bascc">車検点検料金<br />ベーシック</td>
                    <td class="bg2"><label><input class="c_1 psb1" type="radio" name="checkbox1" value="0" checked="checked"> ¥8,000</label></td>
                    <td class="bg3"><label><input class="c_2 psb5" type="radio" name="checkbox2" value="0" checked="checked"> ¥8,000</label></td>
                    <td class="bg4"><label><input class="c_3 psb9" type="radio" name="checkbox3" value="0" checked="checked"> ¥8,000</label></td>
                    <td class="bg5"><label><input class="c_4 psb13" type="radio" name="checkbox4" value="0" checked="checked"> ¥8,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー・エコ</td>
                    <td class="bg2"><label><input class="c_1 psb2" type="radio" name="checkbox1" value="+24000"> ¥32,000</label></td>
                    <td class="bg3"><label><input class="c_2 psb6" type="radio" name="checkbox2" value="+24000"> ¥32,000</label></td>
                    <td class="bg4"><label><input class="c_3 psb10" type="radio" name="checkbox3" value="+24000"> ¥32,000</label></td>
                    <td class="bg5"><label><input class="c_4 psb14" type="radio" name="checkbox4" value="+24000"> ¥32,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br />スタンダード・エコ</td>
                    <td class="bg2"><label><input class="c_1 psb3" type="radio" name="checkbox1" value="+30000"> ¥38,000</label></td>
                    <td class="bg3"><label><input class="c_2 psb7" type="radio" name="checkbox2" value="+30000"> ¥38,000</label></td>
                    <td class="bg4"><label><input class="c_3 psb11" type="radio" name="checkbox3" value="+30000"> ¥38,000</label></td>
                    <td class="bg5"><label><input class="c_4 psb15" type="radio" name="checkbox4" value="+30000"> ¥38,000</label></td>
                  </tr>
                <tr>
                　　<td class="bg1 premcc">車検点検料金<br />プレミアム・エコ</td>
                    <td class="bg2"><label><input class="c_1 psb4" type="radio" name="checkbox1" value="+37000"> ¥45,000</label></td>
                    <td class="bg3"><label><input class="c_2 psb8" type="radio" name="checkbox2" value="+37000"> ¥45,000</label></td>
                    <td class="bg4"><label><input class="c_3 psb12" type="radio" name="checkbox3" value="+37000"> ¥45,000</label></td>
                    <td class="bg5"><label><input class="c_4 psb16" type="radio" name="checkbox4" value="+37000"> ¥45,000</label></td>
                  </tr>
                <tr>
                    <td class="bg1">重量税</td>
                    <td class="bg2">¥6,600</td>
                    <td class="bg3">¥16,400</td>
                    <td class="bg4">¥24,600</td>
                    <td class="bg5">¥32,800</td>
                  </tr>
                <tr>
                    <td class="bg1">自賠責</td>
                    <td class="bg2">¥26,370</td>
                    <td class="bg3">¥27,840</td>
                    <td class="bg4">¥27,840</td>
                    <td class="bg5">¥27,840</td>
                  </tr>
                <tr>
                    <td class="bg1">印紙代</td>
                    <td class="bg2">¥1,400</td>
                    <td class="bg3">¥1,700</td>
                    <td class="bg4">¥1,700</td>
                    <td class="bg5">¥1,800</td>
                  </tr>
                <tr>
                  </tr>
                    <td class="bg1">事前点検<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db1">-</span></td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db2">-</span></td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db3">-</span></td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db4">-</span></td>
                    </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db1">-</span></td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db2">-</span></td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db3">-</span></td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">家族<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db1">-</span></td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db2">-</span></td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db3">-</span></td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db1">-</span></td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db2">-</span></td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db3">-</span></td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">他社見積<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db1">-</span></td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db2">-</span></td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db3">-</span></td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label><span class="db4">-</span></td>
                  </tr>
                <tr>
                    <td class="bg1">リピート<br />割引</td>
                    <td class="bg2"><label class="dn1"><input class="c_1" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db1">-</span></td>
                    <td class="bg3"><label class="dn2"><input class="c_2" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db2">-</span></td>
                    <td class="bg4"><label class="dn3"><input class="c_3" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db3">-</span></td>
                    <td class="bg5"><label class="dn4"><input class="c_4" type="checkbox" name="checkbox" value="-5000" checked="checked">　¥5,000引</label><span class="db4">-</span></td>
                 </tr>                    
                   <td class="bg1">合計金額</td>
                    <td class="bg2"><strong class="red dn1">¥<span id="results_1"></span></strong><strong class="red db1">¥42,370</strong></td>
                    <td class="bg3"><strong class="red dn2">¥<span id="results_2"></span></strong><strong class="red db2">¥53,940</strong></td>
                    <td class="bg4"><strong class="red dn3">¥<span id="results_3"></span></strong><strong class="red db3">¥62,140</strong></td>
                    <td class="bg5"><strong class="red dn4">¥<span id="results_4"></span></strong><strong class="red db4">¥70,440</strong></td>
                  </tr>
                </table>
                </form>
                <p class="cap">※価格は税込みです。<br />
                  ※輸入車の場合はプラス10,800円がかかります<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※ベーシックコース以外は、オプションプランになっております。ご希望の方はご予約の際に承ります。<br />※トラックのご予約は承っておりません。</p> 
                   
                   <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/maplist?sscode=283142">「２９４号谷和原インター」店でご予約</a>
                 </div>
                  
     
                 
                   <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
                 </div>       
                  
                  </div><!--/price1-->         

              </div>

