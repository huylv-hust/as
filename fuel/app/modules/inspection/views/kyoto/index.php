 <script>        
// shaken price kyoto (5)

   $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p5 #select_1,#ins_p5 .c_1').serializeArray();
   		$('#ins_p5 #results_1').empty();
   		var sum = 55970;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p5 #results_1').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p5 #results_1').text(sum);
        }
    }
 
    $(".c_1:checkbox").click(countUpDown);
    $("#ins_p5 #select_1").change(countUpDown);
    countUpDown();
 
  });
  
 
 
     $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p5 #select_2,#ins_p5 .c_2').serializeArray();
   		$('#ins_p5 #results_2').empty();
   		var sum = 67540;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p5 #results_2').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p5 #results_2').text(sum);
        }
    }
 
    $(".c_2:checkbox").click(countUpDown);
    $("#ins_p5 #select_2").change(countUpDown);
    countUpDown();
 
  });
  
  
       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p5 #select_3,#ins_p5 .c_3').serializeArray();
   		$('#ins_p5 #results_3').empty();
   		var sum = 75740;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p5 #results_3').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p5 #results_3').text(sum);
        }
    }
 
    $(".c_3:checkbox").click(countUpDown);
    $("#ins_p5 #select_3").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p5 #select_4,#ins_p5 .c_4').serializeArray();
   		$('#ins_p5 #results_4').empty();
   		var sum = 84040;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p5 #results_4').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p5 #results_4').text(sum);
        }
    }
 
    $(".c_4:checkbox").click(countUpDown);
    $("#ins_p5 #select_4").change(countUpDown);
    countUpDown();
 
  });

  </script>
  
	<h3 class="tit">車検の料金</h3>


                <div id="inspection">
           

               
                <div id="price_5">
                <div id="price_a">
                    <h1>京都（１７１号大山崎）の料金表</h1>
               <p>車検のご予約は満了日の6ヶ月前から承ります。最大6,000円の割引！<br />
                 赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>
               </div>
               
                <form id="ins_p5">
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg2"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・アルト等</span></td>
                    <td class="bg3"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・フィット等</span></td>
                    <td class="bg4"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜1,500kg以下）<br />カローラ・アコード等</span></td>
                    <td class="bg5"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜2,000kg以下）<br />クラウン・エスティマ等</span></td>
                  </tr>
                <tr>
                    <td class="bg1">基本点検料金</td>
                    <td class="bg2">¥8,640</td>
                    <td class="bg3">¥8,640</td>
                    <td class="bg4">¥8,640</td>
                    <td class="bg5">¥8,640</td>
                  </tr>
                <tr>
                    <td class="bg1">完成検査料金</td>
                    <td class="bg2">¥10,800</td>
                    <td class="bg3">¥10,800</td>
                    <td class="bg4">¥10,800</td>
                    <td class="bg5">¥10,800</td>
                  </tr>
                <tr>
                    <td class="bg1">事務手数料</td>
                    <td class="bg2">¥2,160</td>
                    <td class="bg3">¥2,160</td>
                    <td class="bg4">¥2,160</td>
                    <td class="bg5">¥2,160</td>
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
                    <td class="bg2">¥1400</td>
                    <td class="bg3">¥1,700</td>
                    <td class="bg4">¥1,700</td>
                    <td class="bg5">¥1,800</td>
                  </tr>
                <tr>
                    <td class="bg1">合計</td>
                    <td class="bg2"><strong>¥55,970</strong></td>
                    <td class="bg3"><strong>¥67,540</strong></td>
                    <td class="bg4"><strong>¥75,740</strong></td>
                    <td class="bg5"><strong>¥84,040</strong></td>
                  </tr>
                <tr>
                    <td class="bg1">早期予約割引</td>
                    <td class="bg2">
                    <select name="select" id="select_1">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg3">
                    <select name="select" id="select_2">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg4">
                    <select name="select" id="select_3">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                    <td class="bg5">
                    <select name="select" id="select_4">
                    <option value="-3000">¥3,000引（3ヶ月以上前）</option>
                    <option value="-2000">¥2,000引（2ヶ月前）</option>
                    <option value="-1000">¥1,000引（1ヶ月前）</option>
                    <option value="0">割引無し</option>
                    </select>
                    </td>
                  </tr>
                <tr>
                    <td class="bg1">新車初回割引<br />/リピート割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">Usappy<br />会員割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-2000" checked="checked">　¥2,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">割引適用後</td>
                    <td class="bg2"><strong class="red">¥<span id="results_1"></span></strong></td>
                    <td class="bg3"><strong class="red">¥<span id="results_2"></span></strong></td>
                    <td class="bg4"><strong class="red">¥<span id="results_3"></span></strong></td>
                    <td class="bg5"><strong class="red">¥<span id="results_4"></span></strong></td>
                  </tr>
                </table>
                </form>
                <p class="cap">※価格は税込みです。<br />
                  ※輸入車の車検は取り扱っておりません。<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※トラックのご予約は承っておりません。</p>
                  
                  <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/maplist?sscode=330840">「１７１号大山崎」店でご予約</a>
                 </div>　　
                   
                            
                   <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
                 </div>       
                  
                  </div><!--/price1-->         

              </div>

