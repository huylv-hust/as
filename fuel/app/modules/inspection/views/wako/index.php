  <script>        
// shaken price　wako (12)

   $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p12 #select_1,#ins_p12 .c_1').serializeArray();
   		$('#ins_p12 #results_1').empty();
   		var sum = 59070;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p12 #results_1').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p12 #results_1').text(sum);
        }
    }
 
    $(".c_1:checkbox,.c_1:radio").click(countUpDown);
    $("#ins_p12 #select_1").change(countUpDown);
    countUpDown();
 
  });
  
 
 
     $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p12 #select_2,#ins_p12 .c_2').serializeArray();
   		$('#ins_p12 #results_2').empty();
   		var sum = 70340;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p12 #results_2').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p12 #results_2').text(sum);
        }
    }
 
    $(".c_2:checkbox,.c_2:radio").click(countUpDown);
    $("#ins_p12 #select_2").change(countUpDown);
    countUpDown();
 
  });
  
  
       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p12 #select_3,#ins_p12 .c_3').serializeArray();
   		$('#ins_p12 #results_3').empty();
   		var sum = 78540;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p12 #results_3').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p12 #results_3').text(sum);
        }
    }
 
    $(".c_3:checkbox,.c_3:radio").click(countUpDown);
    $("#ins_p12 #select_3").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p12 #select_4,#ins_p12 .c_4').serializeArray();
   		$('#ins_p12 #results_4').empty();
   		var sum = 86740;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p12 #results_4').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p12 #results_4').text(sum);
        }
    }
 
    $(".c_4:checkbox,.c_4:radio").click(countUpDown);
    $("#ins_p12 #select_4").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p12 #select_5,#ins_p12 .c_5').serializeArray();
   		$('#ins_p12 #results_5').empty();
   		var sum = 94940;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p12 #results_5').text());
    	var sum = sumNumbers ();
         {
        	$('#ins_p12 #results_5').text(sum);
        }
    }
 
    $(".c_5:checkbox,.c_5:radio").click(countUpDown);
    $("#ins_p12 #select_5").change(countUpDown);
    countUpDown();
 
  });
  
         $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p12 #select_6,#ins_p12 .c_6').serializeArray();
   		$('#ins_p12 #results_6').empty();
   		var sum = 49970;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p12 #results_6').text());
    	var sum = sumNumbers ();
         {
        	$('#ins_p12 #results_6').text(sum);
        }
    }
 
    $(".c_6:checkbox,.c_6:radio").click(countUpDown);
    $("#ins_p12 #select_6").change(countUpDown);
    countUpDown();
 
  });
  
  
  </script>

	<h3 class="tit">車検の料金</h3>


                 <div id="inspection">

                <div id="price_12">                
                  <div id="price_a">
               <h1>和光（宇佐美カーケアショップ和光）の料金表</h1>
               <p>車検のご予約は満了日の6ヶ月前から承ります。最大11,000円の割引！<br />赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>
               <p><strong style="color:#FF0000;">※代車ご利用の場合プラス3,000円がかかります。（立会い車検不可）</strong></p>
               </div>
               
<table border="0" cellspacing="0" cellpadding="0" id="ins_course">
  <tr>
    <td class="about">&nbsp;</td>
    <td class="about">24ヶ月<br />点検</td>
    <td class="about">完成<br />検査</td>
    <td class="about">整備保証<br />（６ヶ月）</td>
    <td class="about">１００項目<br />点検</td>
    <td class="about">燃料ライン洗浄</td>
    <td class="about">ＣＰ診断</td>
    <td class="about">ブレーキ清・掃<br />
      給油</td>
    <td class="about">ホイール<br />アライメント</td>
    <td class="about">エンジンルーム<br />清掃</td>
    <td class="about">ブーツコート<br />加工</td>
    </tr>
  <tr>
    <td class="economy">エコノミー</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    </tr>
  <tr>
    <td class="sefty">ベーシック</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    </tr>
  <tr>
    <td class="premium">リフレッシュ</td>
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

               
                <form id="ins_p12">
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1s">WEB価格</td>
                    <td class="bg2s"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・<br />アルト等</span></td>
                    <td class="bg3s"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・<br />フィット等</span></td>
                    <td class="bg4s"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜<br />1,500kg以下）<br />カローラ・アコード等</span></td>
                    <td class="bg5s"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜<br />2,000kg以下）<br />クラウン・エスティマ等</span></td>
                    <td class="bg6s"><strong>特大自動車</strong><br /><span class="cap">（2,001kg〜<br />2,500kg以下）<br />エルグランド等</span></td>
                    <td class="bg7s"><strong>小型バン自動車</strong><br /><span class="cap">（車両総重量<br />2,000kg以下）<br />カローラバン等</span></td>
                </tr>
<tr>
                    <td class="bg1s ecocc">エコノミー</td>
                    <td class="bg2s"><label><input class="c_1" type="radio" name="checkbox1" value="0" checked="checked">　¥10,000</label></td>
                    <td class="bg3s"><label><input class="c_2" type="radio" name="checkbox2" value="0" checked="checked">　¥10,000</label></td>
                    <td class="bg4s"><label><input class="c_3" type="radio" name="checkbox3" value="0" checked="checked">　¥10,000</label></td>
                    <td class="bg5s"><label><input class="c_4" type="radio" name="checkbox4" value="0" checked="checked">　¥10,000</label></td>
                    <td class="bg6s"><label><input class="c_5" type="radio" name="checkbox5" value="0" checked="checked">　¥10,000</label></td>
                    <td class="bg7s"><label><input class="c_6" type="radio" name="checkbox6" value="0" checked="checked">　¥10,000</label></td>
                </tr>
                <tr>
                    <td class="bg1s safetycc">ベーシック</td>
                    <td class="bg2s"><label><input class="c_1" type="radio" name="checkbox1" value="+10000">　¥20,000</label></td>
                    <td class="bg3s"><label><input class="c_2" type="radio" name="checkbox2" value="+10000">　¥20,000</label></td>
                    <td class="bg4s"><label><input class="c_3" type="radio" name="checkbox3" value="+10000">　¥20,000</label></td>
                    <td class="bg5s"><label><input class="c_4" type="radio" name="checkbox4" value="+10000">　¥20,000</label></td>
                    <td class="bg6s"><label><input class="c_5" type="radio" name="checkbox5" value="+10000">　¥20,000</label></td>
                    <td class="bg7s"><label><input class="c_6" type="radio" name="checkbox6" value="+10000">　¥20,000</label></td>
                </tr>
                <tr>
                    <td class="bg1s premcc">リフレッシュ</td>
                    <td class="bg2s"><label><input class="c_1" type="radio" name="checkbox1" value="+20000">　¥30,000</label></td>
                    <td class="bg3s"><label><input class="c_2" type="radio" name="checkbox2" value="+20000">　¥30,000</label></td>
                    <td class="bg4s"><label><input class="c_3" type="radio" name="checkbox3" value="+20000">　¥30,000</label></td>
                    <td class="bg5s"><label><input class="c_4" type="radio" name="checkbox4" value="+20000">　¥30,000</label></td>
                    <td class="bg6s"><label><input class="c_5" type="radio" name="checkbox5" value="+20000">　¥30,000</label></td>
                    <td class="bg7s"><label><input class="c_6" type="radio" name="checkbox6" value="+20000">　¥30,000</label></td>
                </tr>
                <tr>
                    <td class="bg1s">完成検査料金</td>
                    <td class="bg2s">¥10,000</td>
                    <td class="bg3s">¥10,000</td>
                    <td class="bg4s">¥10,000</td>
                    <td class="bg5s">¥10,000</td>
                    <td class="bg6s">¥10,000</td>
                    <td class="bg7s">¥10,000</td>
                </tr>
                <tr>
                    <td class="bg1s">事務手数料</td>
                    <td class="bg2s">¥5,000</td>
                    <td class="bg3s">¥5,000</td>
                    <td class="bg4s">¥5,000</td>
                    <td class="bg5s">¥5,000</td>
                    <td class="bg6s">¥5,000</td>
                    <td class="bg7s">¥5,000</td>
                </tr>
                <tr>
                    <td class="bg1s">重量税</td>
                    <td class="bg2s">¥6,600</td>
                    <td class="bg3s">¥16,400</td>
                    <td class="bg4s">¥24,600</td>
                    <td class="bg5s">¥32,800</td>
                    <td class="bg6s">¥41,000</td>
                    <td class="bg7s">¥6,600</td>
                </tr>
                <tr>
                    <td class="bg1s">自賠責</td>
                    <td class="bg2s">¥26,370</td>
                    <td class="bg3s">¥27,840</td>
                    <td class="bg4s">¥27,840</td>
                    <td class="bg5s">¥27,840</td>
                    <td class="bg6s">¥27,840</td>
                    <td class="bg7s">¥17,270</td>
                </tr>
                <tr>
                    <td class="bg1s">印紙代</td>
                    <td class="bg2s">¥1,100</td>
                    <td class="bg3s">¥1,100</td>
                    <td class="bg4s">¥1,100</td>
                    <td class="bg5s">¥1,100</td>
                    <td class="bg6s">¥1,100</td>
                    <td class="bg7s">¥1,100</td>
                </tr>
                <tr>
                    <td class="bg1s">早期予約割引</td>
                    <td class="bg2s">
                    <select name="select" id="select_1">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg3s">
                    <select name="select" id="select_2">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg4s">
                    <select name="select" id="select_3">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg5s">
                    <select name="select" id="select_4">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg6s">
                    <select name="select" id="select_5">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg7s">
                    <select name="select" id="select_6">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td class="bg1s">リピート割引</td>
                    <td class="bg2s"><label><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg3s"><label><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg4s"><label><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg5s"><label><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg6s"><label><input class="c_5" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg7s"><label><input class="c_6" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">新車orハイブリッド割引</td>
                    <td class="bg2s"><label><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg3s"><label><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg4s"><label><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg5s"><label><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg6s"><label><input class="c_5" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg7s"><label><input class="c_6" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                </tr>                
                <tr>
                    <td class="bg1s">Usappy<br />会員割引</td>
                    <td class="bg2s"><label><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg3s"><label><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg4s"><label><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg5s"><label><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg6s"><label><input class="c_5" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg7s"><label><input class="c_6" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">ネット予約<br />割引</td>
                    <td class="bg2s"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3s"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4s"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5s"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg6s"><label><input class="c_5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg7s"><label><input class="c_6" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">割引適用後</td>
                    <td class="bg2s"><strong class="red">¥<span id="results_1"></span></strong></td>
                    <td class="bg3s"><strong class="red">¥<span id="results_2"></span></strong></td>
                    <td class="bg4s"><strong class="red">¥<span id="results_3"></span></strong></td>
                    <td class="bg5s"><strong class="red">¥<span id="results_4"></span></strong></td>
                    <td class="bg6s"><strong class="red">¥<span id="results_5"></span></strong></td>
                    <td class="bg7s"><strong class="red">¥<span id="results_6"></span></strong></td>
                </tr>
                </table>
                </form>
                <div id="price_a">
                <p><strong style="color:#FF0000;">車検通検のお客様に次回車検までの２年間、ガソリンが店頭看板より３円割引になるゴールドパスポートをもれなくプレゼント！</strong></p>
                <img src="<?php echo Uri::base() ?>assets/img/inspection/passport.jpg" /><br /><br />
                </div>
                
                <p class="cap">※すでに店頭でご予約いただいている場合、ネット割引きはご利用いただけませんのでご了承下さい。<br />※価格は税込みです。<br />
                  ※輸入車の場合はプラス10,800円がかかります。輸入車の場合はお問い合せ下さい。<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※トラックのご予約は承っておりません。</p>
                  
                 <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/maplist?sscode=317437">「宇佐美カーケアショップ和光」店でご予約</a>
                 </div>


                   <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
                 </div>       
                  
                  </div><!--/price1-->         

              </div>

