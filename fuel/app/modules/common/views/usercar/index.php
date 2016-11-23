<?php
		$is_post = false;
		if(\Input::method() == 'POST')
			$is_post=true;
		$row = \Input::post();
		
		if(isset($row['car_maker_code']))
		{
			$car_maker_code = \Constants::array_to_option(\Api::get_list_maker(),'maker_code','maker',$row['car_maker_code']);
			$list_model_code = \Api::get_list_model($row['car_maker_code']);
			$car_model_code = \Constants::array_to_option($list_model_code,'model_code','model',$row['car_model_code']);
		}
		else
		{
			$car_maker_code = \Constants::array_to_option(\Api::get_list_maker(),'maker_code','maker','');
		}

		if(isset($row['car_maker_code']) && isset($row['car_model_code']))
		{
			$list_year = \Api::get_list_year_month($row['car_maker_code'],$row['car_model_code']);
			$car_year = \Constants::array_to_option($list_year,'year','year',$row['car_year']);
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

<div id="breadcrumb">
	<ul>
		<li><a href="<?php  echo Uri::base() ?>">トップページ &gt;</a></li>
		<li><a href="<?php  echo Uri::base() ?>inspection/search.html">SSを選ぶ &gt;</a></li>
		<li><a href="<?php  echo Uri::base() ?>inspection/reserve/">日付を選ぶ &gt;</a></li>
		<li><a href="<?php  echo Uri::base() ?>inspection/reserve/time.html">時間を選ぶ &gt;</a></li>
		<li>お客様情報入力</li>
	</ul>
</div>
<h3 class="tit"><?php echo $type_book ?>予約</h3>
<div id="ssname">
	<a target="_blank" href="<?php echo $ss_info['href']?>"><?php echo $ss_info['ss_name']?></a>
TEL:<?php echo $ss_info['tel'] ?>　住所:<?php $ss_info['address'] ?>　管轄会社・支店:<?php echo $ss_info['branch_name']?>
</div>
<div id="date">
<p><?php echo $date_from ?>　〜　<?php echo $date_to ?></p>
<a id="back" href="javascript:history.back();">時間を選び直す</a>
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
						
					?>

	<form  method="post" action="<?php echo $action?>">
		<input type="hidden" name="member_id" value="<?php  echo $user['member_id'] ?>" />
                        <h1>お客様情報を入力してください。</h1>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
                            <tbody><tr>
                                <td class="fcate">氏名<span class="ms">必須</span></td>
                                <td class="finp"><input onchange="zen2han(this) type="text" class="w200" maxlength="15" name="member_kaiinName"  value="<?php echo $is_post ? \Fuel\Core\Input::param('member_kaiinName') : $user['name'] ?>"><br>例:宇佐美&#12288;太郎(最大15文字)</td>
                            </tr>
                            <tr>
                                <td class="fcate">氏名（カナ）<span class="ms">必須</span></td>
                                <td class="finp"><input type="text" id="member_kaiinKana" class="w200" name="member_kaiinKana" maxlength="15" value="<?php echo $is_post ?  \Fuel\Core\Input::param('member_kaiinKana') : $user['kana'] ?>"><br>例:ウサミ&#12288;タロウ</td>
                            </tr>
                            <tr>
                                <td class="fcate">電話番号（携帯）<span class="ms">必須<sup>※</sup></span></td>
                                <td class="finp"><input type="text" name="member_telNo1" class="w150" value="<?php echo $is_post ? \Fuel\Core\Input::param('member_telNo1') : $user['mobile_tel'] ?>"><br>半角英数ハイフンなしで入力&#12288;例：09012341234<br>※携帯電話か自宅の電話番号はどちらか必ず入れてください。
</td>
                            </tr>
                            <tr>
                                <td class="fcate">電話番号（自宅）<span class="ms">必須<sup>※</sup></span></td>
                                <td class="finp"><input type="text" name="member_telNo2" class="w150" value="<?php echo $is_post ?  \Fuel\Core\Input::param('member_telNo2') : $user['house_tel'] ?>"><br>半角英数ハイフンなしで入力&#12288;例：0312345678<br>※携帯電話か自宅の電話番号はどちらか必ず入れてください。</td>
                            </tr>
                            <tr>
                                <td class="fcate">メールアドレス（携帯）</td>
                                <td class="finp"><?php echo $user['mobile_email']?></td>
                            </tr>
                            <tr>
                                <td class="fcate">メールアドレス（PC）</td>
                                <td class="finp"><?php echo $user['pc_email']?></td>
                            </tr>
                        </tbody></table>
                        <p class="cap">
                        ※メールアドレスを変更する場合は<a target="_blank" href="/profile/">Usappyサイト</a>から更新して下さい。</p>


                        <h1>車両情報を入力してください。</h1>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="fm">
                            <tbody><tr>
                              <td class="fcate">車番<span class="ms">必須</span></td>
                              <td class="finp"><input onchange="zen2han(this) type="text" class="w150" name="plate_no" maxlength="4" value="<?php  echo \Fuel\Core\Input::param('plate_no')?>">
                                <br>
                              ※ナンバープレートを入力 例：う･1-21 ⇒121 </td>
                            </tr>
                            <tr>
                                <td class="fcate">車種<span class="ms">必須</span></td>
                                <td class="finp">
                                    <select name="car_maker_code" id="car_maker_code">
										<option value="0">モデルを選択して下さい</option>
                                        <?php echo htmlspecialchars_decode($car_maker_code)  ?>
                                    </select>

                                    <select name="car_model_code" id="car_model_code">
                                        <option value="0">モデルを選択して下さい</option>
										<?php echo  isset($car_model_code) ? htmlspecialchars_decode($car_model_code) :""  ?>
                                    </select>
                                </td>
                                </tr>   
                                
                                <tr><td class="fcate">初度登録年月・型式・グレード</td>
                                <td class="finp">

                                    <select name="car_year" id="car_year">
                                        <option value="0">初度登録年を選択して下さい</option>
										<?php echo isset($car_year) ?  htmlspecialchars_decode($car_year) :""  ?>
                                    </select>

                                    <select name="car_month" id="car_month">
                                       <?php echo \Constants::to_option(\Constants::$month)?>
                                    </select>
                                    <br>
                                    
                                    <select name="car_type_code" id="car_type_code">
                                        <option value="0">型式を選択して下さい</option>
										<?php echo isset($car_type_code) ?  htmlspecialchars_decode($car_type_code) :""  ?>
										
                                    </select>

                                    <select name="car_grade_code" id="car_grade_code">
                                        <option value="0">グレードを選択して下さい</option>
										<?php echo isset($car_grade_code) ? htmlspecialchars_decode($car_grade_code): ""  ?>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td class="fcate">車の色<span class="ms">必須</span></td>
                                <td class="finp">
                                    <select name="car_color_code" id="car_color_code">
                                         <?php echo \Constants::to_option(\Constants::$car_color,\Fuel\Core\Input::param('car_color_code'))?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="fcate">コーティングの種類<span class="ms">必須</span></td>
                                <td class="finp">
                                    <select name="coating_code" id="coating_code">
                                        <?php echo \Constants::to_option(\Constants::$coating_code,\Fuel\Core\Input::param('coating_code')) ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                              <td class="fcate">車検満了日<span class="ms">必須</span></td>
                                <td class="finp">
									<select name="inspection_year" id="inspection_year">
										<?php echo \Constants::to_option(\Constants::$inspection_date,\Fuel\Core\Input::param('inspection_year')) ?>
                                    </select>
									<select name="inspection_month" id="inspection_month">
                                    <?php echo \Constants::to_option(\Constants::$month,\Fuel\Core\Input::param('inspection_month'))?>
                                  </select>
									<select name="inspection_day" id="inspection_day">
                                   <?php echo \Constants::to_option(\Constants::$date,\Fuel\Core\Input::param('inspection_day'))?>
                                 </select>
                              </td>
                            </tr>
                            <tr>
                              <td class="fcate">代車の希望</td>
                                <td class="finp">
									<?php  
										$ck_0 = '';
										$ck_1 = '';
										
										if($is_post)
										{
											if( \Fuel\Core\Input::param('is_car_request') =='1' )
											{
												$ck_1 = 'checked="checked"';
											}
											elseif(\Fuel\Core\Input::param('is_car_request') =='0')
											{
												$ck_0 = 'checked="checked"';
											}
											else
											{
												$ck_0 = '';
												$ck_1 = '';
											}
										}
								    ?>
									<label style="background-color: rgb(255, 255, 255);"><input type="radio" name="is_car_request" <?php echo $ck_0 ?> value="0"> 希望する</label>
									<label style="background-color: rgb(255, 255, 255);"><input type="radio" name="is_car_request" <?php echo $ck_1 ?> value="1"> 希望しない</label>
                              </td>
                            </tr>
                            <tr>
                                <td class="fcate">ご要望など</td>
                                <td class="finp"><textarea class="w500" rows="5" name="other_request" id="other_request"><?php  echo \Fuel\Core\Input::param('other_request')  ?></textarea><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="fcate">注意事項<span class="ms">必須</span></td>
                                <td class="finp">
									<label id="dialog_link" style="background-color: rgb(255, 255, 255);"><input type="checkbox" name="cok" value="1"> 確認する</label>
                                </td>
                            </tr>
                        </tbody></table>

                        <p>上記のお客様情報をUsappy会員データとして更新いたします。</p>

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
</div>
<script type="text/javascript">
	$( "#car_maker_code" ).change(function() {
		if($( "#car_maker_code option:selected").val()=='0' || $( "#car_maker_code option:selected").val()=='')
		{
			$("#car_model_code").html('<option value="0">モデルを選択して下さい</option>');
			$("#car_year").html('<option value="0">モデルを選択して下さい</option>');
			$("#car_type_code").html('<option value="0">モデルを選択して下さい</option>');
			$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>ajax/common/car',
				{
					'car_maker_code':$( "#car_maker_code option:selected").val(),
					'level':'1'
				},
				function(data){
					
					$("#car_model_code").html('<option value="0">モデルを選択して下さい</option>'+data);
					$("#car_year").html('<option value="0">モデルを選択して下さい</option>');
					$("#car_type_code").html('<option value="0">モデルを選択して下さい</option>');
					$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>');
				}
			);
	});
	$( "#car_model_code" ).change(function() {
		if($( "#car_model_code option:selected").val()=='0')
		{
			$("#car_year").html('<option value="0">モデルを選択して下さい</option>');
			$("#car_type_code").html('<option value="0">モデルを選択して下さい</option>');
			$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>ajax/common/car',
				{
					'car_maker_code':$( "#car_maker_code option:selected").val(),
					'car_model_code':$( "#car_model_code option:selected").val(),
					'level':'2'
				},
				function(data){
					
					$("#car_year").html('<option value="0">モデルを選択して下さい</option>'+data);
					$("#car_type_code").html('<option value="0">モデルを選択して下さい</option>');
					$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>');
				}
			);
	});
	$( "#car_year" ).change(function() {
		if($( "#car_year option:selected").val()=='0')
		{
			$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>');
			$("#car_type_code").html('<option value="0">モデルを選択して下さい</option>');
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
					
					$("#car_type_code").html('<option value="0">モデルを選択して下さい</option>'+data);
					$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>');
				}
			);
	});
	$( "#car_type_code" ).change(function() {
		if($( "#car_type_code option:selected").val() =='' || $( "#car_type_code option:selected").val() =='0')
		{
			$("#car_grade_code").html('<option value="0"></option>');
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
					
					$("#car_grade_code").html('<option value="0">モデルを選択して下さい</option>'+data);
				
				}
			);
	});
	
</script>