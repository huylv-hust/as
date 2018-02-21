<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div id="login-bar">
		<?php $staff_info = \Session::get('staff_info'); ?>
		<?php if($staff_info){ ?>
		<span class="glyphicon glyphicon-user"></span> <?php echo $staff_info['staff_name']; ?>さん
		<?php } ?>
	</div>
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php  echo Uri::base() ?>staff/">Usappyリペアサービス</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo \Uri::base(); ?>staff/calendar">リペア予約状況</a></li>
				<li><a href="<?php echo \Uri::base(); ?>staff/plan">リペア目標</a></li>
				<li><a href="<?php echo \Uri::base(); ?>staff/reports">リペア実績</a></li>
				<li><a href="<?php echo \Uri::base(); ?>staff/account">アカウント</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<?php if(\Session::get('staff_info')){ ?>
					<a href="<?php echo \Uri::base(); ?>staff/default/logout">
						<i class="glyphicon glyphicon-log-out"></i> ログアウト
					</a>
					<?php } ?>
				</li>
			</ul>
		</div>
	</div>
</nav>