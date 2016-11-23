<!DOCTYPE html>
<style>
	.error-mess{
		color:red;
	}
</style>

		<div class="container">
			<h3>
				リペア実績登録
			</h3>
			<form class="form-inline" method="post" action="" id="report-form">
				<?php if($info){ ?>
				<p class="text-right">
					<button type="button" data-id="<?php echo $info['repair_date'] ?>" class="btn btn-danger btn-sm delete-report">
						<i class="glyphicon glyphicon-trash icon-white"></i>
						削除
					</button>
				</p>
				<?php } ?>
				<table class="table table-striped">
					<tr>
						<th  class="text-right">作業日</th>
						<td>
							<?php echo Form::input('repair_date', Input::post('repair_date',isset($post) ? $post->repair_date : $info['repair_date']), array('class'=>'form-control dateform', 'size'=>'12')); ?>
							<span class="text-info">※必須</span>
							<span class="error-mess"><?php if(isset($error['repair_date_error'])) echo($error['repair_date_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">出勤区分</th>
						<td>
							<?php
								echo Form::select('work_code',Input::post('work_code',
									isset($post) ? $post->work_code : $info['work_code']),
									\Constants::$work_code,
									array( // attributes
										'class' => 'form-control'
								   )
								);


							?>

							<span class="text-info">※必須</span>
							<span class="error-mess"><?php if(isset($error['work_code_error'])) echo($error['work_code_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">天気</th>
						<td>
							<?php
								echo Form::select('weather_code',Input::post('weather_code',
									isset($post) ? $post->weather_code : $info['weather_code']),
									\Constants::$weather_code,
									array( // attributes
										'class' => 'form-control'
								   )
								);
							?>
							<span class="text-info">※出勤区分が「施工日」の場合必須</span>
							<span class="error-mess"><?php if(isset($error['weather_code_error'])) echo($error['weather_code_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">勤務地SSコード1</th>
						<td>
							<?php echo Form::input('sscode1', Input::post('sscode1',isset($post) ? $post->sscode1 : $info['sscode1']), array('class'=>'form-control', 'size'=>'6','id'=>'ss_1')); ?>
							<button type="button" class="btn btn-success btn-sm" name="findss-btn" data-id="1">
								<i class="glyphicon glyphicon-search icon-white"></i>
							</button>
							<span class="text-info">※出勤区分が「施工日」「準備」の場合必須</span>
							<span class="error-mess"><?php if(isset($error['sscode1_error'])) echo($error['sscode1_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">勤務地SSコード2</th>
						<td>
							<?php echo Form::input('sscode2', Input::post('sscode2',isset($post) ? $post->sscode2 : $info['sscode2']), array('class'=>'form-control', 'size'=>'6','id'=>'ss_2')); ?>
							<button type="button" class="btn btn-success btn-sm" name="findss-btn" data-id="2">
								<i class="glyphicon glyphicon-search icon-white"></i>
							</button>
							<span class="error-mess"><?php if(isset($error['sscode2_error'])) echo($error['sscode2_error'])?></span>
						</td>
					</tr>
					<?php
						for($i=0;$i<=23;++$i){
							if($i < 10){ $i = '0'.$i; }
							$listHours[$i] = $i;
						}
						$listMinute = array('00' => '00', '15' => '15', '30' => '30', '45' => '45');
					?>
					<tr>
						<th class="text-right">勤務時間</th>
						<td>
							<?php echo Form::select('start_time_h', Input::post('start_time_h',isset($post) ? $post->start_time_h : $info['start_time'] != 0 ? sprintf('%02d',(int)($info['start_time']/60)) : ''),$listHours, array('class'=>'form-control')); ?>
							:
							<?php echo Form::select('start_time_m', Input::post('start_time_m',isset($post) ? $post->start_time_m : $info['start_time'] != 0 ? sprintf('%02d',(int)($info['start_time']%60)) : ''),$listMinute , array('class'=>'form-control')); ?>
							～
							<?php echo Form::select('end_time_h', Input::post('end_time_h',isset($post) ? $post->end_time_h : $info['end_time'] != 0 ? sprintf('%02d',(int)($info['end_time']/60)) : ''),$listHours, array('class'=>'form-control')); ?>
							:
							<?php echo Form::select('end_time_m', Input::post('end_time_m',isset($post) ? $post->end_time_m : $info['end_time'] != 0 ? sprintf('%02d',(int)($info['end_time']%60)) : ''),$listMinute, array('class'=>'form-control')); ?>
							<span class="text-info">※出勤区分が「施工日」「準備」の場合必須</span>
							<span class="error-mess"><?php if(isset($error['time_error'])) echo($error['time_error'])?></span>
						</td>
					</tr>
					<t休憩時間r>
						<th class="text-right">休憩時間</th>
						<td>
							<div class="input-group">
								<?php
									$rest_min = array();
									for($i=0;$i<=120;$i+=10){
										$rest_min[$i] = $i.'分';
									}
									echo Form::select('rest_min',Input::post('rest_min',
										isset($post) ? $post->rest_min : $info['rest_min']),
										$rest_min,
										array( // attributes
											'class' => 'form-control'
									   )
									);
								?>
							</div>
							<span class="error-mess"><?php if(isset($error['rest_min_error'])) echo($error['rest_min_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">施工時間</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('work_min_h', Input::post('work_min_h',isset($post) ? $post->work_min_h : (int)($info['work_min']/60)), array('class'=>'form-control', 'size'=>'5','onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">時間</div>

								<?php
									$work_min_m = array();
									for($i=0;$i<=50;$i+=10){
										$work_min_m[$i] = $i.'分';
									}
									echo Form::select(
										'work_min_m',
										Input::post('work_min_m', isset($post) ? $post->rest_min : $info['work_min'] % 60),
										$work_min_m,
										array( // attributes
											'class' => 'form-control'
									   )
									);
								?>
							</div>
							<span class="error-mess"><?php if(isset($error['work_min_error'])) echo($error['work_min_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">台数</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('car_count', Input::post('car_count',isset($post) ? $post->car_count : $info['car_count'] !=0 ? $info['car_count'] :0), array('class'=>'form-control', 'size'=>'5','onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">台</div>
							</div>
							<span class="error-mess"><?php if(isset($error['car_count'])) echo($error['car_count'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">ルールピース数</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('rule_piece_count', Input::post('rule_piece_count',isset($post) ? $post->rule_piece_count : $info['rule_piece_count'] !=0 ? $info['rule_piece_count'] :0), array('class'=>'form-control', 'size'=>'5', 'onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">ピース</div>
							</div>
							<span class="error-mess"><?php if(isset($error['rule_piece_count_error'])) echo($error['rule_piece_count_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">売上ピース数</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('sales_piece_count', Input::post('sales_piece_count',isset($post) ? $post->sales_piece_count : $info['sales_piece_count'] !=0 ? $info['sales_piece_count'] :0), array('class'=>'form-control', 'size'=>'5', 'onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">ピース</div>
							</div>
							<span class="error-mess"><?php if(isset($error['sales_piece_count_error'])) echo($error['sales_piece_count_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">金額(税込)</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('price', Input::post('price',isset($post) ? $post->price : $info['price'] !=0 ? $info['price'] :0), array('class'=>'form-control', 'size'=>'5', 'onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">円</div>
							</div>
							<span class="error-mess"><?php if(isset($error['price_error'])) echo($error['price_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">キャンセル数</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('cancel_count', Input::post('cancel_count',isset($post) ? $post->cancel_count : $info['cancel_count'] !=0 ? $info['cancel_count'] :0), array('class'=>'form-control', 'size'=>'5','onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">台</div>
							</div>
							<span class="error-mess"><?php if(isset($error['cancel_count_error'])) echo($error['cancel_count_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">キャンセル金額(税込)</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('cancel_price', Input::post('cancel_price',isset($post) ? $post->cancel_price : $info['cancel_price'] !=0 ? $info['cancel_price'] :0), array('class'=>'form-control', 'size'=>'5','onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">円</div>
							</div>
							<span class="error-mess"><?php if(isset($error['cancel_price_error'])) echo($error['cancel_price_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">資材発注金額(税抜)</th>
						<td>
							<div class="input-group">
								<?php echo Form::input('cost_price', Input::post('cost_price',isset($post) ? $post->cost_price : $info['cost_price'] !=0 ? $info['cost_price'] :0), array('class'=>'form-control', 'size'=>'5','onchange' => 'Util.zen2han(this)')); ?>
								<div class="input-group-addon">円</div>
							</div>
							<span class="error-mess"><?php if(isset($error['cost_price_error'])) echo($error['cost_price_error'])?></span>
						</td>
					</tr>
					<tr>
						<th class="text-right">備考</th>
						<td>
							<?php echo Form::textarea('note', Input::post('note',isset($post) ? $post->note : $info['note']), array('rows' => 5, 'cols' => 50,'class'=>'form-control'));?>
							<span class="error-mess"><?php if(isset($error['note'])) echo($error['note'])?></span>
							<div class="text-info">※30文字まで</div>
						</td>
					</tr>
				</table>

				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-sm" id="form-submit">
						<i class="glyphicon glyphicon-pencil icon-white"></i>
						保存
					</button>
				</div>

			</form>

			<div id="findcardform" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="gridSystemModalLabel">
								カード番号から情報を呼び出すためにはカード番号とお客様の生年月日を入力してください
							</h4>
						</div>
						<div class="modal-body">
							<form mehod="post" class="form-horizontal">
								<div class="form-group">
									<label class="col-md-4 control-label">カード番号</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="" size="16">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">生年月日(YYYYMMDD)</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="" size="8">
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-sm">
											<i class="glyphicon glyphicon-pencil icon-white"></i>
											呼び出し
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php echo $ssfinder ?>


		<script>
			$(function (e)
			{
				$('.dateform').datepicker();

				$('button[name=findss-btn]').on('click', function () {
					$('#ssfinder').modal();
					var id = $(this).data('id');
					$('#ss_id').val(id);
					return false;
				});

				$('#ssfinder div.list-group a').on('click', function () {
					$('#ssfinder').modal('hide');
					return false;
				});
			});

			 $('.delete-report').on('click', function (){
				var r = confirm("削除します、よろしいですか?");
				if (r == true) {
					var date = $(this).data('id');
					var id = "<?php echo $info['repair_staff_id'] ;?>";

					$.ajax({
						type: "POST",
						url : "<?php echo Uri::base(true) ?>staff/report/delete_report",
						//dataType: 'json',
						data : {id:id,date:date},
						success : function(data){
							var return_url = '<?php echo \Cookie::get('return_reports_url'); ?>';
							if(return_url != ''){
								location.href = return_url;
							}else{
								location.href = "<?php echo Uri::base(true) ?>staff/reports";
							}
						}
					});
				};
			});
		</script>
		<script>
		$(document).ready(function(){
			$('#form-submit').click(function(){
				if(!confirm('保存します、よろしいですか？')){
					return false
				}
			});
		})
		</script>
