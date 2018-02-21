<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Usappy オートサービス　お客様のカーライフをサポート。車検・オイル交換・タイヤ交換など、WEBで簡単予約！" />
        <meta name="keywords" content="Usappy Auto Service,Usappy オートサービス,宇佐美,車検,ボディリペア,コーティング,洗車,オイル" />
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
    </head>
    <body id="page">

		<div id="wrapper">
<?php $toppage = 0;
	$current_url = Fuel\Core\Uri::current();
	if(substr($current_url, -4) == '/as/')
	{
		$toppage = 1;
	}
?>
		<?php echo $navigator; ?>
			<?php if($toppage == 0){?>
				<div id="main">
			<?php }?>
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
            <?php if($toppage == 0){?>
				</div><!--/main-->
			<?php }?>
				<?php echo $footer; ?>
		</div>
    </body>
</html>
