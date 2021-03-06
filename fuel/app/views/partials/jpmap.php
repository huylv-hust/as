<h3 class="tit"><?php echo $title ;?>のご予約</h3>

<?php if($title =="洗車"){ ?>
<p style="color:#FF0000; font-size:16px;" class="blink"><strong>※ドライブスルー洗車（セルフ）はご予約できません。</strong></p>
<?php }?>

<div id="ss_search">
	<div id="leftbx">
		<h1>右側の都道府県から検索するか、下記のSS名・SSコード・住所から検索してください。</h1>
		<ul id="search_cate">
			<li><a href="<?php echo Uri::base() ?>inspection/search" class="c1">車検</a></li>
			<?php if(Uri::current() == Uri::base().'coating/search'){ ?>
				<li><span class="c2b">コーティング</span></li> 
			<?php }else{?>
				<li><a href="<?php echo Uri::base() ?>coating/search" class="c2">コーティング</a></li>
			<?php }?>
			<?php if(Uri::current() == Uri::base().'wash/search'){ ?>
				<li><span class="c3b">洗車</span></li> 
			<?php }else{?>
				<li><a href="<?php echo Uri::base() ?>wash/search" class="c3">洗車</a></li>
			<?php }?>	
			<?php if(Uri::current() == Uri::base().'oil/search'){ ?>
				<li><span class="c4b">オイル</span></li> 
			<?php }else{?>
				<li><a href="<?php echo Uri::base() ?>oil/search" class="c4">オイル</a></li>
			<?php }?>	
			<?php if(Uri::current() == Uri::base().'tire/search'){ ?>
				<li><span class="c5b">タイヤ</span></li> 
			<?php }else{?>
				<li><a href="<?php echo Uri::base() ?>tire/search" class="c5">タイヤ</a></li>
			<?php }?>	
		</ul>
		<div id="search_key">
			<h2>SS名・SSコードから探す</h2>
			<form action="<?php echo Uri::base().Uri::segment('1'); ?>/list" method="get">
				<input type="text" class="seabox" name="keyword"/>
				<input type="submit" class="seabt" value="検索" />
				<p>例：287380</p>
			</form>
			<h2>住所から探す</h2>
			<form method="post" action="<?php echo Uri::base().Uri::segment('1'); ?>/address">
				<input type="text" name="address" class="seabox"/>
				<input type="submit" class="seabt" value="検索" />
				<p>例：愛知県名古屋市</p>
			</form>
		</div>
		<!--/search_key--> 

	</div>
	<!--/leftbx-->

	<div id="jpmap"><img src="<?php echo Uri::base() ?>assets/img/common/map.jpg" alt="日本地図" width="577" height="558" usemap="#jpgmap" id="jpgmap"></div>
	<map name="jpgmap" id="jmap-link">
		<!--都道府県マップ-->
		<area shape="rect" coords="87,377,134,393" href="#" alt="宮崎" region="a45"/>
		<area shape="rect" coords="86,394,138,413" href="#" alt="鹿児島" region="a46"/>
		<area shape="rect" coords="87,359,134,375" href="#" alt="熊本" region="a43"/>
		<area shape="rect" coords="87,341,134,359" href="#" alt="長崎" region="a42"/>
		<area shape="rect" coords="87,324,134,340" href="#" alt="佐賀" region="a41"/>
		<area shape="rect" coords="87,305,134,322" href="#" alt="福岡" region="a40"/>
		<area shape="rect" coords="87,286,134,303" href="#" alt="大分" region="a44"/>
		<area shape="rect" coords="191,461,240,479" href="#" alt="香川" region="a37"/>
		<area shape="rect" coords="191,481,240,500" href="#" alt="徳島" region="a36"/>
		<area shape="rect" coords="191,502,240,520" href="#" alt="愛媛" region="a38"/>
		<area shape="rect" coords="191,522,240,541" href="#" alt="高知" region="a39"/>
		<area shape="rect" coords="158,349,207,367" href="#" alt="山口" region="a35"/>
		<area shape="rect" coords="156,331,205,348" href="#" alt="広島" region="a34"/>
		<area shape="rect" coords="156,312,205,331" href="#" alt="岡山" region="a33"/>
		<area shape="rect" coords="156,292,205,311" href="#" alt="島根" region="a32"/>
		<area shape="rect" coords="156,272,205,291" href="#" alt="鳥取" region="a31"/>
		<area shape="rect" coords="274,531,324,548" href="#" alt="和歌山" region="a30"/>
		<area shape="rect" coords="274,514,314,529" href="#" alt="奈良" region="a29"/>
		<area shape="rect" coords="274,496,314,511" href="#" alt="兵庫" region="a28"/>
		<area shape="rect" coords="274,478,314,494" href="#" alt="大阪" region="a27"/>
		<area shape="rect" coords="274,461,314,476" href="#" alt="京都" region="a26"/>
		<area shape="rect" coords="274,444,314,459" href="#" alt="滋賀" region="a25"/>
		<area shape="rect" coords="274,427,314,443" href="#" alt="三重" region="a24"/>
		<area shape="rect" coords="407,465,462,484" href="#" alt="神奈川" region="a14"/>
		<area shape="rect" coords="407,449,452,465" href="#" alt="東京" region="a13"/>
		<area shape="rect" coords="407,430,452,447" href="#" alt="千葉" region="a12"/>
		<area shape="rect" coords="407,413,452,429" href="#" alt="埼玉" region="a11"/>
		<area shape="rect" coords="407,394,452,411" href="#" alt="茨城" region="a8"/>
		<area shape="rect" coords="407,375,452,392" href="#" alt="栃木" region="a9"/>
		<area shape="rect" coords="407,359,452,374" href="#" alt="群馬" region="a10"/>
		<area shape="rect" coords="281,137,321,155" href="#"  alt="新潟" region="a15"/>
		<area shape="rect" coords="281,157,321,174" href="#"  alt="富山" region="a16"/>
		<area shape="rect" coords="281,177,321,194" href="#" alt="石川" region="a17"/>
		<area shape="rect" coords="281,196,321,212" href="#"  alt="福井" region="a18"/>
		<area shape="rect" coords="281,214,321,230" href="#"  alt="山梨" region="a19"/>
		<area shape="rect" coords="281,232,321,250" href="#" alt="長野" region="a20" />
		<area shape="rect" coords="281,252,321,268" href="#" alt="岐阜" region="a21" />
		<area shape="rect" coords="281,272,321,288" href="#" alt="静岡" region="a22" />
		<area shape="rect" coords="281,291,321,306" href="#" alt="愛知" region="a23" />
		<area shape="rect" coords="445,201,485,220" href="#" alt="青森" region="a2" />
		<area shape="rect" coords="445,223,485,239" href="#" alt="秋田" region="a5" />
		<area shape="rect" coords="445,244,485,260" href="#" alt="岩手" region="a3" />
		<area shape="rect" coords="445,266,485,282" href="#" alt="山形" region="a6" />
		<area shape="rect" coords="445,306,485,324" href="#" alt="福島" region="a7" />
		<area shape="rect" coords="445,285,485,304" href="#" alt="宮城" region="a4" />
		<area shape="poly" coords="98,497,109,497,116,504,126,513,132,515,130,521,129,528,110,536,84,524,93,517,87,512,86,502,86,493" href="#" alt="鹿児島" region="a46" />

		<!--都道府県テキスト-->
		<area shape="poly" coords="105,467,111,463,119,467,119,462,124,465,126,470,126,475,122,481,119,482,120,487,122,490,121,493,112,497,108,495,103,496,103,491,107,483,102,482,107,477,103,470" href="#" alt="熊本" region="a43"/>
		<area shape="poly" coords="127,473,132,475,139,474,144,476,137,488,133,503,133,511,129,521,123,520,125,514,122,513,119,510,115,507,116,504,111,498,121,496,123,489,121,483,124,478" href="#" alt="宮崎" region="a45"/>
		<area shape="poly" coords="262,405,267,404,270,398,270,393,277,398,273,408,275,414,283,418,282,425,276,424,266,430,266,432,264,437,257,445,253,439,261,433,260,422,265,417,260,414,259,407" href="#" alt="三重" region="a24"/>
		<area shape="poly" coords="231,423,238,426,233,428,236,431,232,434,236,437,236,440,242,448,240,445,251,453,259,445,255,437,248,438,246,433,249,428,251,420,247,422,237,423" href="#" alt="和歌山" region="a30"/>
		<area shape="poly" coords="389,262,392,269,391,274,389,283,386,290,382,293,386,294,392,295,394,300,398,296,400,286,400,279,406,280,408,276,414,280,414,274,415,266,420,258,412,265,406,268,403,262,396,259,389,262" href="#" alt="宮城" region="a4"/>
		<area shape="poly" coords="379,333,380,339,379,345,378,351,372,353,368,356,363,358,369,365,379,368,385,365,392,371,384,359,385,353,389,343,393,335,387,334,382,338" href="#" alt="茨城" region="a8"/>
		<area shape="poly" coords="287,333,284,340,283,347,282,354,285,353,287,356,290,350,297,350,303,351,308,344,306,331,298,334,291,336,292,328" href="#" alt="富山" region="a16"/>
		<area shape="poly" coords="315,333,320,337,325,336,330,329,333,334,335,337,328,343,327,349,332,350,332,358,334,365,335,368,330,367,326,364,320,371,321,377,319,379,320,386,312,391,305,391,307,383,304,377,298,370,302,369,307,365,305,360,308,353,307,349,310,335" href="#" alt="長野" region="a20"/>
		<area shape="poly" coords="337,363,342,368,347,367,356,370,368,369,364,358,354,356,347,356" href="#" alt="埼玉" region="a11"/>
		<area shape="poly" coords="323,371,323,376,324,381,325,385,324,389,327,390,329,395,331,386,336,388,341,387,347,382,346,378,343,373,337,370,336,373,332,370,329,371,326,368" href="#" alt="山梨" region="a19"/>
		<area shape="poly" coords="365,298,361,305,360,311,352,316,351,321,353,330,356,332,365,327,371,323,382,330,386,336,388,331,398,335,407,325,402,296,395,303,392,297,382,292,379,301,371,303" href="#" alt="福島" region="a7"/>
		<area shape="poly" coords="401,140,412,154,393,158,374,175,365,162,360,142,369,107,389,82,405,74,351,76,360,50,413,49,406,13,417,7,444,13,487,57,511,59,528,48,524,80,532,87,541,101,488,122,469,152,418,129,401,141" href="#" alt="北海道" region="a1"/>
		<area shape="poly" coords="191,438,203,440,205,446,211,447,209,455,208,459,200,450,191,450,184,454,183,459,179,466,175,467,175,473,176,476,170,475,162,474,166,468,169,460,175,458,171,453,178,450,179,442,185,439" href="#" alt="高知" region="a39"/>
		<area shape="poly" coords="343,369,347,374,353,377,356,380,357,376,362,378,369,375,367,372,353,372" href="#" alt="東京" region="a13"/>
		<area shape="poly" coords="185,383,190,380,197,381,207,377,214,377,215,384,216,391,210,392,208,389,203,386,198,390,194,387,189,392,182,397,179,393,185,390,183,384" href="#" alt="鳥取" region="a31"/>
		<area shape="poly" coords="184,396,192,388,197,389,203,387,208,391,215,391,212,397,211,404,213,408,205,416,194,416,188,417,185,403" href="#" alt="岡山" region="a33"/>
		<area shape="poly" coords="369,364,371,370,370,375,374,377,373,383,368,386,363,400,367,404,373,398,381,393,398,374,387,365,376,369" href="#" alt="千葉" region="a12"/>
		<area shape="poly" coords="250,407,252,416,250,420,253,424,247,428,248,432,249,436,256,434,260,432,261,424,260,417,264,416,261,409,255,408" href="#" alt="奈良" region="a29"/>
		<area shape="poly" coords="118,435,103,436,103,443,100,447,95,445,92,451,101,452,106,451,107,454,101,459,100,464,103,467,109,462,117,465,112,457,115,451,123,449,127,447" href="#" alt="福岡" region="a40"/>
		<area shape="poly" coords="227,377,236,371,240,373,236,378,240,382,244,380,245,381,253,388,254,397,258,405,255,407,252,406,252,402,247,400,242,398,246,394,239,392,236,389,229,387,232,386" href="#" alt="京都" region="a26"/>
		<area shape="poly" coords="135,411,129,420,121,420,116,419,113,431,124,438,132,435,140,435,147,439,146,444,151,438,154,428,146,421,144,426,140,420,137,417" href="#" alt="山口" region="a35"/>
		<area shape="poly" coords="180,380,180,385,184,386,182,391,179,393,180,397,173,397,168,401,165,402,165,405,158,407,152,408,149,415,147,421,144,425,141,420,138,418,139,415,138,412,153,397,166,383" href="#" alt="島根" region="a32"/>
		<area shape="poly" coords="82,452,80,453,93,470,100,474,102,483,95,484,92,479,85,487,80,477,75,458" href="#" alt="長崎" region="a42"/>
		<area shape="poly" coords="244,401,245,405,244,408,243,412,233,423,250,419,250,410,251,404,248,401" href="#" alt="大阪" region="a27"/>
		<area shape="poly" coords="128,448,135,443,140,449,136,455,141,456,145,463,148,470,143,476,140,474,138,473,135,475,131,474,129,470,125,472,125,466,120,460,116,461,117,465,114,460,114,453,116,451" href="#" alt="大分" region="a44"/>
		<area shape="poly" coords="347,330,344,336,337,339,330,343,329,347,334,348,335,352,334,361,340,362,345,358,346,353,354,355,362,356,359,355,354,352,357,344,352,343,355,333" href="#" alt="群馬" region="a10"/>
		<area shape="poly" coords="193,435,193,440,203,441,206,446,207,450,214,448,222,441,220,434,220,428,205,427,207,432,198,431" href="#" alt="徳島" region="a36"/>
		<area shape="poly" coords="372,204,400,204,397,222,393,238,391,249,395,258,390,261,384,257,376,255,372,252,370,250,375,238,375,228,364,224,375,217,372,205" href="#" alt="秋田" region="a5"/>
		<area shape="poly" coords="356,332,355,340,360,341,357,350,361,352,363,355,368,351,376,349,378,344,378,336,379,327,371,323" href="#" alt="栃木" region="a9"/>
		<area shape="poly" coords="215,377,218,387,217,392,212,397,211,404,214,409,224,407,232,413,242,409,244,403,244,399,242,396,240,392,233,389,228,387,230,385,227,379,216,376" href="#" alt="兵庫" region="a28"/>
		<area shape="poly" coords="272,375,279,374,284,374,284,368,282,363,285,357,288,357,293,353,304,352,306,355,304,359,304,364,301,369,297,373,303,379,305,385,304,390,301,392,297,390,293,390,290,385,283,387,280,392,279,395,276,391,273,392,273,381,268,377" href="#"  alt="岐阜" region="a21"/>
		<area shape="poly" coords="266,353,270,357,274,358,279,361,282,356,280,343,282,333,287,329,288,325,299,312,295,306,281,315,277,319,278,326,280,331,276,342,266,352" href="#"  alt="石川" region="a17"/>
		<area shape="poly" coords="377,181,375,191,366,199,371,207,394,204,400,208,400,213,420,205,415,167,393,163,375,178" href="#" alt="青森" region="a2"/>
		<area shape="poly" coords="282,389,288,386,292,390,297,391,304,392,310,393,307,400,303,404,301,411,289,414,283,402,282,392" href="#"  alt="愛知" region="a23"/>
		<area shape="poly" coords="308,327,312,338,314,331,320,336,326,334,331,326,337,333,338,336,347,328,352,331,350,322,351,316,359,313,362,310,364,302,362,289,369,285,363,275,332,306" href="#"  alt="新潟" region="a15"/>
		<area shape="poly" coords="194,421,192,423,211,417,220,427,210,426,210,423,205,432,198,430,191,432,189,425" href="#" alt="香川" region="a37" />
		<area shape="poly" coords="103,498,110,498,115,505,121,514,125,516,124,522,123,529,111,537,94,525,100,518,96,513,95,503,95,494" href="#" alt="鹿児島" region="a46" />
		<area shape="poly" coords="370,254,368,262,360,272,365,274,365,278,370,281,371,286,365,288,363,296,370,298,376,301,379,298,379,290,384,290,389,277,387,272,389,266,386,260,382,258,370,254" href="#" alt="山形" region="a6" />
		<area shape="poly" coords="322,379,322,386,326,388,328,393,332,391,332,384,337,387,343,385,342,390,346,394,348,397,350,403,342,414,336,405,339,396,326,408,322,415,303,411,303,405,308,403,312,392,319,387" href="#" alt="静岡" region="a22" />
		<area shape="poly" coords="345,384,350,377,354,379,359,377,364,379,362,384,364,390,362,394,357,386,349,393,345,389" href="#" alt="神奈川" region="a14" />
		<area shape="poly" coords="395,258,400,262,405,262,405,266,413,265,417,258,426,256,431,235,429,224,425,216,423,206,398,214,397,227,396,234,393,241,393,249,395,257" href="#" alt="岩手" region="a3" />
		<area shape="poly" coords="86,447,91,452,97,451,103,453,98,458,98,462,93,469,89,463,87,459,84,461,85,455,83,451" href="#" alt="佐賀" region="a41" />
		<area shape="poly" coords="271,390,272,401,268,403,263,400,262,404,256,399,255,389,256,384,263,379,266,375,269,379,271,382,270,385" href="#" alt="滋賀" region="a25" />
		<area shape="poly" coords="174,429,167,437,168,443,162,446,155,451,150,455,158,455,160,459,159,470,167,470,167,463,171,458,176,456,170,453,178,449,180,438,182,438,194,436,194,431,181,435" href="#愛知" region="a38" />
		<area shape="poly" coords="151,409,166,405,172,398,183,399,187,415,185,421,178,420,163,428,159,423,154,427,149,422,148,417" href="#" alt="広島" region="a34" />
		<area shape="poly" coords="263,355,269,357,272,361,277,361,282,368,282,371,275,372,271,371,269,376,265,375,264,380,257,382,256,386,247,386,246,380,260,373,257,366,262,355" href="#" alt="福井" region="a18" />
	</map>
</div>
<!--/jpmap--> 
<script>
	$(function (e){
		$('#jmap-link area').on('click', function () {
			var region = $(this).attr('region');
			location.href = "<?php echo Uri::base().Uri::segment('1'); ?>"+"/maplist?region="+region;
		})
	});
	
</script>	