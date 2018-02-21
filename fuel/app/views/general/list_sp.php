
	<div id="mainarea">
		<?php $pit_work = Constants::$pit_work; ?>
		<?php $title = array_key_exists($class_name, $pit_work) ? $pit_work[$class_name] : ''; ?>
		
		<h3 class="tit"><span><?php echo $title; ?>のご予約</span></h3>
		<?php $total = isset($list_ss) ? count($list_ss) : 0 ?>
		<p class="pd10"><?php echo $total > 0 ? $total.'件ご予約可能な店舗がみつかりました。' : 'ご予約可能な店舗が見つかりませんでした。' ?></p>

		
		<div id="search_key">
			<form method="GET">
				<input type="text" class="seabox" name="keyword" value="<?php if(isset($_GET['keyword'])){ echo $_GET['keyword']; }?>" placeholder="原宿"/>
				<input type="submit" class="seabt" value="検索" />
			</form>
		</div>
		
		<?php if($total > 0){ ?>
		<h4 class="subtit">検索結果</h4>
		<?php } ?>
		<div id="sslist">
			<ul>
				<?php if(isset($list_ss) && $list_ss != null){ ?>
				<?php foreach ($list_ss as $ssitems){ ?>
				<li>
					<a href="https://usappy.jp/ss/<?php echo $ssitems['sscode'] ?>" target="_blank" class="ssname"><?php echo $ssitems['ss_name'] ?></a>
					<p>TEL:<?php echo $ssitems['tel'] ?><br />
						住所:<?php echo $ssitems['address'] ?>　<br />
						管轄会社・支店:<?php echo $ssitems['branch_name'] ?>
					</p>
					<div class="pd10">
						<a class="grebt" href="<?php echo \Uri::base().$class_name.'/reserve?sscode='.$ssitems['sscode']; ?>">このSSで予約する</a>
					</div>
				</li>
				<?php } ?>
				<?php }else{ ?>
					<?php if(isset($_POST['keyword'])){ ?>
					<div class="pd10">
                        <a href="javascript:history.back();" class="graybt">戻る</a>
                    </div>
					<?php }?>
				<?php } ?>
			</ul>
		</div><!--/slist-->


	</div><!--/mainarea-->


<script>
	$( document ).ready(function() {
		<?php if(isset($_GET['keyword']) && !$list_ss){ ?>
				$('#search_key').hide();
		<?php } ?>
	});
</script>	