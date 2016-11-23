<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Usappy オートサービス　お客様のカーライフをサポート。車検・オイル交換・タイヤ交換など、WEBで簡単予約！" />
        <meta name="keywords" content="Usappy Auto Service,Usappy オートサービス,宇佐美,車検,ボディリペア,コーティング,洗車,オイル" />
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
    </head>
    <body id="page">
<?php $toppage = 0;
	$current_url = Fuel\Core\Uri::current();
	if(substr($current_url, -4) == '/as/')
	{
		$toppage = 1;
	}
?>
		<div id="wrapper">
			<?php echo $navigator; ?>
			<?php if($toppage == 0){?>
				<div id="main">
			<?php }?>
				<?php echo $breadcrumb ?>
				<?php
				if(isset($content))
				{
					echo $content;
				}
				else
				{
					if(isset($module))
						echo Request::forge($module)->execute();
				}
				?>
		</div>
			<?php echo $footer; ?>
			<?php if($toppage == 0){?>
				</div>
			<?php }?>
    </body>
</html>
