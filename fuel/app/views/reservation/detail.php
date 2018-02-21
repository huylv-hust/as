<script type="text/javascript">window.history.forward();function no_back(){window.history.forward();}</script>
<div onload="no_back();" onpageshow="if (event.persisted) no_back();" onunload=""></div>
<h3 class="tit">ご予約の確認</h3>
<div id="reservation">

	<div id="resform">
		<form action="<?php echo \Uri::base().'reservation/cancel?hashkey='.$hashkey.'&reservation_no='.$reservation_no; ?>" method="post" id="cancel_booking">
			<h1>店舗・日時・作業内容</h1>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fm">
				<tbody><tr>
						<?php $hashkey = \Input::get('hashkey'); ?>
						<td class="fcate">店舗名</td>
						<td class="finp">
							<?php if($ss_info){ ?>
							<?php if($hashkey == null){ ?>
								<a href="https://usappy.jp/ss/<?php echo $ss_info['sscode']; ?>" target="_blank"><?php echo $ss_info['ss_name']; ?></a>
							<?php }else{ ?>
								<?php echo $ss_info['ss_name']; ?>
							<?php } } ?>
						</td>
					</tr>
					<tr>
						<td class="fcate">日時</td>
						<td class="finp"><?php echo Utility::format_jappan_datetime($reservation['start_time']); ?>　〜　<?php //echo Utility::format_jappan_datetime($reservation['end_time']); ?></td>
					</tr>
					<tr>
						<td class="fcate">作業内容</td>
						<?php $pit_work = Constants::$pit_work; ?>
						<td class="finp">
						<?php
							if(array_key_exists($reservation['menu_code'], $pit_work)){
								if($reservation['menu_code'] == 'other'){
									echo $reservation['menu_name'];
								}else{
									echo $pit_work[$reservation['menu_code']];
								}
							}
						?>
						</td>
					</tr>
					<tr>
						<td class="fcate">予約確認番号</td>
						<td class="finp"><?php echo $reservation_no; ?></td>
					</tr>
				</tbody></table>

			<h1>お客様情報</h1>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fm">
				<tbody><tr>
						<td class="fcate">氏名</td>
						<td class="finp"><?php echo isset($customer_info['member_kaiinName']) ? $customer_info['member_kaiinName'] : ''; ?></td>
					</tr>
					<tr>
						<td class="fcate">氏名（カナ）</td>
						<td class="finp"><?php echo isset($customer_info['member_kaiinKana']) ? $customer_info['member_kaiinKana'] : ''; ?></td>
					</tr>
					<tr>
						<td class="fcate">電話番号（携帯）</td>
						<td class="finp"><?php echo isset($customer_info['member_telNo1']) ? $customer_info['member_telNo1'] : ''; ?></td>
					</tr>
					<tr>
						<td class="fcate">電話番号（自宅）</td>
						<td class="finp"><?php echo isset($customer_info['member_telNo2']) ? $customer_info['member_telNo2'] : ''; ?></td>
					</tr>
					<?php if($hashkey){ ?>
					<tr>
						<td class="fcate">メールアドレス（携帯）</td>
						<td class="finp"><?php echo isset($customer_info['member_mailAddress1']) ? $customer_info['member_mailAddress1'] : ''; ?></td>
					</tr>
					<tr>
						<td class="fcate">メールアドレス（PC）</td>
						<td class="finp"><?php echo isset($customer_info['member_mailAddress2']) ? $customer_info['member_mailAddress2'] : ''; ?></td>
					</tr>
					<?php } ?>
				</tbody></table>

			<h1>車両情報</h1>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fm">
				<tbody><tr>
						<td class="fcate">車番</td>
						<td class="finp"><?php echo $reservation['plate_no']; ?></td>
					</tr>
					<tr>
						<td class="fcate">車種</td>
						<?php
							array_shift($list_maker_range);
							$list_maker_range_0 = current($list_maker_range);
							$list_maker_range_1 = next($list_maker_range);
							$list_maker_ranged = $list_maker_range_0+$list_maker_range_1;
						?>
						<?php $car_maker = array_key_exists($reservation['car_maker_code'], $list_maker_ranged) ? $list_maker_ranged[$reservation['car_maker_code']] : '' ?>
						<?php $car_model = array_key_exists($reservation['car_model_code'], $list_model_range) ? $list_model_range[$reservation['car_model_code']] : '' ?>
						<td class="finp"><?php echo $car_maker; ?> <?php echo $car_model; ?><br></td>
					</tr>
					<?php if($reservation['car_type_code'] || $reservation['car_grade_code'] || $reservation['car_year'] || $reservation['car_month']){ ?>
					<tr>
						<td class="fcate">初度登録年月・型式・グレード</td>
						<td class="finp">
						<?php
						if($reservation['car_year'] != 0 && $reservation['car_year'] != null){
							echo Constants::to_jp_date($reservation['car_year']).' ';
						}
						if($reservation['car_month'] != 0 && $reservation['car_month'] != null){
							echo $reservation['car_month'].'月';
						}
						?><br>
						<?php $type_code = array_key_exists($reservation['car_type_code'], $list_type_code) ? $list_type_code[$reservation['car_type_code']] : '' ?>
						<?php $grade_code = array_key_exists($reservation['car_grade_code'], $list_grade_code) ? $list_grade_code[$reservation['car_grade_code']] : '' ?>
						<?php echo $type_code.' '.$grade_code; ?></td>
					</tr>
					<?php } ?>
					<?php if($reservation['car_size_code']){?>
					<tr>
						<td class="fcate">車両サイズ</td>
						<td class="finp">
						<?php
							$car_size_code = Constants::$car_size;
							echo array_key_exists($reservation['car_size_code'], $car_size_code) ? $car_size_code[$reservation['car_size_code']] : '';
						?>
						</td>
					</tr>
					<?php } ?>
					<?php if($reservation['car_weight_code']){?>
					<tr>
					  <td class="fcate">車両重量</td>
					  <td class="finp">
						<?php
						switch ($reservation['car_size_code']){
							case 1	: $weight = Constants::$car_weight_1; break;
							case 2	: $weight = Constants::$car_weight_2; break;
							case 3	: $weight = Constants::$car_weight_3; break;
							case 4	: $weight = Constants::$car_weight_4; break;
							case 5	: $weight = Constants::$car_weight_5; break;
							default : $weight = array(); break;
						}
						?>
						<?php $car_weight = array_key_exists($reservation['car_weight_code'], $weight) ? $weight[$reservation['car_weight_code']] : '' ?>
						<?php echo $car_weight; ?>
					  </td>
					</tr>
					<?php } ?>
					<?php if($reservation['car_color_code']){?>
					<tr><td class="fcate">車の色</td>
						<?php $car_color = Constants::$car_color; ?>
						<td class="finp"><?php echo array_key_exists($reservation['car_color_code'], $car_color) ? $car_color[$reservation['car_color_code']] : ''; ?></td>
					</tr>
					<?php } ?>
					<?php if($reservation['coating_code'] && $reservation['coating_code'] != 'none'){?>
					<tr>
						<td class="fcate">コーティングの種類</td>
						<?php $coating_code = Constants::$coating_code; ?>
						<td class="finp"><?php echo array_key_exists($reservation['coating_code'], $coating_code) ? $coating_code[$reservation['coating_code']] : ''; ?></td>
					</tr>
					<?php } ?>
					<?php if($reservation['inspection_date'] != null){ ?>
					<tr>
						<td class="fcate">車検満了日</td>
						<td class="finp"><?php echo date('Y年m月d日', strtotime($reservation['inspection_date'])); ?></td>
					</tr>
					<?php } ?>
					<?php if($reservation['tire_preparation_code']){?>
					<tr>
					<td class="fcate">タイヤの有無</td>
					  <?php $tire_preparation_code = Constants::$tire_preparation_code; ?>
					  <td class="finp"><?php echo array_key_exists($reservation['tire_preparation_code'], $tire_preparation_code) ? $tire_preparation_code[$reservation['tire_preparation_code']] : ''; ?></td>
					</tr>
					<?php } ?>
					<?php if($reservation['wheel_preparation_code']){?>
					<tr>
					  <td class="fcate"><?php if($reservation['tire_preparation_code'] == 2){ echo 'ホイールの有無';}else{ echo 'ご購入予定の内容';} ?></td>
					  <td class="finp">
						  <?php $wheel_preparation_code = Constants::$wheel_preparation_code; ?>
						  <?php
							if($reservation['tire_preparation_code'] == 2){
								echo array_key_exists($reservation['wheel_preparation_code'], $wheel_preparation_code) ? $wheel_preparation_code[$reservation['wheel_preparation_code']] : '';
							}else{
								if($reservation['wheel_preparation_code'] == 1){
									echo ' タイヤのみ購入';
								}elseif($reservation['wheel_preparation_code'] == 2){
									echo 'タイヤとホイールセット';
								}
							}
						 ?>
					  </td>
					</tr>
					<?php } ?>
					<?php if($reservation['menu_code'] == 'tire' && $reservation['tire_size_code']){ ?>
					<tr>
						<td class="fcate">タイヤのサイズ</td>
						<td class="finp"><?php echo \Constants::$tire_size_code[$reservation['tire_size_code']]?></td>
					</tr>
					<?php } ?>
					<?php $black_list = array('oil','wash','tire','coating'); ?>
					<?php if(!in_array($reservation['menu_code'], $black_list)){ ?>
					<tr>
						<td class="fcate">代車の希望</td>
						<td class="finp"><?php echo $reservation['is_car_request'] == 1 ? '希望する' : '希望しない'; ?></td>
					</tr>
					<?php } ?>
					<tr>
					</tr>
					<?php if($reservation['other_request']){ ?>
					<tr>
						<td class="fcate">ご要望など</td>
						<td class="finp"><?php echo nl2br($reservation['other_request']); ?></td>
					</tr>
					<?php } ?>
				</tbody></table>

			<p>※ご予約情報を変更する場合、一度キャンセルして再度ご予約してください。</p>


			<div id="bta2" <?php if($hashkey != null && $start_time != false){ echo 'style="margin:10px 300px"'; } ?>>
				<?php if($hashkey == null){ ?>
				<a href="<?php echo \Uri::base(); ?>reservation" class="btback fl">予約リストに戻る</a>
				<?php } ?>
				<?php if($start_time == true){ ?>
				<input type="submit" class="btred <?php if($hashkey == null){ echo 'fr'; } ?>" onclick="return confirmDel()" value="予約をキャンセルする">
				<?php }else{ ?>
					<?php if($hashkey != null){ ?>
					<div style="width:310px;height:40px;padding-right:110px">
						<span class="btcan fr">予約をキャンセルする</span>
					</div>
					<?php }else{ ?>
						<span class="btcan fr">予約をキャンセルする</span>
					<?php } ?>
					<p class="ncan">WEBからのキャンセル可能期限が過ぎています。キャンセルをご希望される場合は店舗へ直接お電話ください。<br>
						<strong>
						<?php if(isset($ss_info['ss_name'])){ echo $ss_info['ss_name']; } ?><?php if(isset($ss_info['tel'])){ echo '：TEL '.$ss_info['tel']; } ?>
						</strong>
					</p>
				<?php } ?>
			</div>

		</form>
	</div><!--/resform-->

</div><!--/reservation-->

<script>
function confirmDel(){
	if(!confirm('本当に予約をキャンセルしてもよろしいですか？')){
		return false;
	}
}
</script>