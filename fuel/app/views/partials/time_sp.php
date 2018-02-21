
<div id="mainarea">
	<h3 class="tit"><span><?php echo $title ;?>のご予約</span></h3>
	<div id="ssname">
		<a href="https://usappy.jp/ss/<?php echo $ssinfo[0]['sscode']?>" target="_blank"><?php echo $ssinfo[0]['ss_name']?></a><br>
		TEL:<?php echo $ssinfo[0]['tel']?><br>
		住所:<?php echo $ssinfo[0]['address']?><br>
		管轄会社・支店:<?php echo $ssinfo[0]['branch_name']?>
	</div>

	<div id="calendar">

		<div id="cale_bt">
			<?php if($info['prev'] != 0){ ?>
				<a href="#" class="prev" onclick=prevStep(); >&lt;&lt; 前日</a>
			<?php }else{ ?>
				<span  class="prev">前日は予約不可</span>
			<?php }?>
			
			<?php if($info['next'] != 0){ ?>
				<a href="#" class="next" onclick=nextStep();>翌日 &gt;&gt;</a>
			<?php }else{ ?>
					<span  class="next">翌日は予約不可<span>
			<?php }?>
		</div>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="sa2">
			<tr class="timetable">
				<td>来店時間</td>
				<td><?php echo sprintf('%d',$day[1])?>月<?php echo $day[2]?>日（<?php echo Constants::$day_of_week[date('N',strtotime($day[0].'-'.$day[1].'-'.$day[2]))]; ?>）</td>
			</tr>
			<?php if(isset($info['open_time'])){ ?>
				<?php foreach($info['open_time'] as $key => $value){?>
					<tr>
					<td class="time">
						<?php 
							$hour = $value['start_time'] / 60;
							$minute = $value['start_time'] % 60;
							echo sprintf('%02d:%02d', $hour, $minute);
						?>〜
					</td>
					<?php if($value['status']==false){ ?>
						<td><span class="ns">×</span></td>
					<?php }else{?>
						<td><span class="ok"><a href="#" class="view-form" start="<?php echo $value['start_time'] ; ?>" end="<?php echo $value['end_time'] ; ?>">○ 予約する</a></span></td>
					<?php }?>
				</tr>
				<?php }?>
			<?php }?>
		</table>
		<div id="han">【○予約可能】【X予約済み】</div>
		<form id="view-calendar-time" action="time" method="POST">
			<input type="hidden" name="step" id="step">
			<input type="hidden" name="day" value="<?php echo $day[0].'-'.$day[1].'-'.$day[2];?>">
		</form>
		<form id="view-form" action="<?php echo Uri::base().Uri::segment('1'); ?>/reserve/form" method="POST">
			<input type="hidden" name="start" id="start">
			<input type="hidden" name="end" id="end">
			<input type="hidden" name="curr_date" value="<?php echo $day[0].'-'.$day[1].'-'.$day[2];?>">
			<input type="hidden" name="post" value="1">
		</form>
	</div>

</div><!--/calendar-->

<div class="pd10">
	<a href="#" onclick ="viewCalendar();" class="graybt">戻る</a>
</div>



<script>
	$( document ).ready(function() {
		$('.view-form').click(function(){
			var start = $(this).attr('start');
			var end = $(this).attr('end');
			$("#start").val(start);
			$("#end").val(end);
			
			$("#view-form").submit();
		})
	});

	function nextStep(){
		$("#step").val(+1);
		$("#view-calendar-time").submit();
	}
	function prevStep(){
		$("#step").val(-1);
		$("#view-calendar-time").submit();
	}
	function viewCalendar(){
		$("#view-calendar-time").attr('action', '<?php echo Uri::base().Uri::segment('1'); ?>/reserve');
		var step = <?php echo $day[1]- $date?>;
		if(step == -1)
		{
			step = step +1
		}
		if(step < 0)
		{
			step = step + 12;
		}	
		$("#step").val(step);
		$("#view-calendar-time").submit();

	}
</script>	