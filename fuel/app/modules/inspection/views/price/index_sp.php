
	<div id="mainarea">
		<h3 class="tit"><span>車検の料金</span></h3>
		<div id="inspection">
			
<p class="pd10">プルダウンまたは、地図からお近くの車検工場をタップしてください。</p>
<h2 class="btit">料金を調べる</h2>

			<div class="pd10">
				<div id="resform">
					<select name="ins_loc">
						<option value="">工場を選択してください</option>
						<option value="sapporo">札幌・石狩</option>
						<option value="sendai">仙台</option>
						<option value="tochigi">栃木</option>
                      <option value="yawara">谷和原</option>
                      <option value="mito">水戸</option>                        
					  <option value="saitama">さいたま鴻巣</option>
						<option value="chiba">千葉</option>
						<option value="wako">和光</option>
						<option value="matsumoto">松本</option>
						<option value="osaka">大阪</option>
						<option value="nagoya">名古屋</option>
						<option value="nagano">長野</option>
						<option value="shiga">滋賀</option>
						<option value="kyoto">京都</option>
						<option value="fukuoka">福岡</option>
					</select>
				</div>
			</div>
            
			<div id="jpmap">
				<img src="<?php echo Uri::base() ?>assets/imgsp/inspection/pricemap.png" alt="日本地図" width="320" border="0" usemap="#jpgmap" id="jpgmap">
				<map name="jpgmap" id="jpgmap2">
					<area shape="circle" coords="158,59,24" href="sapporo" alt="札幌・石狩" />
					<area shape="circle" coords="251,146,18" href="sendai"alt="仙台" />
					<area shape="circle" coords="221,169,18" href="tochigi" alt="栃木"  />
					<area shape="circle" coords="250,198,18" href="yawara" alt="谷和原"  />
                    <area shape="circle" coords="277,172,18" href="mito" alt="水戸"  />
					<area shape="circle" coords="288,226,27" href="saitama" alt="さいたま鴻巣" />
					<area shape="circle" coords="224,227,19" href="chiba" alt="千葉" />
					<area shape="circle" coords="187,237,16" href="wako" alt="和光" />
					<area shape="circle" coords="117,152,18" href="matsumoto" alt="松本" />
					<area shape="circle" coords="99,266,16" href="osaka" alt="大阪" />
					<area shape="circle" coords="142,255,22" href="nagoya" alt="名古屋" />
					<area shape="circle" coords="157,136,18" href="nagano" alt="長野" />
					<area shape="circle" coords="107,186,18" href="shiga" alt="滋賀" />
					<area shape="circle" coords="68,187,18" href="kyoto" alt="京都" />
					<area shape="circle" coords="26,216,17" href="fukuoka" alt="福岡" />
				</map>
			</div>
			<!--/jpmap--> 


            
			<div id="com_bt">
				<ul>
					<li class="pr5"><a class="c_gre" href="<?php  echo Uri::base() ?>inspection/search">車検の<br>ご予約</a></li>
					<li class="pr5"><a class="c_dblue" href="<?php  echo Uri::base() ?>inspection/howto">車検の<br>流れ</a></li>
					<li><a class="c_blue" href="./">車検<br>TOP</a></li>
				</ul>
			</div>

		</div><!--/inspection-->
	</div><!--/mainarea-->


