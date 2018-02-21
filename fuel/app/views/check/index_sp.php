<script type="text/javascript">window.history.forward();
    function no_back() {
        window.history.forward();
    }</script>

	<div id="mainarea" onload="no_back();" onpageshow="if (event.persisted) no_back();" onunload="">
		<h3 class="tit"><span><?php echo Constants::$pit_work[$menu_code]?>のご予約</span></h3>
		<div id="resform">
			<p>下記内容でご予約します。間違いありませんか。</p>
			<form action="<?php echo $action ?>?sp=1" method="post" id="booking_data" name="post_data">
				<input type="hidden" name="menu_code" value="<?php echo $menu_code?>">
				<input type="hidden" name="sscode" value="<?php echo $sscode?>">
				<input type="hidden" name="pit_no" value="<?php echo $pit_no?>">
				<input type="hidden" name="member_id" value="<?php echo $cs_info['member_id'] ?>">
				<h1>店舗と日時</h1>
				<dl class="fm">
					<dt class="fcate">店舗名</dt>
					<dd class="finp"><?php echo $ss_name?></dd>
					<dt class="fcate">日時</dt>
					<dd class="finp"><?php $time = str_replace(' ','日',preg_replace('/(-)([0-9]+)(-)/','年$2月',$start_time)); echo str_replace(array('年0','月0'),array('年','月'), $time).'〜'; ?></dd>
					<dt class="fcate">作業内容</dt>
					<dd class="finp"><?php  echo Constants::$pit_work[$menu_code]?></dd>
					<input type="hidden" name="start_time" value="<?php echo $start_time?>">
					<input type="hidden" name="end_time" value="<?php echo $end_time?>">
				</dl>


				<h1>お客様情報</h1>
				<dl class="fm">
					<dt class="fcate">氏名</dt>
					<dd class="finp"><?php echo $cs_info['member_kaiinName']?></dd>
					<input type="hidden" name="member_kaiinName" value="<?php echo $cs_info['member_kaiinName']?>">
					<dt class="fcate">氏名（カナ）</dt>
					<dd class="finp"><?php echo $cs_info['member_kaiinKana']?></dd>
					<input type="hidden" name="member_kaiinKana" value="<?php echo $cs_info['member_kaiinKana']?>">
					<dt class="fcate">電話番号（携帯）</dt>
					<dd class="finp"><?php echo $cs_info['member_telNo1']?></dd>
					<input type="hidden" name="member_telNo1" value="<?php echo $cs_info['member_telNo1']?>">
					<dt class="fcate">電話番号（自宅）</dt>
					<dd class="finp"><?php echo $cs_info['member_telNo2']?></dd>
					<input type="hidden" name="member_telNo2" value="<?php echo $cs_info['member_telNo2']?>">

					<?php if($cs_info['member_id'] == 0) {?>
					<dt class="fcate">メールアドレス（携帯）</dt>
					<dd class="finp"><?php echo $cs_info['mobile_email']?></dd>
					<dt class="fcate">メールアドレス（PC）</dt>
					<dd class="finp"><?php echo $cs_info['pc_email']?></dd>
					<?php }?>
					<input type="hidden" name="pc_email" value="<?php echo $cs_info['pc_email']?>">
					<input type="hidden" name="mobile_email" value="<?php echo $cs_info['mobile_email']?>">
				</dl>


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
								if($_temp['model_code'] == $car_info['car_model_code'])
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
								if($_temp['type_code'] == $car_info['car_type_code'])
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
								if($_temp['grade_code'] == $car_info['car_grade_code'])
								{
									$car_grade_name = $_temp['grade'];
									break;
								}

							}
						}

				?>
				<dl class="fm">
					<dt class="fcate">車番</dt>
					<dd class="finp"><?php echo $car_info['plate_no']?></dd>
					<input type="hidden" name="plate_no" value="<?php echo $car_info['plate_no']?>">
					<dt class="fcate">車種</dt>
					<dd class="finp"><?php echo $car_maker_name.' '.$car_model_name; ?></dd>
					<input type="hidden" name="car_maker_code" value="<?php echo $car_info['car_maker_code']?>">
					<input type="hidden" name="car_model_code" value="<?php echo $car_info['car_model_code']?>">
					<?php if($car_info['car_year'] || $car_info['car_month'] || $car_info['car_type_code'] || $car_info['car_grade_code'] ) { ?>
					<dt class="fcate">初度登録年月・型式・グレード</dt>
					<dd class="finp"><?php if($car_info['car_year']) { echo Constants::to_jp_date($car_info['car_year']);} if($car_info['car_month']) echo $car_info['car_month'].'月'; ?><br> <?php echo $car_type_name.' '.$car_grade_name ?></dd>
					<input type="hidden" name="car_year" value="<?php echo $car_info['car_year'] ?>">
					<input type="hidden" name="car_month" value="<?php echo $car_info['car_month'] ?>">
					<input type="hidden" name="car_type_code" value="<?php echo $car_info['car_type_code'] ?>">
					<input type="hidden" name="car_grade_code" value="<?php echo $car_info['car_grade_code'] ?>">
					<?php } ?>
					<?php if(isset($car_info['car_size_code'])){ ?>
					<dt class="fcate">車両サイズ</dt>
					<dd class="finp"><?php echo Constants::$car_size[$car_info['car_size_code']] ?></dd>
					<input type="hidden" name="car_size_code" value="<?php echo $car_info['car_size_code'] ?>">
					<dt class="fcate">車両重量</dt>
					<dl class="finp">
					  <?php
						$car_weight_op = 'car_weight_'.$car_info['car_size_code'] ;
						$weight = Constants::$$car_weight_op;
						echo $weight[$car_info['car_weight_code']]
					  ?>
					</dl>
					<input type="hidden" name="car_weight_code" value="<?php echo $car_info['car_weight_code'] ?>">
					<?php } ?>

					<?php if(isset($car_info['car_color_code'])) { ?>
						<dt class="fcate">車の色</dt>
						<dd class="finp"><?php echo Constants::$car_color[$car_info['car_color_code']]; ?></dd>
						<input type="hidden" name="car_color_code" value="<?php echo $car_info['car_color_code'] ?>">
					<?php } ?>
					<?php if(isset($car_info['coating_code'])) { ?>
						<dt class="fcate">コーティングの種類</dt>
                        <dd class="finp"><?php echo Constants::$coating_code[$car_info['coating_code']] ?></dd>
						<input type="hidden" name="coating_code" value="<?php echo $car_info['coating_code'] ?>">
					<?php } ?>


					<?php
						if(isset($car_info['inspection_date'])){
						$arr_inspection_date = explode('-',$car_info['inspection_date']);
					?>
					<dt class="fcate">車検満了日</dt>
					<dd class="finp"><?php echo $arr_inspection_date['0'].'年'.(int)$arr_inspection_date['1'].'月'.(int)$arr_inspection_date['2'].'日'; ?></dd>
					<input type="hidden" name="inspection_date" value="<?php echo $car_info['inspection_date'] ?>">
					<input type="hidden" name="inspection_year" value="<?php echo $arr_inspection_date['0'] ?>">
					<input type="hidden" name="inspection_month" value="<?php echo $arr_inspection_date['1'] ?>">
					<input type="hidden" name="inspection_day" value="<?php echo $arr_inspection_date['2'] ?>">

					<?php } ?>

					<?php if(isset($car_info['is_car_request'])) { ?>
					<dt class="fcate">代車の希望</dt>
					<dd class="finp">
						<?php echo Constants::$is_car_request[$car_info['is_car_request']] ?>
					</dd>
					 <input type="hidden" name="is_car_request" value="<?php echo $car_info['is_car_request'] ?>">
					</tr>
					<?php } ?>

				   <?php if(isset($car_info['tire_preparation_code'])){?>
					<dt class="fcate">タイヤの有無</dt>
					<dt class="finp"><?php echo Constants::$tire_preparation_code[$car_info['tire_preparation_code']] ?></dt>
					<input type="hidden" name="tire_preparation_code" value="<?php echo $car_info['tire_preparation_code'] ?>">
					<?php if(isset($car_info['wheel_preparation_code'])) { ?>
					<dt class="fcate"><?php if($car_info['tire_preparation_code'] == '2') echo 'ホイールの有無'; else echo 'ご購入予定の内容';  ?></dt>
						  <dd class="finp">
							  <?php
								if(isset($car_info['wheel_preparation_code']))
								{
									if($car_info['tire_preparation_code']=='2')
										echo Constants::$wheel_preparation_code[$car_info['wheel_preparation_code']] ;
									else
									{
										if($car_info['wheel_preparation_code'] == '1')
										{
											echo 'タイヤのみ購入';
										}
										elseif($car_info['wheel_preparation_code']=='2')
										{
											echo 'タイヤとホイールセット';
										}
									}
								}
							 ?>

						  </dd>
						  <input type="hidden" name="wheel_preparation_code" value="<?php  if(isset($car_info['wheel_preparation_code'])) echo $car_info['wheel_preparation_code'] ?>">
						<?php } ?>

					<?php } ?>
					<?php if(isset($car_info['tire_size_code'])){ ?>
						<dt class="fcate">タイヤのサイズ</dt>
						<dd class="finp"><?php echo Constants::$tire_size_code[$car_info['tire_size_code']]?></dd>
						<input type="hidden" name="tire_size_code" value="<?php echo $car_info['tire_size_code'] ?>">
					<?php } ?>

					<?php if($car_info['other_request']) { ?>
					<dt class="fcate">ご要望など</dt>
					<dd class="finp"><?php echo nl2br($car_info['other_request']) ?></dd>
					<input type="hidden" name="other_request" value="<?php echo $car_info['other_request'] ?>">
					<?php } ?>
				</dl>
				 <input type="hidden" name="cok" value="1">
				<div class="pd10 clear">
					<input type="submit" style="cursor: pointer;"  class="grebt" value="予約"/>
				</div>

			</form>
		</div><!--/resform-->
		<div class="pd10">
			<a class="graybt" href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/form/">修正</a>

		</div>
	</div><!--/mainarea-->
