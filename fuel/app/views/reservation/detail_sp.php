<script type="text/javascript">window.history.forward();function no_back(){window.history.forward();}</script>
<div onload="no_back();" onpageshow="if (event.persisted) no_back();" onunload=""></div>
<div id="mainarea">
		<h3 class="tit"><span>ご予約の確認</span></h3>
		<form action="<?php echo \Uri::base().'reservation/cancel?hashkey='.$hashkey.'&reservation_no='.$reservation_no; ?>" method="post" id="cancel_booking">
		<div id="resform">
			<h1>店舗と日時</h1>
			<dl class="fm">
				<?php $hashkey = \Input::get('hashkey'); ?>
				<dt class="fcate">店舗名</dt>
				<dd class="finp">
					<?php if($ss_info){ ?>
					<?php if($hashkey == null){ ?>
					<a href="https://usappy.jp/ss/<?php echo $ss_info['sscode']; ?>" target="_blank"><?php echo $ss_info['ss_name']; ?></a>
					<?php }else{ ?>
						<?php echo $ss_info['ss_name']; ?>
					<?php } } ?>
				</dd>
				<dt class="fcate">日時</dt>
				<dd class="finp"><?php echo Utility::format_jappan_datetime($reservation['start_time']); ?>〜</dd>
				<dt class="fcate">作業内容</dt>
				<?php $pit_work = Constants::$pit_work; ?>
				<dd class="finp">
				<?php
					if(array_key_exists($reservation['menu_code'], $pit_work)){
						if($reservation['menu_code'] == 'other'){
							echo $reservation['menu_name'];
						}else{
							echo $pit_work[$reservation['menu_code']];
						}
					}
				?>
				</dd>
				<dt class="fcate">予約確認番号</dt>
				<dd class="finp"><?php echo $reservation_no; ?></dd>
			</dl>

			<h1>お客様情報</h1>
			<dl class="fm">
				<dt class="fcate">氏名</dt>
				<dd class="finp"><?php echo isset($customer_info['member_kaiinName']) ? $customer_info['member_kaiinName'] : ''; ?></dd>
				<dt class="fcate">氏名（カナ）</dt>
				<dd class="finp"><?php echo isset($customer_info['member_kaiinKana']) ? $customer_info['member_kaiinKana'] : ''; ?></dd>
				<dt class="fcate">電話番号（携帯）</dt>
				<dd class="finp"><?php echo isset($customer_info['member_telNo1']) ? $customer_info['member_telNo1'] : ''; ?></dd>
				<dt class="fcate">電話番号（自宅）</dt>
				<dd class="finp"><?php echo isset($customer_info['member_telNo2']) ? $customer_info['member_telNo2'] : ''; ?></dd>
				<?php if($hashkey){ ?>
				<dt class="fcate">メールアドレス（携帯）</dt>
				<dd class="finp"><?php echo isset($customer_info['member_mailAddress1']) ? $customer_info['member_mailAddress1'] : ''; ?></dd>
				<dt class="fcate">メールアドレス（PC）</dt>
				<dd class="finp"><?php echo isset($customer_info['member_mailAddress2']) ? $customer_info['member_mailAddress2'] : ''; ?></dd>
				<?php } ?>
			</dl>


			<h1>車両情報</h1>
			<dl class="fm">
				<dt class="fcate">車番</dt>
				<dd class="finp"><?php echo $reservation['plate_no']; ?></dd>
				<dt class="fcate">車種</dt>
				<?php
					array_shift($list_maker_range);
					$list_maker_range_0 = current($list_maker_range);
					$list_maker_range_1 = next($list_maker_range);
					$list_maker_ranged = $list_maker_range_0+$list_maker_range_1;
				?>
				<?php $car_maker = array_key_exists($reservation['car_maker_code'], $list_maker_ranged) ? $list_maker_ranged[$reservation['car_maker_code']] : '' ?>
				<?php $car_model = array_key_exists($reservation['car_model_code'], $list_model_range) ? $list_model_range[$reservation['car_model_code']] : '' ?>
				<dd class="finp"><?php echo $car_maker; ?>　<?php echo $car_model; ?></dd>
				<?php if($reservation['car_type_code'] || $reservation['car_grade_code'] || $reservation['car_year'] || $reservation['car_month']){ ?>
				<dt class="fcate">初度登録年月・型式・グレード</dt>
				<dd class="finp">
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
					<?php echo $type_code.' '.$grade_code;
				?>
				</dd>
				<?php } ?>
				<?php if($reservation['car_size_code']){?>
				<dt class="fcate">車両サイズ</dt>
				<dd class="finp">
				<?php
					$car_size_code = Constants::$car_size;
					echo array_key_exists($reservation['car_size_code'], $car_size_code) ? $car_size_code[$reservation['car_size_code']] : '';
				?>
				</dd>
				<?php } ?>
				<?php if($reservation['car_weight_code']){?>
				<dt class="fcate">車両重量</dt>
				<dd class="finp">
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
				</dd>
				<?php } ?>
				<?php if($reservation['car_color_code']){?>
				<dt class="fcate">車の色</dt>
				<?php $car_color = Constants::$car_color; ?>
				<dd class="finp"><?php echo array_key_exists($reservation['car_color_code'], $car_color) ? $car_color[$reservation['car_color_code']] : ''; ?></dd>
				<?php } ?>
				<?php if($reservation['coating_code'] && $reservation['coating_code'] != 'none'){?>
				<dt class="fcate">コーティングの種類</dt>
				<?php $coating_code = Constants::$coating_code; ?>
				<dd class="finp"><?php echo array_key_exists($reservation['coating_code'], $coating_code) ? $coating_code[$reservation['coating_code']] : ''; ?></dd>
				<?php } ?>
				<?php if($reservation['inspection_date'] != null){ ?>
				<dt class="fcate">車検満了日</dt>
				<dd class="finp"><?php echo date('Y年m月d日', strtotime($reservation['inspection_date'])); ?></dd>
				<?php } ?>
				<?php if($reservation['tire_preparation_code']){?>
				<dt class="fcate">タイヤの有無</dt>
				<?php $tire_preparation_code = Constants::$tire_preparation_code; ?>
				<dd class="finp"><?php echo array_key_exists($reservation['tire_preparation_code'], $tire_preparation_code) ? $tire_preparation_code[$reservation['tire_preparation_code']] : ''; ?></dd>
				<?php } ?>
				<?php if($reservation['wheel_preparation_code']){?>
				<dt class="fcate"><?php if($reservation['tire_preparation_code'] == 2){ echo 'ホイールの有無';}else{ echo 'ご購入予定の内容';} ?></dt>
				<dd class="finp">
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
				</dd>
				<?php } ?>
				<?php if($reservation['menu_code'] == 'tire' && $reservation['tire_size_code']){ ?>
				<dt class="fcate">タイヤのサイズ</dt>
				<dd class="finp"><?php echo \Constants::$tire_size_code[$reservation['tire_size_code']]?></dd>
				<?php } ?>
				<?php $black_list = array('oil','wash','tire','coating'); ?>
				<?php if(!in_array($reservation['menu_code'], $black_list)){ ?>
				<dt class="fcate">代車の希望</dt>
				<dd class="finp"><?php echo $reservation['is_car_request'] == 0 ? '希望しない' : '希望する'; ?></dd>
				<?php } ?>
				<?php if($reservation['other_request']){ ?>
				<dt class="fcate">ご要望など</dt>
				<dd class="finp"><?php echo nl2br($reservation['other_request']); ?></dd>
				<?php } ?>
			</dl>
			<div style="height:1px; clear: left">&nbsp;</div>
			<?php if($start_time == true){ ?>
			<?php if($hashkey == null){ ?>
			<div class="pd10">
				<a href="<?php echo \Uri::base(); ?>reservation" class="graybt">予約リストに戻る</a>
			</div>
			<?php } ?>
			<div class="pd10">
				<input type="submit" onclick="return confirmDel()" style="cursor: pointer" class="redbt <?php if($hashkey == null){ echo 'fr'; } ?>" value="予約をキャンセルする">
			</div>
			<?php }else{ ?>
			<p id="error">WEBからのキャンセル可能期限が過ぎています。キャンセルをご希望される場合は店舗へ直接お電話ください。<br><strong><?php if(isset($ss_info['ss_name'])){ echo $ss_info['ss_name']; } ?><?php if(isset($ss_info['tel'])){ echo '：TEL <a href="tel:'.cleanSpecial($ss_info['tel']).'">'.$ss_info['tel'].'</a>'; } ?></strong></p>
			<?php } ?>

		</div><!--/resform-->

		<?php if($start_time != true && $hashkey == null){ ?>
			<div class="pd10">
				<a href="<?php echo \Uri::base(); ?>reservation" class="graybt">予約リストに戻る</a>
			</div>
		<?php } ?>

		<?php
		function cleanSpecial($string) {
			return str_replace('-', '', $string); // Replaces all spaces with hyphens.
		}
		?>

		</form>

	</div><!--/mainarea-->



<script>
function confirmDel(){
	if(!confirm('本当に予約をキャンセルしてもよろしいですか？')){
		return false;
	}
}
</script>