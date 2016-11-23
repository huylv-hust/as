<script>
	$(window).load(function () {
		$('#q1 #ans1_y').click(function () {
			$("#a1").show("slide", {direction: "up"}, "slow");
			$(".reload").show();
			$("#ans1_n").hide();
		})
		$('#q1 #ans1_n').click(function () {
			$("#a2").show("slide", {direction: "up"}, "slow");
			$(".reload").show();
			$("#ans1_y").hide();
		})

	});
</script>
<?php
$api = \Config::load('api');
$href = $api['member']['url_login'].'?ou='.\Fuel\Core\Uri::base().'inspection/reserve/form';
?>
<div id="bgb"></div>
<div id="main">
		<h3 class="tit">Usappy Web会員</h3>
		<div id="login">
			<div id="loginform">
				<div id="log_m">
					<h1>Usappy Web会員の方はコチラから</h1>
					<a href="<?php echo $href?>"><img src="<?php echo Uri::base() ?>assets/img/common/login/bt1.png" alt="Usappy Web会員の方はコチラからログインして予約可能です" /></a>
				</div>
				<div id="log_n">
					<h1>Usappy Web会員以外の方はコチラから<span class="reload"><a href="javascript:document.location.reload()">戻る</a></span></h1>

					<div id="q1">
						<p>Usappyカードをすでにお持ちですか？</p>
						<div id="ans1_y" class="bgy">はい</div>
						<div id="ans1_n" class="bgn" <?php if(Fuel\Core\Input::method() == 'POST') echo 'style="display:none;"'?> >いいえ</div>
					</div>


					<div id="a1" <?php if(Fuel\Core\Input::method() == 'POST') echo 'style="display:block;"'?> >						
						<p>Usappy Web会員にならずに、カード番号から予約</p>
						<form action="login" method="post">
						<?php
						if(isset($error) && count($error))
						{
							echo '<ul id="error">';
							foreach($error as $err)
							{
								echo '<li>'.$err.'</li>';
							}
							echo '</ul>';
						}
						?>
							<strong>Usappyカード番号:</strong>
							<input type="text" value="<?php if(isset($card_no)) echo $card_no?>" name="card_no" maxlength="16"/> (半角数字16桁入力)<br />
							<strong>生年月日:</strong>
							<input type="text" value="<?php if(isset($birthday)) echo $birthday?>" name="birthday" maxlength="8"/> （例：19730902）<br />
                            ※Usappyカード番号・生年月日が不明な方は最寄りのSSにてご確認下さい。<br />
							<input type="submit" class="qus_yoyaku" value="予約する"/>
						</form>
                        <div id="qus_bt1"><a href="https://usappy.jp/entry/" target="_blank">Usappy Web会員登録する方はこちら</a></div>
					</div>
					<div id="a2">
						<div id="qus_bt2"><a href="<?php echo \Fuel\Core\Uri::base().'inspection/reserve/form?nocard=1'?>">予約する</a></div>
                        <div id="qus_bt1"><a href="https://usappy.jp/entry/web">Usappy会員登録する方はこちら</a></div>
					</div>
				</div><!--/n_login-->
			</div><!--/loginform-->
		</div><!--/login-->
	</div><!--/main-->
</div><!--/wrapper-->