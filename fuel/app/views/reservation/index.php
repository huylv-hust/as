<?php \Fuel\Core\Config::load('apidefine');?>
<h3 class="tit">ご予約の確認</h3>
<div id="reservation">

	<div id="resform">
		<?php if(isset($list_res) && $list_res != null){ ?>
		<h1>店舗・日時・作業内容</h1>
		<?php foreach ($list_res as $items){ ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fm">
			<tbody><tr>
					<td class="fcate">店舗名</td>
					<?php $ss_name = array_key_exists($items['sscode'], $list_ss_range) ? $list_ss_range[$items['sscode']] : ''; ?>
					<td class="finp"><a href="https://usappy.jp/ss/<?php echo $items['sscode']; ?>" target="_blank"><?php echo $ss_name; ?></a></td>
				</tr>
				<tr>
					<td class="fcate">日時</td>
					<td class="finp"><?php echo Utility::format_jappan_datetime($items['start_time']); ?>　〜</td>
				</tr>
				<tr>
					<td class="fcate">作業内容</td>
					<?php $pit_work = constants::$pit_work; ?>
					<td class="finp">
					<?php
						if(array_key_exists($items['menu_code'], $pit_work)){
							if($items['menu_code'] == 'other'){
								echo $items['menu_name'];
							}else{
								echo $pit_work[$items['menu_code']];
							}
						}
					?>
				</tr>
				<tr>
					<td class="fcate">予約確認番号</td>
					<td class="finp"><?php echo $items['reservation_no']; ?></td>
				</tr>
			</tbody></table>
		<div id="detail"><a  style="cursor: pointer" href="<?php echo \Uri::base()?>reservation/detail?reservation_no=<?php echo $items['reservation_no'];?>">キャンセル・詳細はこちら</a></div>
		<?php } }else{ ?>
		<h1>現在、予約中のサービスはありません。</h1>
		<div id="detail"><a href="<?php echo \Uri::base(); ?>">トップページへ</a></div>
		<?php } ?>
	</div><!--/resform-->

</div><!--/reservation-->