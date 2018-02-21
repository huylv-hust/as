<?php
$page_was_refreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if($page_was_refreshed )
{
	Fuel\Core\Session::delete('form_'.$menu_code);
}
?>
<?php

		$is_post = false;
		if(\Input::method() == 'POST' && Fuel\Core\Input::post('sscode'))
		{
			$is_post=true;
			$row = \Input::post();
		}
		else
		{
			$row = array();
			if($user['member_id'] || \Fuel\Core\Session::get('nocard') == 1 || \Fuel\Core\Session::get('user_info') != '')// is member get info session
				$row = $info_session;
		}

		if(isset($row['car_maker_code']))
		{
			//$car_maker_code = \Constants::array_to_option(\Api::get_list_maker(),'maker_code','maker',$row['car_maker_code']);
			$car_maker_code = Fuel\Core\Form::select('car_maker_code', $row['car_maker_code'], \Api::get_list_maker(), array('class' => 'form-control','id'=>'car_maker_code'));
			$list_model_code = \Api::get_list_model($row['car_maker_code']);
			$car_model_code = \Constants::array_to_option($list_model_code,'model_code','model',$row['car_model_code']);
		}
		else
		{
			$car_maker_code = Fuel\Core\Form::select('car_maker_code','', \Api::get_list_maker(), array('class' => 'form-control','id'=>'car_maker_code'));
			//$car_maker_code = \Constants::array_to_option(\Api::get_list_maker(),'maker_code','maker','');
		}

		if(isset($row['car_maker_code']) && isset($row['car_model_code']) && $row['car_maker_code'] && $row['car_model_code'])
		{
			$list_year = \Api::get_list_year_month($row['car_maker_code'],$row['car_model_code']);
			$list_year_format = array();
			for($i = 0 ; $i < count($list_year);++$i)
			{
				$list_year_format[$i]['year_format'] =  Constants::to_jp_date($list_year[$i]['year']);
				$list_year_format[$i]['year'] =  $list_year[$i]['year'];
			}

			$car_year = \Constants::array_to_option($list_year_format,'year','year_format',$row['car_year']);
		}

		if(isset($row['car_maker_code']) && isset($row['car_model_code']) && isset($row['car_year']))
		{
			$list_type_code = \Api::get_list_type_code($row['car_maker_code'],$row['car_model_code'],$row['car_year']);
			$car_type_code = \Constants::array_to_option($list_type_code,'type_code','type',$row['car_type_code']);
		}

		if(isset($row['car_maker_code']) && isset($row['car_model_code']) && isset($row['car_year']) && isset($row['car_type_code']))
		{
			$list_grade_code = \Api::get_list_grade_code($row['car_maker_code'],$row['car_model_code'],$row['car_year'],$row['car_type_code']);
			$car_grade_code = \Constants::array_to_option($list_grade_code,'grade_code','grade',$row['car_grade_code']);
		}
?>
<style>
	.label_select
	{
		background-color: rgb(173, 230, 247);
	}
</style>
<div id="breadcrumb">
	<ul>
		<li><a href="<?php echo \Fuel\Core\Uri::base()?>">トップページ &gt;</a></li>
		<li><a href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/search/">SSを選ぶ &gt;</a></li>
		<li><a href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/">日付を選ぶ &gt;</a></li>
		<li><a href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/time/">時間を選ぶ &gt;</a></li>
		<li>お客様情報入力</li>
	</ul>
</div>
<h3 class="tit"><span><?php echo $type_book ?>のご予約</span></h3>
<div id="ssname">
	<a target="_blank" href="<?php echo $ss_info['href']?>"><?php echo $ss_info['ss_name']?></a>
TEL:<?php echo $ss_info['tel'] ?>　住所:<?php echo $ss_info['address'] ?>　管轄会社・支店:<?php echo $ss_info['branch_name']?>
</div>
<div id="date">
	<p><?php $start_time_show = str_replace('-0','-',$start_time_show) ; echo preg_replace('/(-)([0-9]+)(-)/','年$2月',$start_time_show); ?>〜　<?php //echo preg_replace('/(-)([0-9]+)(-)/','年$2月',$end_time) ?></p>
	<!-- a id="back" onclick="submit_form()" href="<?php echo \Fuel\Core\Uri::base().$menu_code?>/reserve/time/">時間を選び直す</a -->
	<a id="back" style="cursor: pointer" onclick="submit_form()">時間を選び直す</a>
</div>
<div id="resform">

					<?php
						if(isset($error))
						{
							echo '<ul id="error" style="display: block; opacity: 0.934316;">';
							foreach($error as $field => $message)
							{
								echo '<li>'.$message.'</li>';
							}
							echo '</ul>';
						}
						if(isset($date_booking))
						{
							echo '<ul id="error" style="display: block; opacity: 0.934316;">';
							echo '<li>'.$date_booking.'</li>';
							echo '</ul>';
						}
					?>
						<form  method="post" action="<?php  echo $action?>" id="booking_data">
						<input type="hidden" name="member_id" value="<?php  echo $user['member_id'] ?>" />
						<input type="hidden" name="menu_code" value="<?php  echo $menu_code ?>" />
						<input type="hidden" name="sscode" value="<?php  echo $ss_info['sscode'] ?>" />
						<input type="hidden" name="pit_no" value="<?php  echo $pit_no ?>" />
						<input type="hidden" name="ss_name" value="<?php  echo $ss_info['ss_name'] ?>" />
						<input type="hidden" name="start_time" value="<?php  echo $start_time ?>" />
						<input type="hidden" name="end_time" value="<?php  echo $end_time  ?>" />
                        <h1>お客様情報を入力してください。</h1>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
                            <tbody><tr>
                                <td class="fcate">氏名<span class="ms">必須</span></td>
                                <td class="finp"><input onchange="han2zen(this)" type="text" class="w200" maxlength="20" name="member_kaiinName"  value="<?php echo $is_post ? \Fuel\Core\Input::param('member_kaiinName') :(isset($row['member_kaiinName']) ? $row['member_kaiinName'] : $user['name'] ) ?>"><br>例:宇佐美&#12288;太郎(最大15文字)</td>
                            </tr>
                            <tr>
                                <td class="fcate">氏名（カナ）<span class="ms">必須</span></td>
                                <td class="finp"><input onchange="convertKanaToOneByte(this)" type="text" id="member_kaiinKana" class="w200" name="member_kaiinKana" maxlength="30" value="<?php echo $is_post ?  \Fuel\Core\Input::param('member_kaiinKana') : ( isset($row['member_kaiinKana']) ? $row['member_kaiinKana'] : $user['kana'] ) ?>"><br>例:ウサミ&#12288;タロウ</td>
                            </tr>
                            <tr>
                                <td class="fcate">電話番号（携帯）<span class="ms">必須<sup>※</sup></span></td>
                                <td class="finp"><input onchange="zen2han(this)" type="text" name="member_telNo1" maxlength="11" class="w150" value="<?php echo $is_post ? \Fuel\Core\Input::param('member_telNo1') : ( isset($row['member_telNo1']) ? $row['member_telNo1'] : $user['mobile_tel'] ) ?>"><br>半角英数ハイフンなしで入力&#12288;例：09012341234<br />※携帯電話か自宅の電話番号はどちらか必ず入れてください。</td>
                            </tr>
                            <tr>
                                <td class="fcate">電話番号（自宅）<span class="ms">必須<sup>※</sup></span></td>
                                <td class="finp"><input type="text" onchange="zen2han(this)" name="member_telNo2" maxlength="11" class="w150" value="<?php echo $is_post ?  \Fuel\Core\Input::param('member_telNo2') : ( isset($row['member_telNo2']) ? $row['member_telNo2'] : $user['house_tel'] ) ?>"><br>半角英数ハイフンなしで入力&#12288;例：0312345678<br />※携帯電話か自宅の電話番号はどちらか必ず入れてください。</td>
                            </tr>
                            <?php if($menu_code == 'inspection' && $user['member_id'] == 0) { ?>
							<tr>
                                <td class="fcate">メールアドレス（携帯）<span class="ms">必須<sup>※</sup></span></td>
                                <td class="finp"><input type="text" name="mobile_email" class="w300" value="<?php echo $is_post ? \Fuel\Core\Input::param('mobile_email') : (isset($row['mobile_email']) ? $row['mobile_email'] : ''); ?>" name="mobile_email"><br>
                                  ※携帯メールアドレスかPCメールアドレスはどちらか必ず入れてください。
                                </td>
                            </tr>
							<tr>
                                <td class="fcate">メールアドレス（PC）<span class="ms">必須<sup>※</sup></span></td>
                                <td class="finp"><input type="text" name="pc_email" class="w300" value="<?php echo $is_post ? \Fuel\Core\Input::param('pc_email') : (isset($row['pc_email']) ? $row['pc_email'] : ''); ?>" name="pc_email"><br>
                                  ※携帯メールアドレスかPCメールアドレスはどちらか必ず入れてください。</td>
                            </tr>
							<?php } else { ?>
							<tr>
                                <td class="fcate">メールアドレス（携帯）</td>
                                <td class="finp"><?php echo $user['mobile_email']?></td>
								<input type="hidden" class="w300" value="<?php echo $user['mobile_email']?>" name="mobile_email">
                            </tr>
                            <tr>
                                <td class="fcate">メールアドレス（PC）</td>
                                <td class="finp"><?php echo $user['pc_email']?></td>
								<input type="hidden" class="w300" value="<?php echo $user['pc_email']?>" name="pc_email">
                            </tr>
							<?php } ?>

                        </tbody></table>
						<?php if($user['member_id']){?>
                        <p class="cap">
                        ※メールアドレスを変更する場合は<a target="_blank" href="/profile/">Usappyサイト</a>から更新して下さい。<br />上記のお客様情報をUsappy会員データとして更新いたします。
						</p>
						<?php } ?>
                        <h1>車両情報を入力してください。</h1>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
                            <tbody><tr>
                              <td class="fcate">車番<span class="ms">必須</span></td>
                              <td class="finp"><input onchange="zen2han(this)" type="text" class="w150" name="plate_no" maxlength="4" value="<?php  if(isset($row['plate_no'])) echo $row['plate_no']?>">
                                <br>
                              ※ナンバープレートを入力 例：う･1-21 ⇒121 </td>
                            </tr>
                            <tr>
                                <td class="fcate">車種<span class="ms">必須</span></td>
                                <td class="finp">
									<?php echo $car_maker_code?>
                                    <select name="car_model_code" id="car_model_code">
                                        <option value="">モデルを選択して下さい</option>
										<?php echo  isset($car_model_code) ? htmlspecialchars_decode($car_model_code) :""  ?>
                                    </select>
                                </td>
                                </tr>

                                <tr><td class="fcate">初度登録年月・型式・グレード</td>
                                <td class="finp">

                                    <select name="car_year" id="car_year">
                                        <option value="">初度登録年を選択して下さい</option>
										<?php echo isset($car_year) ?  htmlspecialchars_decode($car_year) :""  ?>
                                    </select>

                                    <select name="car_month" id="car_month">
                                       <?php echo \Constants::to_option(\Constants::$month,isset($row['car_month']) ? $row['car_month'] :"")?>
                                    </select>
                                    <br>

                                    <select name="car_type_code" id="car_type_code">
                                        <option value="">型式を選択して下さい</option>
										<?php echo isset($car_type_code) ?  htmlspecialchars_decode($car_type_code) :""  ?>

                                    </select>

                                    <select name="car_grade_code" id="car_grade_code">
                                        <option value="">グレードを選択して下さい</option>
										<?php echo isset($car_grade_code) ? htmlspecialchars_decode($car_grade_code): ""  ?>
                                    </select>

                                </td>
                            </tr>
							<?php if($show_car_color_code) { ?>
                            <tr>
                                <td class="fcate">車の色<span class="ms">必須</span></td>
                                <td class="finp">
                                    <select name="car_color_code" id="car_color_code">
                                         <?php echo \Constants::to_option(\Constants::$car_color,isset($row['car_color_code']) ? $row['car_color_code'] :"")?>
                                    </select>
                                </td>
                            </tr>
							<?php } ?>
							<?php if($show_coating_code) {?>
                            <tr>
                                <td class="fcate">コーティングの種類<span class="ms">必須</span></td>
                                <td class="finp">
                                    <select name="coating_code" id="coating_code">
                                        <option value="">コーティングの種類を選択して下さい</option>
										<?php
										if(isset($coating_code) && count($coating_code))
										{
											foreach($coating_code as $_temp)
											{
												if(isset($row['coating_code']) && $row['coating_code'] == $_temp['coating_code'])
													echo '<option value="'.$_temp['coating_code'].'" selected="selected">'.\Constants::$coating_code[$_temp['coating_code']].'</option>';
												else
													echo '<option value="'.$_temp['coating_code'].'">'.\Constants::$coating_code[$_temp['coating_code']].'</option>';
											}
										}
										?>
                                    </select>
                                </td>
                            </tr>
							<?php } ?>
							<?php if($show_car_size_code){ ?>
							<tr>
                              <td class="fcate">車両サイズ<span class="ms">必須</span></td>
                              <td class="finp">
                                <?php
									for($i = 1; $i < count(Constants::$car_size);++$i)
									{
										if(isset($row['car_size_code']) && $row['car_size_code'] == $i)
										{
											echo '<label class="carsize" style="background-color: rgb(255, 255, 255);"><input type="radio" name="car_size_code" value="'.$i.'" checked="checked"> '.Constants::$car_size[$i].'</label><br>';
										}
										else
										{
											echo '<label class="carsize" style="background-color: rgb(255, 255, 255);"><input type="radio" name="car_size_code" value="'.$i.'"> '.Constants::$car_size[$i].'</label><br>';
										}

									}

                                ?>
                              </td>
                            </tr>
							<tr id="wgt1" style="display: table-row">
								<?php
									if(isset($row['car_weight_code']))
								?>
							</tr>
							<tr id="wgt2" style="display: table-row">

							</tr>
							<tr id="wgt3" style="display: table-row">

							</tr>

							<?php } ?>

							<tr>
                              <td class="fcate">車検満了日<?php if($menu_code == 'inspection') echo '<span class="ms">必須</span>'?></td>
                                <td class="finp">
									<select name="inspection_year" id="inspection_year">
										<?php echo \Constants::to_option(\Constants::get_inspection_date(),isset($row['inspection_year']) ? $row['inspection_year'] :"") ?>
                                    </select>
									<select name="inspection_month" id="inspection_month">
                                    <?php echo \Constants::to_option(\Constants::$month,isset($row['inspection_month']) ? $row['inspection_month'] :"")?>
                                  </select>
									<select name="inspection_day" id="inspection_day">
                                   <?php echo \Constants::to_option(\Constants::$date,isset($row['inspection_day']) ? $row['inspection_day'] :"")?>
                                 </select>
                              </td>
                            </tr>

                            <?php if($show_is_car_request){ ?>
							<tr>
                              <td class="fcate">代車の希望</td>
                                <td class="finp">

									<?php
										$ck_0 = 'checked="checked"';
										$ck_1 = '';
										if(is_array($row) && key_exists('is_car_request',$row))
										{
											if( $row['is_car_request'] =='1' )
											{
												$ck_1 = 'checked="checked"';
												$ck_0 ='';
											}
											elseif($row['is_car_request'] =='0')
											{
												$ck_0 = 'checked="checked"';
												$ck_1 = '';
											}
											else
											{
												$ck_0 = '';
												$ck_1 = 'checked="checked"';
											}
										}
								    ?>
									<label style="background-color: rgb(255, 255, 255);"><input type="radio" name="is_car_request" <?php echo $ck_1 ?> value="1">希望する</label>
									<label style="background-color: rgb(255, 255, 255);"><input type="radio" name="is_car_request" <?php echo $ck_0 ?> value="0">希望しない</label>
                              </td>
                            </tr>
							<?php } ?>
							<?php if($show_tire_preparation_code){ ?>

							<?php
								$ck_2 = '';
								$ck_1 = '';

								if(isset($row['tire_preparation_code']))
								{
									if( $row['tire_preparation_code'] =='1' )
									{
										$ck_1 = 'checked="checked"';
									}
									elseif($row['tire_preparation_code'] =='2')
									{
										$ck_2 = 'checked="checked"';
									}
									else
									{
										$ck_1 = '';
										$ck_2 = '';
									}
								}
							?>
							<tr>
                                <td class="fcate">タイヤの有無<span class="ms">必須</span></td>
                                <td class="finp">
									<label style="background-color: rgb(173, 230, 247);"><input type="radio" name="tire_preparation_code" value="1" <?php echo $ck_1 ?>> 購入予定</label>
									<label style="background-color: rgb(255, 255, 255);"><input type="radio" name="tire_preparation_code" value="2" <?php echo $ck_2 ?>> 交換作業</label>
                                    <br>
                                    <p>※宇佐美にて、ご購入頂いたタイヤのみお持ち込み可能です。</p></td>
                            </tr>

							<tr id="qt1" style="display: table-row;">
								<?php

									if(isset($row['tire_preparation_code']) && $row['tire_preparation_code'] == '1')
									{
										if(isset($row['wheel_preparation_code']) && $row['wheel_preparation_code'] == '1')
										{
											echo '<td class="fcate">ご購入予定の内容</td><td class="finp"><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1" checked="checked"> タイヤのみ購入</label><label  id="wheel_preparation_code_1"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2"> タイヤとホイールセット</label><p>※事前に店舗へ在庫をご確認下さい。<br />※店頭配布のお見積りをお持ちの方は、必ず持参して下さい。</p></td>';
										}
										elseif(isset($row['wheel_preparation_code']) && $row['wheel_preparation_code'] == '2')
										{
											echo '<td class="fcate">ご購入予定の内容</td><td class="finp"><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1"> タイヤのみ購入</label><label id="wheel_preparation_code_1"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2" checked="checked"> タイヤとホイールセット</label><p>※事前に店舗へ在庫をご確認下さい。<br />※店頭配布のお見積りをお持ちの方は、必ず持参して下さい。</p></td>';
										}
										else
										{
											echo '<td class="fcate">ご購入予定の内容</td><td class="finp"><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1"> タイヤのみ購入</label><label id="wheel_preparation_code_1"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2"> タイヤとホイールセット</label><br /><p>※事前に店舗へ在庫をご確認下さい。<br />※店頭配布のお見積りをお持ちの方は、必ず持参して下さい。</p></td>';
										}
									}
								?>

							</tr>

							<tr id="qt2" style="display: table-row;">
								<?php
									if(isset($row['tire_preparation_code']) && $row['tire_preparation_code'] == '2')
									{
										if(isset($row['wheel_preparation_code']) && $row['wheel_preparation_code'] == '1')
										{
											echo '<td class="fcate">ホイールの有無</td><td class="finp"><label id="wheel_preparation_code_1"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1" checked="checked"> 有り</label><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2"> 無し</label></td>';
										}
										elseif(isset($row['wheel_preparation_code']) && $row['wheel_preparation_code'] == '2')
										{
											echo '<td class="fcate">ホイールの有無</td><td class="finp"><label id="wheel_preparation_code_1"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1"> 有り</label><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2" checked="checked"> 無し</label></td>';
										}
										else
										{
											echo '<td class="fcate">ホイールの有無</td><td class="finp"><label id="wheel_preparation_code_1""><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1"> 有り</label><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2"> 無し</label></td>';
										}
									}
								?>

							</tr>
							<?php } ?>
							<?php if($menu_code == 'tire') {?>
							<tr>
                                <td class="fcate">タイヤのサイズ<span class="ms">必須</span></td>
                                <td class="finp">
								<select name="tire_size_code" id="tire_size_code">
									<?php echo Constants::to_option(Constants::$tire_size_code,$row['tire_size_code']) ?>
                                </select>
								<br>
								<p>※12～17インチ以外のタイヤは店舗へお問い合わせ下さい。</p></td>
                            </tr>
							<?php } ?>
                            <tr>
                                <td class="fcate">ご要望など</td>
                                <td class="finp"><textarea class="w500" rows="5" name="other_request" id="other_request"><?php if(isset($row['other_request']))  echo $row['other_request']  ?></textarea><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="fcate">注意事項<span class="ms">必須</span></td>
                                <td class="finp">
									<label id="dialog_link" style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="cok" value="1" <?php if(isset($row['cok']) && $row['cok'] == '1') echo 'checked="checked"'; ?> > 確認する</label>
                                </td>
                            </tr>
                        </tbody></table>



                        <div id="bta">
                            <input  value="確認" class="btgreen" type="submit">
                        </div>

                    </form>
                </div>

<div id="dialog">
◆ ご予約当日は、ご予約時間の5分前にはご来店下さい。<br />
◆ 遅れてご来店された場合、ご予約いただいた時間帯に作業を行なえない場合がございます。<br />
◆ 店舗の状況により、ご予約いただいた時間帯に作業を行なえない場合がございます。<br />
◆ 車両の状態やオプション装着の有無によって作業時間が延びる場合があります。<br />
◆ 車検に通らない不正改造車の作業はお受けできません。<br />
◆ 一部車両に関しては作業が行えない場合もあります（要現車確認）。<br />
◆ 外車・逆輸入車の場合、追加料金が発生したり、作業が困難な場合がございます。店舗までお問い合せ下さい。<br />
◆ トラックのWEB予約は承っておりません。店舗までお問合せ下さい。<br />
◆ ドライブスルー洗車（セルフ）はご予約できません。<br />
</div>
 <div id="howto">
        お手元の車検証のこの部分をお確かめください。<br />
        <img src="<?php echo \Fuel\Core\Uri::base()?>assets/img/common/weightvehicle.jpg" alt="お手元の車検証のこの部分をお確かめください。" class="mt10" />
</div>
 <div id="howto2">
        お手元の車検証のこの部分をお確かめください。<br />
        <img src="<?php echo \Fuel\Core\Uri::base()?>assets/img/common/weightvehicle2.jpg" alt="お手元の車検証のこの部分をお確かめください。" class="mt10" />
   </div>

<script type="text/javascript">
	function submit_form()
	{
		$("#booking_data").attr('action','<?php echo Fuel\Core\Uri::base().$menu_code?>/reserve/form?change_time=1');
		$("#booking_data").submit();
	}
	function open_dialog_div(type)
	{
		if(type==1)
			$("#howto").dialog("open");
		else
			$("#howto2").dialog("open");
		return false;
	}

	/*car size code*/
	if($("input[name=car_size_code]:checked").val()=='1')
	{
		$("#wgt1").html('<td class="fcate">車両重量<span class="ms">必須</span></td><td class="finp"><select name="car_weight_code" id="car_weight_code"><?php echo \Constants::to_option(\Constants::$car_weight_1); ?></select></td>');
		$("#car_weight_code option[value=" + <?php if(isset($row ['car_weight_code'])) echo $row['car_weight_code']; ?> +"]").attr("selected","selected");
		$("#wgt3").html('');
		$("#wgt2").html('');
	}
	else if($("input[name=car_size_code]:checked").val() == '2' || $("input[name=car_size_code]:checked").val() =='3')
	{
		$("#wgt2").html('<td class="fcate">車両重量<span class="ms">必須</span></td><td class="finp"><select name="car_weight_code" id="car_weight_code"><?php echo \Constants::to_option(\Constants::$car_weight_2); ?></select> <span class="howto_link" onclick ="open_dialog_div(1)">車両重量の見方</span></td>');
		$("#car_weight_code option[value=" + <?php if(isset($row ['car_weight_code'])) echo $row['car_weight_code']; ?> +"]").attr("selected","selected");
		$("#wgt1").html('');
		$("#wgt3").html('');
	}
	else if($("input[name=car_size_code]:checked").val() =='4' || $("input[name=car_size_code]:checked").val() =='5')
	{
		$("#wgt3").html('<td class="fcate">車両重量<span class="ms">必須</span></td><td class="finp"><select name="car_weight_code" id="car_weight_code"><?php echo \Constants::to_option(\Constants::$car_weight_4); ?></select> <span class="howto_link" onclick ="open_dialog_div(2)">車両重量の見方</span></td>');
		$("#car_weight_code option[value=" + <?php if(isset($row ['car_weight_code'])) echo $row['car_weight_code']; ?> +"]").attr("selected","selected");
		$("#wgt1").html('');
		$("#wgt2").html('');
	}
	/*end car size code*/

	$("input[name=tire_preparation_code]").click(function() {

		if($(this).val() =='1')
		{

			$("#qt1").html('<td class="fcate">ご購入予定の内容</td><td class="finp"><label id="wheel_preparation_code_1"><input onclick="set_backg(this)"  type="radio" name="wheel_preparation_code"  value="1"> タイヤのみ購入</label><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2" > タイヤとホイールセット</label><p>※事前に店舗へ在庫をご確認下さい。<br>※店頭配布のお見積りをお持ちの方は、必ず持参して下さい。</p></td>');
			$("#qt2").html('');
		}
		else if($(this).val() =='2')
		{

			$("#qt2").html('<td class="fcate">ホイールの有無（お持ち込み）</td><td class="finp"><label id="wheel_preparation_code_1"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="1"> 有り</label><label id="wheel_preparation_code_2"><input onclick="set_backg(this)" type="radio" name="wheel_preparation_code" value="2"> 無し</label></td>');
			$("#qt1").html('');
		}
	});
	function set_backg(obj)
	{
		if($(obj).val() =='1')
		{

			$("#wheel_preparation_code_1").css("background-color","#ADE6F7");
			$("#wheel_preparation_code_2").css("background-color","#ffffff");
		}
		else if($(obj).val() =='2')
		{
			$("#wheel_preparation_code_2").css("background-color","#ADE6F7");
			$("#wheel_preparation_code_1").css("background-color","#ffffff");
		}
	}
	$("input[name=car_size_code]").click(function() {

		if($(this).val() =='1')
		{

			$("#wgt1").html('<td class="fcate">車両重量<span class="ms">必須</span></td><td class="finp"><select name="car_weight_code" id="car_weight_code"><?php echo \Constants::to_option(\Constants::$car_weight_1); ?></select></td>');
			$("#wgt3").html('');
			$("#wgt2").html('');
		}
		else if($(this).val() =='2' || $(this).val() =='3')
		{

			$("#wgt2").html('<td class="fcate">車両重量<span class="ms">必須</span></td><td class="finp"><select name="car_weight_code" id="car_weight_code"><?php echo \Constants::to_option(\Constants::$car_weight_2); ?></select> <span class="howto_link" onclick ="open_dialog_div(1)" >車両重量の見方</span></td>');
			$("#wgt1").html('');
			$("#wgt3").html('');
		}
		else if($(this).val() =='4' || $(this).val() =='5')
		{
			$("#wgt3").html('<td class="fcate">車両重量<span class="ms">必須</span></td><td class="finp"><select name="car_weight_code" id="car_weight_code"><?php echo \Constants::to_option(\Constants::$car_weight_4); ?></select> <span class="howto_link2" onclick ="open_dialog_div(2)">車両重量の見方</span></td>');
			$("#wgt1").html('');
			$("#wgt2").html('');
		}
	});
	$( "#car_maker_code" ).change(function() {

		if( $( "#car_maker_code option:selected").val()== '')
		{
			$("#car_model_code").html('<option value="">モデルを選択して下さい</option>');
			$("#car_year").html('<option value="">初度登録年を選択して下さい</option>');
			$("#car_type_code").html('<option value="">型式を選択して下さい</option>');
			$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>ajax/common/car',
				{
					'car_maker_code':$( "#car_maker_code option:selected").val(),
					'level':'1'
				},
				function(data){

					$("#car_model_code").html('<option value="">モデルを選択して下さい</option>'+data);
					$("#car_year").html('<option value="">初度登録年を選択して下さい</option>');
					$("#car_type_code").html('<option value="">型式を選択して下さい</option>');
					$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
				}
			);
	});
	$( "#car_model_code" ).change(function() {

		if($( "#car_model_code option:selected").val()=='')
		{
			$("#car_year").html('<option value="">初度登録年を選択して下さい</option>');
			$("#car_type_code").html('<option value="">型式を選択して下さい</option>');
			$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>ajax/common/car',
				{
					'car_maker_code':$( "#car_maker_code option:selected").val(),
					'car_model_code':$( "#car_model_code option:selected").val(),
					'level':'2'
				},
				function(data){

					$("#car_year").html('<option value="">初度登録年を選択して下さい</option>'+data);
					$("#car_type_code").html('<option value="">型式を選択して下さい</option>');
					$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
				}
			);
	});
	$( "#car_year" ).change(function() {

		if($( "#car_year option:selected").val()=='')
		{
			$("#car_type_code").html('<option value="">型式を選択して下さい</option>');
			$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
			return ;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>ajax/common/car',
				{
					'car_year':$( "#car_year option:selected").val(),
					'car_maker_code':$( "#car_maker_code option:selected").val(),
					'car_model_code':$( "#car_model_code option:selected").val(),
					'level':'3'
				},
				function(data){

					$("#car_type_code").html('<option value="">型式を選択して下さい</option>'+data);
					$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
				}
			);
	});
	$( "#car_type_code" ).change(function() {

		if($( "#car_type_code option:selected").val() =='')
		{
			$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>ajax/common/car',
				{
					'car_type_code':$( "#car_type_code option:selected").val(),
					'car_year':$( "#car_year option:selected").val(),
					'car_maker_code':$( "#car_maker_code option:selected").val(),
					'car_model_code':$( "#car_model_code option:selected").val(),
					'level':'4'
				},
				function(data){

					$("#car_grade_code").html('<option value="">グレードを選択して下さい</option>'+data);

				}
			);
	});
</script>
<script>
document.onkeydown = fkey;
document.onkeypress = fkey
document.onkeyup = fkey;

var wasPressed = false;

function fkey(e){
        e = e || window.event;
       if( wasPressed ) return;

        if (e.keyCode == 116) {
            <?php Fuel\Core\Session::delete('form_'.$menu_code); ?>
            wasPressed = true;
        }else
		{
            //alert("Window closed");
        }
 }
</script>
<script type="text/javascript">
function zen2han(e)
{
    var str = e.value;
    str = str.replace(/[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function (s) {
        return String.fromCharCode(s.charCodeAt(0) - 65248);
    });
    e.value = str;
};
function han2zen(e)
{
    var str = e.value;
    str = convertKanaToTwoByte(str);
    str = str.replace(/[!"#$%&'()*+,\-.\/0-9:;<=>?@A-Z\[\\\]^_`a-z{|}~]/g, function(s) {
        return String.fromCharCode(s.charCodeAt(0) + 0xFEE0);
    });

    e.value = str;
};
var convertKanaToTwoByte = function(str) {
    for(var i=0, len=str.length; i<len; i++) {
        if(str.charCodeAt(i) === gMark || str.charCodeAt(i) === pMark) {
            if(str.charCodeAt(i) === gMark && gg[str.charCodeAt(i-1)]) {
                str = str.replace(str[i-1], String.fromCharCode(gg[str.charCodeAt(i-1)]))
                 .replace(str[i], '');
            }
        else if(str.charCodeAt(i) === pMark && pp[str.charCodeAt(i-1)]) {
            str = str.replace(str[i-1], String.fromCharCode(pp[str.charCodeAt(i-1)]))
                 .replace(str[i], '');
        }
        else {
            break;
        }
        i--;
        len = str.length;
        }
        else {
            if(mm[str.charCodeAt(i)] && str.charCodeAt(i+1) !== gMark && str.charCodeAt(i+1) !== pMark) {
                str = str.replace(str[i], String.fromCharCode(mm[str.charCodeAt(i)]));
            }
        }
    }
    return str;
};
var createKanaMap = function (properties, values) {
    var kanaMap = {};
    // 念のため文字数が同じかどうかをチェックする(ちゃんとマッピングできるか)
    if (properties.length === values.length) {
        for (var i = 0, len = properties.length; i < len; i++) {
            var property = properties.charCodeAt(i),
                    value = values.charCodeAt(i);
            kanaMap[property] = value;
        }
    }
    return kanaMap;
};

// 全角から半角への変換用マップ
var m = createKanaMap(
        'アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンァィゥェォッャュョ',
        'ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜｦﾝｧｨｩｪｫｯｬｭｮ'
        );
// 半角から全角への変換用マップ
var mm = createKanaMap(
        'ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜｦﾝｧｨｩｪｫｯｬｭｮ',
        'アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンァィゥェォッャュョ'
        );

// 全角から半角への変換用マップ
var g = createKanaMap(
        'ガギグゲゴザジズゼゾダヂヅデドバビブベボ',
        'ｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾊﾋﾌﾍﾎ'
        );
// 半角から全角への変換用マップ
var gg = createKanaMap(
        'ｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾊﾋﾌﾍﾎ',
        'ガギグゲゴザジズゼゾダヂヅデドバビブベボ'
        );

// 全角から半角への変換用マップ
var p = createKanaMap(
        'パピプペポ',
        'ﾊﾋﾌﾍﾎ'
        );
// 半角から全角への変換用マップ
var pp = createKanaMap(
        'ﾊﾋﾌﾍﾎ',
        'パピプペポ'
        );

var gMark = 'ﾞ'.charCodeAt(0),
        pMark = 'ﾟ'.charCodeAt(0);
function convertKanaToOneByte(e) {
    var str = e.value;
    for (var i = 0, len = str.length; i < len; i++) {
        // 濁音もしくは半濁音文字
        if (g.hasOwnProperty(str.charCodeAt(i)) || p.hasOwnProperty(str.charCodeAt(i))) {
            // 濁音
            if (g[str.charCodeAt(i)]) {
                str = str.replace(str[i], String.fromCharCode(g[str.charCodeAt(i)]) + String.fromCharCode(gMark));
            }
            // 半濁音
            else if (p[str.charCodeAt(i)]) {
                str = str.replace(str[i], String.fromCharCode(p[str.charCodeAt(i)]) + String.fromCharCode(pMark));
            }
            else {
                break;
            }
            // 文字列数が増加するため調整
            i++;
            len = str.length;
        }
        else {
            if (m[str.charCodeAt(i)]) {
                str = str.replace(str[i], String.fromCharCode(m[str.charCodeAt(i)]));
            }
        }
    }
    //return str;
    e.value = str;
}
//
$.fn.autoKana('input[name=member_kaiinName]', 'input[name=member_kaiinKana]', { katakana : true });
$('input[name=member_kaiinName]').on('blur', function(){ $('input[name=member_kaiinKana]').trigger('change'); });
</script>
