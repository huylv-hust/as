	<div id="mainarea">
		<h3 class="tit"><span>ご予約の確認</span></h3>

		<div id="resform">
			<?php if(isset($list_res) && $list_res != null){ ?>
			<h1>店舗と日時</h1>
			<?php foreach ($list_res as $items){ ?>
			<dl class="fm" style="margin-bottom:20px;">
				<dt class="fcate">店舗名</dt>
				<?php $ss_name = array_key_exists($items['sscode'], $list_ss_range) ? $list_ss_range[$items['sscode']] : ''; ?>
				<dd class="finp"><a href="https://usappy.jp/ss/<?php echo $items['sscode']; ?>" target="_blank"><?php echo $ss_name; ?></a></dd>
				<dt class="fcate">日時</dt>
				<dd class="finp"><?php echo Utility::format_jappan_datetime($items['start_time']); ?>〜</dd>
				<?php $pit_work = constants::$pit_work; ?>
				<dt class="fcate">作業内容</dt>
				<dd class="finp">
				<?php
					if(array_key_exists($items['menu_code'], $pit_work)){
						if($items['menu_code'] == 'other'){
							echo $items['menu_name'];
						}else{
							echo $pit_work[$items['menu_code']];
						}
					}
				?>
				</dd>
				<dt class="fcate">予約確認番号</dt>
				<dd class="finp"><?php echo $items['reservation_no']; ?></dd>
				<div class="pd10">
					<a href="<?php echo \Uri::base()?>reservation/detail?reservation_no=<?php echo $items['reservation_no'];?>" class="grebt">キャンセル・詳細</a>
				</div>
			</dl>
			<?php } }else{ ?>
				<p>現在、予約中のサービスはありません。</p>
			<?php } ?>

		</div><!--/resform-->

		<?php if(!isset($list_res) || $list_res == null){ ?>
		<div class="pd10">
			<a href="<?php echo \Uri::base(); ?>" class="grebt">トップページへ戻る</a>
		</div>
		<?php } ?>

	</div><!--/mainarea-->


