<script type="text/javascript">window.history.forward();function no_back(){window.history.forward();}</script>

<div id="breadcrumb" onload="no_back();" onpageshow="if (event.persisted) no_back();" onunload="">
<ul>
	<li><a href="<?php echo \Fuel\Core\Uri::base()?>">トップページ &gt;</a></li>
	<li><a href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/search/">SSを選ぶ &gt;</a></li>
	<li><a href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/">日付を選ぶ &gt;</a></li>
	<li><a href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/time/">時間を選ぶ &gt;</a></li>
	<li>お客様情報入力</li>
</ul>
</div><!--/breadcrum-->

<h3 class="tit"><?php echo Constants::$pit_work[$menu_code]?>のご予約</h3>
<div id="resform">
	<p>下記内容でご予約します。間違いありませんか。</p>
	<form action="<?php echo $action ?>" method="post" id="booking_data" name="post_data">
		<input type="hidden" name="menu_code" value="<?php echo $menu_code?>">
		<input type="hidden" name="sscode" value="<?php echo $sscode?>">

		<input type="hidden" name="pit_no" value="<?php echo $pit_no?>">
		<input type="hidden" name="member_id" value="<?php echo $cs_info['member_id'] ?>">
		<h1>店舗と日時</h1>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
			<tbody><tr>
				<td class="fcate">店舗名</td>
				<td class="finp"><?php echo $ss_name?></td>
			</tr>
			<tr>
				<td class="fcate">日時</td>
				<td class="finp"><?php $time = str_replace(' ','日',preg_replace('/(-)([0-9]+)(-)/','年$2月',$start_time)); echo str_replace(array('年0','月0'),array('年','月'), $time).'〜'; ?></td>
				<input type="hidden" name="start_time" value="<?php echo $start_time?>">
				<input type="hidden" name="end_time" value="<?php echo $end_time?>">
			</tr>
			<tr>
				<td class="fcate">作業内容</td>
				<td class="finp"><?php  echo Constants::$pit_work[$menu_code]?></td>
			</tr>

		</tbody></table>

		<h1>お客様情報</h1>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
			<tbody><tr>
				<td class="fcate">氏名</td>
				<td class="finp"><?php echo $cs_info['member_kaiinName']?></td>
				<input type="hidden" name="member_kaiinName" value="<?php echo $cs_info['member_kaiinName']?>">
			</tr>
			<tr>
				<td class="fcate">氏名（カナ）</td>
				<td class="finp"><?php echo $cs_info['member_kaiinKana']?></td>
				<input type="hidden" name="member_kaiinKana" value="<?php echo $cs_info['member_kaiinKana']?>">
			</tr>
			<tr>
				<td class="fcate">電話番号（携帯）</td>
				<td class="finp"><?php echo $cs_info['member_telNo1']?></td>
				<input type="hidden" name="member_telNo1" value="<?php echo $cs_info['member_telNo1']?>">
			</tr>
			<tr>
				<td class="fcate">電話番号（自宅）</td>
				<td class="finp"><?php echo $cs_info['member_telNo2']?></td>
				<input type="hidden" name="member_telNo2" value="<?php echo $cs_info['member_telNo2']?>">
			</tr>
			<?php if($cs_info['member_id'] == 0) {?>
			<tr>
				<td class="fcate">メールアドレス（携帯）</td>
				<td class="finp"><?php echo $cs_info['mobile_email']?></td>
			</tr>
			<tr>
				<td class="fcate">メールアドレス（PC）</td>
				<td class="finp"><?php echo $cs_info['pc_email']?></td>
			</tr>
			<?php }?>
			<input type="hidden" name="pc_email" value="<?php echo $cs_info['pc_email']?>">
			<input type="hidden" name="mobile_email" value="<?php echo $cs_info['mobile_email']?>">
		</tbody></table>

		<h1>車両情報</h1>
		<?php
		$car_maker_name = '';
		$list_car_maker_code = Api::get_list_maker();
		array_shift($list_car_maker_code);
		$list_car_maker_code_1 = current($list_car_maker_code);
		$list_car_maker_code_2 = next($list_car_maker_code);
		$all = $list_car_maker_code_1 + $list_car_maker_code_2;
		if(isset($all[$car_info['car_maker_code']]))
			$car_maker_name = $all[$car_info['car_maker_code']];

		$car_model_name = '';
		if($car_info['car_model_code'])
		{
			$list_car_model_code = Api::get_list_model($car_info['car_maker_code']);
			foreach($list_car_model_code as $_temp)
			{
				if(isset($_temp['model_code']) && $_temp['model_code'] == $car_info['car_model_code'])
				{
					$car_model_name = $_temp['model'];
					break;
				}

			}
		}

		$car_type_name = '';
		if($car_info['car_type_code'])
		{
			$list_car_type_code = Api::get_list_type_code($car_info['car_maker_code'],$car_info['car_model_code'],$car_info['car_year']);
			foreach($list_car_type_code as $_temp)
			{
				if(isset($_temp['type_code']) && $_temp['type_code'] == $car_info['car_type_code'])
				{
					$car_type_name = $_temp['type'];
					break;
				}

			}
		}
		$car_grade_name = '';
		if($car_info['car_grade_code'])
		{
			$list_car_grade_code = Api::get_list_grade_code($car_info['car_maker_code'],$car_info['car_model_code'],$car_info['car_year'],$car_info['car_type_code']);
			foreach($list_car_grade_code as $_temp)
			{
				if(isset($_temp['grade_code']) && $_temp['grade_code'] == $car_info['car_grade_code'])
				{
					$car_grade_name = $_temp['grade'];
					break;
				}

			}
		}

		?>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
			<tbody><tr>
			  <td class="fcate">車番</td>
			  <td class="finp"><?php echo $car_info['plate_no']?></td>
			  <input type="hidden" name="plate_no" value="<?php echo $car_info['plate_no']?>">
			</tr>
		  <tr>
				<td class="fcate">車種</td>
				<td class="finp"><?php echo $car_maker_name.' '.$car_model_name; ?><br></td>
				<input type="hidden" name="car_maker_code" value="<?php echo $car_info['car_maker_code']?>">
				<input type="hidden" name="car_model_code" value="<?php echo $car_info['car_model_code']?>">
		  </tr>
		  <?php if($car_info['car_year'] || $car_info['car_month'] || $car_info['car_type_code'] || $car_info['car_grade_code'] ) { ?>
		  <tr>
			  <td class="fcate">初度登録年月・型式・グレード</td>
			  <td class="finp"><?php if($car_info['car_year']) { echo Constants::to_jp_date($car_info['car_year']);} if($car_info['car_month']) echo $car_info['car_month'].'月'; ?><br>
			  <?php echo $car_type_name.' '.$car_grade_name ?></td>

			  <input type="hidden" name="car_year" value="<?php echo $car_info['car_year'] ?>">
			  <input type="hidden" name="car_month" value="<?php echo $car_info['car_month'] ?>">
			  <input type="hidden" name="car_type_code" value="<?php echo $car_info['car_type_code'] ?>">
			  <input type="hidden" name="car_grade_code" value="<?php echo $car_info['car_grade_code'] ?>">
		  </tr>
		<?php } ?>

			<?php if(isset($car_info['car_size_code'])){ ?>
			<tr>
			  <td class="fcate">車両サイズ</td>
			  <td class="finp"><?php echo Constants::$car_size[$car_info['car_size_code']] ?></td>
			  <input type="hidden" name="car_size_code" value="<?php echo $car_info['car_size_code'] ?>">
			</tr>

			<tr>
			  <td class="fcate">車両重量</td>
			  <td class="finp">
				<?php
				  $car_weight_op = 'car_weight_'.$car_info['car_size_code'] ;
				  $weight = Constants::$$car_weight_op;
				  echo $weight[$car_info['car_weight_code']]
				?>
			  </td>
			  <input type="hidden" name="car_weight_code" value="<?php echo $car_info['car_weight_code'] ?>">
			</tr>
			<?php } ?>

			<?php if(isset($car_info['car_color_code'])) { ?>
			<tr>
				<td class="fcate">車の色</td>
				<td class="finp"><?php echo Constants::$car_color[$car_info['car_color_code']]; ?></td>
				<input type="hidden" name="car_color_code" value="<?php echo $car_info['car_color_code'] ?>">
			</tr>
			<?php } ?>

			<?php if(isset($car_info['coating_code'])) { ?>
			<tr>
				<td class="fcate">コーティングの種類</td>
				<td class="finp"><?php echo Constants::$coating_code[$car_info['coating_code']] ?></td>
				<input type="hidden" name="coating_code" value="<?php echo $car_info['coating_code'] ?>">
			</tr>
			<?php } ?>

			<?php if(isset($car_info['inspection_date'])) { ?>
			<tr>
			  <td class="fcate">車検満了日</td>

			  <input type="hidden" name="inspection_date" value="<?php echo $car_info['inspection_date'] ?>">
			  <?php
					$arr_inspection_date = explode('-',$car_info['inspection_date']);

			  ?>
			  <td class="finp"><?php echo $arr_inspection_date['0'].'年'.(int)$arr_inspection_date['1'].'月'.(int)$arr_inspection_date['2'].'日'; ?></td>
			  <input type="hidden" name="inspection_year" value="<?php echo (int)$arr_inspection_date['0'] ?>">
			  <input type="hidden" name="inspection_month" value="<?php echo (int)$arr_inspection_date['1'] ?>">
			  <input type="hidden" name="inspection_day" value="<?php echo (int)$arr_inspection_date['2'] ?>">

			</tr>
			<?php } ?>

			<?php
				if(isset($car_info['tire_preparation_code']))
				{
			?>
			<tr>
			  <td class="fcate">タイヤの有無</td>
			  <td class="finp"><?php echo Constants::$tire_preparation_code[$car_info['tire_preparation_code']] ?></td>
			</tr>
			<input type="hidden" name="tire_preparation_code" value="<?php echo $car_info['tire_preparation_code'] ?>">
			<?php if(isset($car_info['wheel_preparation_code'])) { ?>
			<tr>
			  <td class="fcate"><?php if($car_info['tire_preparation_code'] == '2') echo 'ホイールの有無（お持ち込み）'; else echo 'ご購入予定の内容';  ?>      </td>
			  <td class="finp">
				  <?php
					if(isset($car_info['wheel_preparation_code']))
					{
						if($car_info['tire_preparation_code']=='2')
							echo Constants::$wheel_preparation_code[$car_info['wheel_preparation_code']] ;
						else
						{
							if($car_info['wheel_preparation_code'] == '1')
							{
								echo ' タイヤのみ購入';
							}
							elseif($car_info['wheel_preparation_code']=='2')
							{
								echo 'タイヤとホイールセット';
							}
						}
					}

				 ?>


			  </td>
			  <input type="hidden" name="wheel_preparation_code" value="<?php  if(isset($car_info['wheel_preparation_code'])) echo $car_info['wheel_preparation_code'] ?>">
			</tr>
			<?php } ?>

			<?php } ?>

			<?php if(isset($car_info['tire_size_code']) && $car_info['tire_size_code']) { ?>
			<tr>
			  <td class="fcate">タイヤのサイズ</td>
			  <td class="finp"><?php echo Constants::$tire_size_code[$car_info['tire_size_code']]?></td>
			  <input type="hidden" name="tire_size_code" value="<?php  if(isset($car_info['tire_size_code'])) echo $car_info['tire_size_code'] ?>">
			</tr>

			<?php } ?>

			<?php if(isset($car_info['is_car_request'])) { ?>
			<tr>
			  <td class="fcate">代車の希望</td>
			  <td class="finp"><?php echo Constants::$is_car_request[$car_info['is_car_request']] ?>
			  </td>

			  <input type="hidden" name="is_car_request" value="<?php echo $car_info['is_car_request'] ?>">
			</tr>
			<?php } ?>
			<?php if($car_info['other_request']) { ?>
			<tr>
				<td class="fcate">ご要望など</td>
				<td class="finp"><?php echo nl2br($car_info['other_request']) ?></td>
			<input type="hidden" name="other_request" value="<?php echo $car_info['other_request'] ?>">
			</tr>
			<?php } ?>
		</tbody></table>


		<div id="bta2">
			<a class="btback fl" href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/form/">修正</a>
			<input type="hidden" name="cok" value="1">
			<input type="submit"  value="予約" class="btgreen fr">
		</div>
	</form>
</div><!--/resform-->