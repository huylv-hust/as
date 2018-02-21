 <script>        
  // shaken price　fukuoka (6)

   $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p6 #select_1,#ins_p6 .c_1').serializeArray();
   		$('#ins_p6 #results_1').empty();
   		var sum = 54270;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p6 #results_1').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p6 #results_1').text(sum);
        }
    }
 
    $(".c_1:checkbox,.c_1:radio").click(countUpDown);
    $("#ins_p6 #select_1").change(countUpDown);
    countUpDown();
 
  });
  
 
 
     $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p6 #select_2,#ins_p6 .c_2').serializeArray();
   		$('#ins_p6 #results_2').empty();
   		var sum = 65840;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p6 #results_2').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p6 #results_2').text(sum);
        }
    }
 
    $(".c_2:checkbox,.c_2:radio").click(countUpDown);
    $("#ins_p6 #select_2").change(countUpDown);
    countUpDown();
 
  });
  
  
       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p6 #select_3,#ins_p6 .c_3').serializeArray();
   		$('#ins_p6 #results_3').empty();
   		var sum = 74040;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p6 #results_3').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p6 #results_3').text(sum);
        }
    }
 
    $(".c_3:checkbox,.c_3:radio").click(countUpDown);
    $("#ins_p6 #select_3").change(countUpDown);
    countUpDown();
 
  });
  

       $(function(){
   	function sumNumbers() {
   		var fields = $('#ins_p6 #select_4,#ins_p6 .c_4').serializeArray();
   		$('#ins_p6 #results_4').empty();
   		var sum = 82340;
   		$.each(fields, function(i, field){
   			sum += parseInt(field.value);
   		});
		sum = String(sum).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
   		return sum;
    }
    function countUpDown() {
    	var n = parseInt($('#ins_p6 #results_4').text());
    	var sum = sumNumbers ();
    	{
        	$('#ins_p6 #results_4').text(sum);
        }
    }
 
    $(".c_4:checkbox,.c_4:radio").click(countUpDown);
    $("#ins_p6 #select_4").change(countUpDown);
    countUpDown();
 
  });
  
  
 
  </script>

	<h3 class="tit">車検の料金</h3>


                <div id="inspection">
           

               
                <div id="price_6">
                 <div id="price_a">
               <h1>福岡（３号福岡南バイパス）の料金表</h1>
               <p>車検のご予約は満了日の6ヶ月前から承ります。最大5,000円の割引！<br />赤字表示の選択肢を変更すると割引適用後の価格が変更されます。</p>
                 </div>
<table border="0" cellspacing="0" cellpadding="0" id="ins_course">
  <tr>
    <td class="about">&nbsp;</td>
    <td class="about">保安部品点検</td>
    <td class="about">機械洗車</td>
    <td class="about">オイル交換<br />フルセット</td>
    <td class="about">ワイパー<br />ブレード交換</td>
    <td class="about">ウォッシャー液</td>
    <td class="about">バッテリー液</td>
    <td class="about">クーラント<br />補充</td>
    <td class="about">ブレーキ<br />オイル補充</td>
    <td class="about">AFT.CVTF交換または<br />
      ピュアキーパー施工</td>
    </tr>
  <tr>
    <td class="economy">エコノミーコース<br />（梅）</td>
    <td class="ares">●</td>
    <td class="ares">●</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    <td class="ares">-</td>
    </tr>
  <tr>
    <td class="sefty">セーフティーパック<br />（竹）</td>
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
    <td class="premium">プレミアムパック<br />（松）</td>
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
             
               
                <form id="ins_p6">
                <table border="0" cellspacing="0" cellpadding="0" id="ins_price">
                <tr>
                    <td class="bg1">WEB価格</td>
                    <td class="bg2"><strong>軽自動車</strong><br /><span class="cap">ワゴンR・ムーヴ・アルト等</span></td>
                    <td class="bg3"><strong>小型自動車</strong><br /><span class="cap">（〜1,000kg）<br />ヴィッツ・マーチ・フィット等</span></td>
                    <td class="bg4"><strong>中型自動車</strong><br /><span class="cap">（1,001kg〜1,500kg以下）<br />カローラ・アコード等</span></td>
                    <td class="bg5"><strong>大型自動車</strong><br /><span class="cap">（1,501kg〜2,000kg以下）<br />クラウン・エスティマ等</span></td>
                  </tr>
                <tr>
                    <td class="bg1 ecocc">車検点検料金<br />エコノミー（梅）</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="0" checked="checked">　¥17,800</label></td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="0" checked="checked">　¥17,800</label></td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="0" checked="checked">　¥17,800</label></td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="0" checked="checked">　¥17,800</label></td>
                  </tr>
                <tr>
                    <td class="bg1 safetycc">車検点検料金<br />セーフティパック（竹）</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="+10000">　¥27,800</label></td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="+10000">　¥27,800</label></td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="+10000">　¥27,800</label></td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="+10000">　¥27,800</label></td>
                  </tr>
                <tr>
                    <td class="bg1 premcc">車検点検料金<br />プレミアムパック（松）</td>
                    <td class="bg2"><label><input class="c_1" type="radio" name="checkbox1" value="+20000">　¥37,800</label></td>
                    <td class="bg3"><label><input class="c_2" type="radio" name="checkbox2" value="+20000">　¥37,800</label></td>
                    <td class="bg4"><label><input class="c_3" type="radio" name="checkbox3" value="+20000">　¥37,800</label></td>
                    <td class="bg5"><label><input class="c_4" type="radio" name="checkbox4" value="+20000">　¥37,800</label></td>
                  </tr>
                 <tr>
                    <td class="bg1">事務手数料</td>
                    <td class="bg2">¥2,100</td>
                    <td class="bg3">¥2,100</td>
                    <td class="bg4">¥2,100</td>
                    <td class="bg5">¥2,100</td>
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
                    <td class="bg1">早期予約割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">Usappy WEB<br />会員割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-1000" checked="checked">　¥1,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">代車未使用<br />割引</td>
                    <td class="bg2"><label><input class="c_1" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg3"><label><input class="c_2" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg4"><label><input class="c_3" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                    <td class="bg5"><label><input class="c_4" type="checkbox" name="checkbox" value="-3000" checked="checked">　¥3,000引</label></td>
                  </tr>
                <tr>
                    <td class="bg1">合計金額</td>
                    <td class="bg2"><strong class="red">¥<span id="results_1"></span></strong></td>
                    <td class="bg3"><strong class="red">¥<span id="results_2"></span></strong></td>
                    <td class="bg4"><strong class="red">¥<span id="results_3"></span></strong></td>
                    <td class="bg5"><strong class="red">¥<span id="results_4"></span></strong></td>
                  </tr>
                </table>
                </form>
                <p class="cap">※価格は税込みです。<br />※初年度登録から13年以上の経年車は重量税が異なります。<br />※電気自動車および一部のハイブリッド車や天然ガス車は、重量税が安くなります。対応車種については店頭でご相談ください。<br />※料金には部品、追加整備は含まれておりません。整備内容は立会いにて確認させていただきます。<br />※トラックのご予約は承っておりません。</p> 
                   
                   <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/maplist?sscode=284267">「３号福岡南バイパス」店でご予約</a>
                 </div>
                 
                 <div id="btac">
                  <a class="m_btg" href="<?php echo Uri::base() ?>inspection/price">車検の料金トップ</a>
                 </div>   
　　　　　　　　</div><!--/price6--> 
      

              </div>

