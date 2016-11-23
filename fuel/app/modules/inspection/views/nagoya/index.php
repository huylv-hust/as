<script>        
// shaken price　nagoya (13)

$(function() {
	$('#ins_p13 .neww1').click(function() {
		if ($(this).prop('checked') == true) {
			$('#ins_p13 .oth1').prop('checked', false);
			$("#ins_p13 .oths1").val("0");
			$('#ins_p13 .oth1,#ins_p13 .oths1').attr('disabled', 'disabled');
		} else {
			$('#ins_p13 .oth1,#ins_p13 .oths1').removeAttr('disabled');
		}
	});
	$('#ins_p13 .neww2').click(function() {
		if ($(this).prop('checked') == true) {
			$('#ins_p13 .oth2').prop('checked', false);
			$("#ins_p13 .oths2").val("0");
			$('#ins_p13 .oth2,#ins_p13 .oths2').attr('disabled', 'disabled');
		} else {
			$('#ins_p13 .oth2,#ins_p13 .oths2').removeAttr('disabled');
		}
	});
	$('#ins_p13 .neww3').click(function() {
		if ($(this).prop('checked') == true) {
			$('#ins_p13 .oth3').prop('checked', false);
			$("#ins_p13 .oths3").val("0");
			$('#ins_p13 .oth3,#ins_p13 .oths3').attr('disabled', 'disabled');
		} else {
			$('#ins_p13 .oth3,#ins_p13 .oths3').removeAttr('disabled');
		}
	});
	$('#ins_p13 .neww4').click(function() {
		if ($(this).prop('checked') == true) {
			$('#ins_p13 .oth4').prop('checked', false);
			$("#ins_p13 .oths4").val("0");
			$('#ins_p13 .oth4,#ins_p13 .oths4').attr('disabled', 'disabled');
		} else {
			$('#ins_p13 .oth4,#ins_p13 .oths4').removeAttr('disabled');
		}
	});
	$('#ins_p13 .neww5').click(function() {
		if ($(this).prop('checked') == true) {
			$('#ins_p13 .oth5').prop('checked', false);
			$("#ins_p13 .oths5").val("0");
			$('#ins_p13 .oth5,#ins_p13 .oths5').attr('disabled', 'disabled');
		} else {
			$('#ins_p13 .oth5,#ins_p13 .oths5').removeAttr('disabled');
		}
	});
	$('#ins_p13 .neww6').click(function() {
		if ($(this).prop('checked') == true) {
			$('#ins_p13 .oth6').prop('checked', false);
			$("#ins_p13 .oths6").val("0");
			$('#ins_p13 .oth6,#ins_p13 .oths6').attr('disabled', 'disabled');
		} else {
			$('#ins_p13 .oth6,#ins_p13 .oths6').removeAttr('disabled');
		}
	});
});



   $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p13 #select_1,#ins_p13 .c_1').serializeArray();
   		$('#ins_p13 #results_1').empty();
   		var sum = 49070;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p13 #results_1').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p13 #results_1').text(sum);
        }
    }
 
    $(".c_1:checkbox").click(countUpDown);
    $("#ins_p13 #select_1").change(countUpDown);
    countUpDown();
 
  });
  
 
 
     $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p13 #select_2,#ins_p13 .c_2').serializeArray();
   		$('#ins_p13 #results_2').empty();
   		var sum = 60340;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p13 #results_2').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p13 #results_2').text(sum);
        }
    }
 
    $(".c_2:checkbox").click(countUpDown);
    $("#ins_p13 #select_2").change(countUpDown);
    countUpDown();
 
  });
  
  
       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p13 #select_3,#ins_p13 .c_3').serializeArray();
   		$('#ins_p13 #results_3').empty();
   		var sum = 68540;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p13 #results_3').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p13 #results_3').text(sum);
        }
    }
 
    $(".c_3:checkbox").click(countUpDown);
    $("#ins_p13 #select_3").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p13 #select_4,#ins_p13 .c_4').serializeArray();
   		$('#ins_p13 #results_4').empty();
   		var sum = 76740;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p13 #results_4').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p13 #results_4').text(sum);
        }
    }
 
    $(".c_4:checkbox").click(countUpDown);
    $("#ins_p13 #select_4").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p13 #select_5,#ins_p13 .c_5').serializeArray();
   		$('#ins_p13 #results_5').empty();
   		var sum = 84940;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p13 #results_5').text());
    	var sum = sumNumbers ();
         {
        	$('#ins_p13 #results_5').text(sum);
        }
    }
 
    $(".c_5:checkbox").click(countUpDown);
    $("#ins_p13 #select_5").change(countUpDown);
    countUpDown();
 
  });


       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p13 #select_6,#ins_p13 .c_6').serializeArray();
   		$('#ins_p13 #results_6').empty();
   		var sum = 39970;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p13 #results_6').text());
    	var sum = sumNumbers ();
         {
        	$('#ins_p13 #results_6').text(sum);
        }
    }
 
    $(".c_6:checkbox").click(countUpDown);
    $("#ins_p13 #select_6").change(countUpDown);
    countUpDown();
 
  });
  
 
  </script>

	<h3 class="tit">車検の料金</h3>


                <div id="inspection">
           

               
                <div id="price_13">
               <div id="price_a">
               <h1>名古屋（蛭間）の料金表</h1>
               <p>車検のご予約は満了日の6ヶ月前から承ります。最大7,000円の割引！<br />赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>
               </div>
               
                <form id="ins_p13">
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1s">WEB価格</td>
                  <td class="bg2s"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・<br />アルト等</span><br /><br /></td>
                    <td class="bg3s"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・<br />フィット等</span></td>
                    <td class="bg4s"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜<br />1,500kg以下）<br />カローラ・アコード等</span></td>
                    <td class="bg5s"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜<br />2,000kg以下）<br />クラウン・エスティマ等</span></td>
                    <td class="bg6s"><strong>RV・1BOX</strong><br /><span class="cap">（〜2,000kg）<br />オデッセイ・<br />エスティマ等</span></td>
                    <td class="bg7s"><strong>小型バン自動車</strong><br /><span class="cap">（車両総重量<br />2,000kg以下）<br />カローラバン等</span></td>
                </tr>
                <tr>
                    <td class="bg1s">基本点検料金</td>
                    <td class="bg2s">¥15,000</td>
                    <td class="bg3s">¥15,000</td>
                    <td class="bg4s">¥15,000</td>
                    <td class="bg5s">¥15,000</td>
                    <td class="bg6s">¥15,000</td>
                    <td class="bg7s">¥15,000</td>
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
                    <td class="bg1s">合計</td>
                    <td class="bg2s"><strong>¥49,070</strong></td>
                    <td class="bg3s"><strong>¥60,340</strong></td>
                    <td class="bg4s"><strong>¥68,540</strong></td>
                    <td class="bg5s"><strong>¥76,740</strong></td>
                    <td class="bg6s"><strong>¥84,940</strong></td>
                    <td class="bg7s"><strong>¥39,970</strong></td>
                </tr>
                <tr>
                    <td class="bg1s">早期予約割引</td>
                    <td class="bg2s">
                    <select name="select" id="select_1" class="oths1">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg3s">
                    <select name="select" id="select_2" class="oths2">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg4s">
                    <select name="select" id="select_3" class="oths3">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg5s">
                    <select name="select" id="select_4" class="oths4">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg6s">
                    <select name="select" id="select_5" class="oths5">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg7s">
                    <select name="select" id="select_6" class="oths6">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td class="bg1s">事前見積割引</td>
                    <td class="bg2s"><label><input class="c_1 oth1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3s"><label><input class="c_2 oth2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4s"><label><input class="c_3 oth3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5s"><label><input class="c_4 oth4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg6s"><label><input class="c_5 oth5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg7s"><label><input class="c_6 oth6" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">リピート割引</td>
                    <td class="bg2s"><label><input class="c_1 oth1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3s"><label><input class="c_2 oth2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4s"><label><input class="c_3 oth3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5s"><label><input class="c_4 oth4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg6s"><label><input class="c_5 oth5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg7s"><label><input class="c_6 oth6" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">Usappy WEB<br />会員割引</td>
                    <td class="bg2s"><label><input class="c_1 oth1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3s"><label><input class="c_2 oth2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4s"><label><input class="c_3 oth3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5s"><label><input class="c_4 oth4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg6s"><label><input class="c_5 oth5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg7s"><label><input class="c_6 oth6" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">ネット予約<br />割引</td>
                    <td class="bg2s"><label><input class="c_1 oth1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3s"><label><input class="c_2 oth2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4s"><label><input class="c_3 oth3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5s"><label><input class="c_4 oth4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg6s"><label><input class="c_5 oth5" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg7s"><label><input class="c_6 oth6" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                </tr>
                <tr>
                    <td class="bg1s">新車初回割引<br />※他の割引と<br />併用不可</td>
                    <td class="bg2s"><label><input class="c_1 neww1" type="checkbox" name="checkbox" value="-7000">　¥7,000引</label></td>
                    <td class="bg3s"><label><input class="c_2 neww2" type="checkbox" name="checkbox" value="-7000">　¥7,000引</label></td>
                    <td class="bg4s"><label><input class="c_3 neww3" type="checkbox" name="checkbox" value="-7000">　¥7,000引</label></td>
                    <td class="bg5s"><label><input class="c_4 neww4" type="checkbox" name="checkbox" value="-7000">　¥7,000引</label></td>
                    <td class="bg6s"><label><input class="c_5 neww5" type="checkbox" name="checkbox" value="-7000">　¥7,000引</label></td>
                    <td class="bg7s"><label><input class="c_6 neww6" type="checkbox" name="checkbox" value="-7000">　¥7,000引</label></td>
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
                <p class="cap">※価格は税込みです。<br />
                  ※輸入車の車検は取り扱っておりません。<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※トラックのご予約は承っておりません。</p>
                  
                 <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/maplist?sscode=291053">「蛭間」店でご予約</a>
                 </div>　
                 
          
                   <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
                 </div>       
                  
                  </div><!--/price1-->         

              </div>

