<?php

	function gen_td_calendar($date,$index,$op = 0)
	{
		$td = '';
		$year = $date['year'];
		$mon = $date['month'];
		
		if($index >= $date['start_day'])
		{
			$index	= $index - $date['start_day'] + 1;
			$day_int = sprintf('%02d',$index);
			$day	= $year.'-'.$mon.'-'.$day_int;
			$status = 4;
			if(isset($date['calendar'][$day]))
			{
				$status = $date['calendar'][$day];
			}
			
			$index = date('d',strtotime($day));
			$class = '';
			if($op == 1)
			{
				$class = 'sat';
			}
			
			elseif($op == 2)
			{
				$class = 'sun';
			}
			
			switch ($status) 
			{
				case 0:
					$td = '<td class = '.$class.' >'.$index.'日<br /><span class="ng">ー</span></td>';
					break ;
				case 1:
					$td = '<td class = '.$class.'>'.$index.'日<br /><span class="ng">×</span></td>';
					break ;
				case 2:
					$td = '<td class = '.$class.'>'.$index.'日<br /><span class="ok"><a rel='.$day.' onClick="gotoDay(this);" href="#">○</a></span></td>';
					break ;
				case 3:
					$td = '<td class = '.$class.'>'.$index.'日<br /><span class="ok"></span></td>';
					break ;
				default:
					$td = '<td class = '.$class.'><br /><span class="ok"></span></td>';
					break ;
			}
			
		}
		else
		{
			$td = '<td><br /><span class="ok"></span></td>';
		}
		return $td;
	}
?>
<div id="wrapper">

	<div id="bgb"></div>
	
		<h3 class="tit"><?php echo $title ;?>のご予約</h3>
		<div id="ssname">
			<a href="https://usappy.jp/ss/<?php echo $ssinfo[0]['sscode']?>" target="_blank"><?php echo $ssinfo[0]['ss_name']?></a>
			TEL:<?php echo $ssinfo[0]['tel']?>　住所:<?php echo $ssinfo[0]['address']?>　　管轄会社・支店:<?php echo $ssinfo[0]['branch_name']?>
		</div>
		<div id="calendar">

			<div id="cale_bt">
				<?php if($date['prev'] != 0){ ?>
				<a href="#" class="prev" onclick="prevStep();">&lt;&lt; 前の月</a>
				<?php }else{ ?>
				<span class="prev">前月は予約できません</span>
				<?php }?>
				<div id="man"><?php echo sprintf('%d',$date['month']) ; ?>月</div>
				<?php if($date['next'] != 0){ ?>
				<a href="#" class="next" onclick="nextStep();">次の月 &gt;&gt;</a>
				<?php }else{ ?>
				<span class="next">次月は予約できません</span>
				<?php }?>
				
			</div>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="sa1">
				<tr class="timetable">
					<td>（月）</td>
					<td>（火）</td>
					<td>（水）</td>
					<td>（木）</td>
					<td>（金）</td>
					<td>（土）</td>
					<td>（日）</td>
				</tr>
				<?php 
					for($i = 0; $i <= 5; $i++)
						{
						$year = $date['year'];
						$mon = $date['month'];

						$index = $i * 7 + 1 - $date['start_day'];
						$day_int = sprintf('%02d',$index);
						$day = $year.'-'.$mon.'-'.$day_int;
						if( ! isset($date['calendar'][$day]) && $i > 0)
						{
							break;
						}
				?>				
				<tr>
					<?php echo gen_td_calendar($date,$i * 7 + 1); ?>
					<?php echo gen_td_calendar($date,$i * 7 + 2); ?>
					<?php echo gen_td_calendar($date,$i * 7 + 3); ?>
					<?php echo gen_td_calendar($date,$i * 7 + 4); ?>
					<?php echo gen_td_calendar($date,$i * 7 + 5); ?>
					<?php echo gen_td_calendar($date,$i * 7 + 6, 1); ?>					
					<?php echo gen_td_calendar($date,$i * 7 + 7, 2); ?>
						
				</tr>
				<?php 
				}?>
			</table>
			<div id="han">【○予約可能】【X予約済み】【-お問い合わせ下さい】</div>
			<form id="view-calendar" action="<?php echo Uri::base().Uri::segment('1'); ?>/reserve" method="POST">
				<input type="hidden" name="step" id="step">
			</form>
			<form id="view-calendar-time" action="<?php echo Uri::base().Uri::segment('1'); ?>/reserve/time" method="POST">
				<input type="hidden" name="day" id="day">
			</form>
		</div>

	</div><!--/calendar-->


<script>
	function nextStep(){
		var step = <?php echo $date['step'] ;?>;
		$("#step").val(step+1);
		$("#view-calendar").submit();
	}
	function prevStep(){
		var step = <?php echo $date['step'] ;?>;
		$("#step").val(step-1);
		$("#view-calendar").submit();
	}
	function gotoDay(e){
		$("#day").val(e.rel);
		$("#view-calendar-time").submit();
	}
</script>	



