

	<div id="mainarea">
		<h3 class="tit"><span>車検のご予約</span></h3>

		<p class="pd10">プルダウンまたは、地図からお近くの車検工場をタップしてください。</p>

		<div id="search_key">

        <h2>工場から探す</h2>
			<div class="pd10">
				<div id="resform">
					<select name="ins_loc">
						<option value="">工場を選択してください</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=330118">札幌・石狩</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=332152">仙台</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=277603">栃木</option>
                        <option value="<?php echo Uri::base() ?>inspection/maplist?sscode=283142">谷和原</option>
                      <option value="<?php echo Uri::base() ?>inspection/maplist?sscode=353030">水戸</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=264341">さいたま鴻巣</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=325106">千葉</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=317437">和光</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=280715">松本</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=353539">大阪</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=291053">名古屋</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=273974">長野</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=249733">滋賀</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=330840">京都</option>
						<option value="<?php echo Uri::base() ?>inspection/maplist?sscode=284267">福岡</option>
					</select>
				</div>
			</div>

			<h2>地図から探す</h2>
			<div id="jpmap">
				<img src="<?php echo Uri::base() ?>assets/imgsp/common/shakenmap.png" alt="日本地図" width="320" border="0" usemap="#jpgmap" id="jpgmap">
				<map name="jpgmap" id="jpgmap2">
					<area shape="circle" coords="158,59,24" href="<?php echo Uri::base() ?>inspection/maplist?sscode=330118" alt="札幌・石狩" />
					<area shape="circle" coords="251,146,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=332152"alt="仙台" />
					<area shape="circle" coords="221,169,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=277603" alt="栃木"  />
					<area shape="circle" coords="251,200,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=283142" alt="谷和原"  />
                    <area shape="circle" coords="277,173,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=353030" alt="水戸"  />
					<area shape="circle" coords="288,226,27" href="<?php echo Uri::base() ?>inspection/maplist?sscode=264341" alt="さいたま鴻巣" />
					<area shape="circle" coords="224,227,19" href="<?php echo Uri::base() ?>inspection/maplist?sscode=325106" alt="千葉" />
					<area shape="circle" coords="187,237,16" href="<?php echo Uri::base() ?>inspection/maplist?sscode=317437" alt="和光" />
					<area shape="circle" coords="117,152,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=280715" alt="松本" />
					<area shape="circle" coords="99,266,16" href="<?php echo Uri::base() ?>inspection/maplist?sscode=353539" alt="大阪" />
					<area shape="circle" coords="142,255,22" href="<?php echo Uri::base() ?>inspection/maplist?sscode=291053" alt="名古屋" />
					<area shape="circle" coords="157,136,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=273974" alt="長野" />
					<area shape="circle" coords="107,186,18" href="<?php echo Uri::base() ?>inspection/maplist?sscode=249733" alt="滋賀" />
					<area shape="circle" coords="68,187,18" href="<?php echo Uri::base() ?>inspection/maplist.htm?sscode=330840" alt="京都" />
					<area shape="circle" coords="26,216,17" href="<?php echo Uri::base() ?>inspection/maplist?sscode=284267" alt="福岡" />
				</map>
			</div>
			<!--/jpmap-->




			<h2>その他の予約</h2>

			<ul id="search_cate">
				<li><a href="<?php  echo Uri::base() ?>coating/search" class="c2">コーティング</a></li>
				<li><a href="<?php  echo Uri::base() ?>wash/search" class="c3">洗車</a></li>
				<li><a href="<?php  echo Uri::base() ?>oil/search" class="c4">オイル</a></li>
				<li><a href="<?php  echo Uri::base() ?>tire/search" class="c5">タイヤ</a></li>
			</ul><!--/search_cate-->
		</div><!--/search_key-->

	</div><!--/mainarea-->
