

	<div id="mainarea">
		<h3 class="tit"><span><?php echo $title ;?>のご予約</span></h3>
        <?php if($title =="洗車"){ ?>
        <p style="color:#FF0000; padding:0 10px;" class="blink"><strong>※ドライブスルー洗車（セルフ）はご予約できません。</strong></p>
		<?php }?>

		<p class="pd10">都道府県から検索するか、SS名・SSコード・住所から検索してください。</p>


		<div id="search_key">
			<h2>都道府県から探す</h2>

			<div  class="pd10">
				<div id="resform">
					<select name="ins_loc">
						<option value="">都道府県を選択してください</option>
						<optgroup label="北海道">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a1">北海道</option>
						</optgroup>
						<optgroup label="東北">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a2">青森</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a3">岩手</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a4">宮城</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a5">秋田</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a6">山形</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a7">福島</option>
						</optgroup>
						<optgroup label="関東">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a8">茨城</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a9">栃木</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a10">群馬</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a11">埼玉</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a12">千葉</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a13">東京</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a14">神奈川</option>
						</optgroup>
						<optgroup label="中部">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a15">新潟</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a16">富山</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a17">石川</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a18">福井</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a19">山梨</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a20">長野</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a21">岐阜</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a22">静岡</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a23">愛知</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a24">三重</option>
						</optgroup>
						<optgroup label="近畿">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a25">滋賀</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a26">京都</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a27">大阪</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a28">兵庫</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a29">奈良</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a30">和歌山</option>
						</optgroup>
						<optgroup label="中国">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a31">鳥取</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a32">島根</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a33">岡山</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a34">広島</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a35">山口</option>
						</optgroup>
						<optgroup label="四国">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a36">徳島</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a37">香川</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a38">愛媛</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a39">高知</option>
						</optgroup>
						<optgroup label="九州">
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a40">福岡</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a41">佐賀</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a42">長崎</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a43">熊本</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a44">大分</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a45">宮崎</option>
							<option value="<?php echo Uri::base() . Uri::segment('1'); ?>/maplist?region=a46">鹿児島</option>
						</optgroup>
					</select>
				</div>
			</div>



			<h2>SS名・SSコードから探す</h2>
			<form action="<?php echo Uri::base() . Uri::segment('1'); ?>/list" method="get">
				<input type="text" class="seabox" name="keyword"/>
				<input type="submit" class="seabt" value="検索" />
				<p>例：287380</p>
			</form>
			<h2>住所から探す</h2>
			<form method="post" action="<?php echo Uri::base() . Uri::segment('1'); ?>/address">
				<input type="text" name="address" class="seabox"/>
				<input type="submit" class="seabt" value="検索" />
				<p>例：愛知県名古屋市</p>
			</form>


			<h2>その他の予約</h2>

			<ul id="search_cate">
			<li><a href="<?php echo Uri::base() ?>inspection/search" class="c1">車検</a></li>
			<?php if(Uri::current() == Uri::base().'coating/search'){ ?>
				<li><a href="<?php  echo Uri::base() ?>wash/search.html" class="c3">洗車</a></li>
				<li><a href="<?php  echo Uri::base() ?>oil/search.html" class="c4">オイル</a></li>
				<li><a href="<?php  echo Uri::base() ?>tire/search.html" class="c5">タイヤ</a></li>
			<?php }elseif(Uri::current() == Uri::base().'oil/search'){?>
				<li><a href="<?php  echo Uri::base() ?>coating/search.html" class="c2">コーティング</a></li>
				<li><a href="<?php  echo Uri::base() ?>wash/search.html" class="c3">洗車</a></li>
				<li><a href="<?php  echo Uri::base() ?>tire/search.html" class="c5">タイヤ</a></li>
			<?php }elseif(Uri::current() == Uri::base().'wash/search'){?>	
				<li><a href="<?php  echo Uri::base() ?>coating/search.html" class="c2">コーティング</a></li>
				<li><a href="<?php  echo Uri::base() ?>oil/search.html" class="c4">オイル</a></li>
				<li><a href="<?php  echo Uri::base() ?>tire/search.html" class="c5">タイヤ</a></li>
			<?php }elseif(Uri::current() == Uri::base().'tire/search'){?>	
				<li><a href="<?php  echo Uri::base() ?>coating/search.html" class="c2">コーティング</a></li>
				<li><a href="<?php  echo Uri::base() ?>wash/search.html" class="c3">洗車</a></li>
				<li><a href="<?php  echo Uri::base() ?>oil/search.html" class="c4">オイル</a></li>			<?php }?>	
		</ul>
		</div><!--/search_key--> 

	</div><!--/mainarea-->
