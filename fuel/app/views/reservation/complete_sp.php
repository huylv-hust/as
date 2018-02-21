	<div id="mainarea">
		<h3 class="tit"><span>ご予約の確認</span></h3>

		<div id="resform">
			<p>キャンセルが完了致しました。<br>
				お客様がご登録されたメールアドレス宛に、メールを配信いたします。また、店舗からご確認の電話がいく場合がございます。予めご了承ください。</p>

		</div><!--/resform-->
		<?php if(\Input::get('hashkey') == null){ ?>
		<div class="pd10">
			<a href="<?php echo \Uri::base(); ?>reservation"><img src="<?php echo \Uri::base(); ?>assets/img/common/bt_reserve.png" alt="予約確認" width="100%"></a>
		</div>
		<?php } ?>
	</div><!--/mainarea-->

