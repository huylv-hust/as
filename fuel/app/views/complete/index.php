<div id="breadcrumb">
	<ul>
		<li><a href="<?php echo \Fuel\Core\Uri::base()?>">トップページ &gt;</a></li>
		<li>ご予約完了</li>
	</ul>
</div><!--/breadcrum-->
<h3 class="tit"><?php echo Constants::$pit_work[Fuel\Core\Uri::segment('1')]?>のご予約</h3>
<div id="resform">
	<?php if($check_no_member){?>
		<p>
		ご予約が完了致しました。
		<br>
		お客様がご登録されたメールアドレス宛に、メールを配信いたします。
		<br>
		<br>
		ご予約内容の確認・キャンセルをされる場合はメールに記載されている予約確認へのリンクからお願い致します。
		<br>
		メールが届かない場合は、迷惑メール用フォルダに振り分けられていないかご確認ください。
		<br>
		また、店舗からご確認の電話がいく場合がございます。
		<br>
		予めご了承ください。
		</p>
	<?php }else {?>

	<?php if(Fuel\Core\Input::get('error')){?>
	<p>
		予約登録処理が失敗しました。<br/>
		大変恐れ入りますが、前のページへ戻り再度予約可能な日時をお選び頂けますでしょうか。
	</p>
	<?php } else {?>
	<p>
		ご予約が完了致しました。<br>
		お客様がご登録されたメールアドレス宛に、メールを配信いたします。<br>
		また、店舗からご確認の電話がいく場合がございます。予めご了承ください。<br>
		キャンセルされる場合は予約確認からお願い致します。
	</p>
	<?php } }?>
</div><!--/resform-->
<div id="btac">
		<a class="m_btg" href="<?php echo \Uri::base()?>">TOPへ戻る</a>
</div>
<?php
Fuel\Core\Session::delete('nocard');
Fuel\Core\Session::delete('user_info');
?>
