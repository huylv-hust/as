<style type="text/css">
	.text-info span{color: #F00}
	div.repair-image {
		margin-top: 10px;
		margin-bottom: 10px;
	}

	button.remove-btn {
		position: relative;
		left: -20px;
		top: -10px;
		padding: 8px;
		vertical-align: top;
	}
</style>
<div class="container">
	<h3>
		リペア予約登録
	</h3>

	<form method="post" class="form-inline" id="reserve-form">

		<p class="text-right">
			<button type="button" class="btn btn-warning btn-sm">
				<i class="glyphicon glyphicon-step-backward icon-white"></i>
				戻る
			</button>
			<button type="button" class="btn btn-danger btn-sm delete" data-no="<?php echo $repairreservation->reservation_no; ?>">
				<i class="glyphicon glyphicon-trash icon-white"></i>
				削除
			</button>
		</p>

		<table class="table table-striped">
			<tbody>
				<tr>
					<th class="text-right">担当技術者</th>
					<td>
						<?php $staff_info = \Session::get('staff_info'); ?>
						<?php echo htmlspecialchars($staff_info['staff_name']); ?>
					</td>
				</tr>
				<tr>
					<th class="text-right">施工SSコード</th>
					<td>
						<?php echo Form::input('sscode', Input::post('sscode', isset($post) ? $post->sscode : $repairreservation->sscode), array('class'=>'form-control', 'size'=>'6')); ?>
						<?php echo Form::input('reservation_no', $repairreservation->reservation_no, array('type'=>'hidden', 'size'=>'6')); ?>
						<button type="button" class="btn btn-success btn-sm" name="findss-btn">
							<i class="glyphicon glyphicon-search icon-white"></i>
						</button>
						<span class="text-info"><span><?php if(isset($errors['sscode'])){ echo $errors['sscode']; } ?></span>※必須</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">ピース数</th>
					<td>
						<div class="input-group">
							<div class="input-group-addon">A:キズ</div>
							<?php $a_piece_count = $repairreservation->a_piece_count ? $repairreservation->a_piece_count : 0; ?>
							<?php $b_piece_count = $repairreservation->b_piece_count ? $repairreservation->b_piece_count : 0; ?>
							<input type="text" name="a_piece_count" class="form-control" size="5" value="<?php if(isset($_POST['a_piece_count'])){ echo $_POST['a_piece_count']; }else{ echo $a_piece_count; } ?>" onchange="Util.zen2han(this)"/>
							<div class="input-group-addon">ピース</div>
						</div>
						<span class="text-info"><span><?php if(isset($errors['a_piece_count'])){ echo $errors['a_piece_count']; } ?></span></span>
						<div class="input-group">
							<div class="input-group-addon">B:へこみ</div>
							<input type="text" name="b_piece_count" class="form-control" size="5" value="<?php if(isset($_POST['b_piece_count'])){ echo $_POST['b_piece_count']; }else{ echo $b_piece_count; } ?>" onchange="Util.zen2han(this)"/>
							<div class="input-group-addon">ピース</div>
						</div>
						<span class="text-info"><span><?php if(isset($errors['b_piece_count'])){ echo $errors['b_piece_count']; } ?></span>※必須</span>
					</td>
				</tr>

				<tr>
					<th class="text-right">
						写真
						<button type="button" class="btn btn-info btn-sm" name="addimg-btn"><i class="glyphicon glyphicon-plus icon-white"></i> 追加</button>
					</th>
					<td id="image-block">
						<div class="text-info">※アップロードに時間がかかるため、予め解像度を落としてください。</div>
						<?php if (isset($image_keys)) { ?>
							<?php foreach ($image_keys as $image_key) { ?>
								<div class="repair-image pull-left">
									<a href="<?php echo Fuel\Core\Uri::base()?>ajax/image/<?php echo htmlspecialchars($image_key) ?>" target="_blank">
										<img src="<?php echo Fuel\Core\Uri::base()?>ajax/image/<?php echo htmlspecialchars($image_key) ?>?w=200">
									</a>
									<button type="button" class="btn btn-danger btn-sm remove-btn">
										<i class="glyphicon glyphicon-remove"></i>
									</button>
									<input type="hidden" name="image_keys[]" value="<?php echo htmlspecialchars($image_key) ?>">
								</div>
							<?php } ?>
						<?php } ?>
					</td>
				</tr>

				<tr>
					<th class="text-right">入庫予定</th>
					<td>
						<?php echo Form::input('arrival_time_date', Input::post('arrival_time_date', isset($post) ? $post->arrival_time_date : date('Y-m-d', strtotime($repairreservation->arrival_time))), array('class'=>'form-control dateform', 'size'=>'12')); ?>
						<?php
						for($i=0;$i<=23;++$i){
							if($i < 10){ $i = '0'.$i; }
							$listHours[$i] = $i;
						}
						$listMinute = array('00' => '00', '30' => '30');
						?>
						<?php echo Form::select('arrival_time_hh', Input::post('arrival_time_hh', isset($post) ? $post->arrival_time_hh : date('H', strtotime($repairreservation->arrival_time))), $listHours, array('class'=>'form-control')); ?>
						:
						<?php echo Form::select('arrival_time_mm', Input::post('arrival_time_mm', isset($post) ? $post->arrival_time_mm : date('i', strtotime($repairreservation->arrival_time))), $listMinute, array('class'=>'form-control')); ?>
						<span class="text-info">
						<span>
						<?php
							if(isset($errors['arrival_time_date'])){ echo $errors['arrival_time_date'];
							}elseif(isset($errors['arrival_time_hh'])){ echo $errors['arrival_time_hh']; }
							elseif(isset($errors['arrival_time_mm'])){ echo $errors['arrival_time_mm']; }
						?>
						</span>
						※必須
						</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">納車予定</th>
					<td>
						<?php
						$return_time_date = $repairreservation->return_time != null ? date('Y-m-d', strtotime($repairreservation->return_time)) : null;
						$return_time_hh = $repairreservation->return_time != null ? date('H', strtotime($repairreservation->return_time)) : null;
						$return_time_mm = $repairreservation->return_time != null ? date('i', strtotime($repairreservation->return_time)) : null;
						?>
						<?php echo Form::input('return_time_date', Input::post('return_time_date', isset($post) ? $post->return_time_date : $return_time_date), array('class'=>'form-control dateform', 'size'=>'12')); ?>
						<?php //echo Form::input('return_time_hh', Input::post('return_time_hh', isset($post) ? $post->return_time_hh : $return_time_hh), array('class'=>'form-control', 'size'=>'2', 'placeholder'=>'HH')); ?>
						<?php echo Form::select('return_time_hh', Input::post('return_time_hh', isset($post) ? $post->return_time_hh : $return_time_hh), $listHours, array('class'=>'form-control')); ?>
						:
						<?php //echo Form::input('return_time_mm', Input::post('return_time_mm', isset($post) ? $post->return_time_mm : $return_time_mm), array('class'=>'form-control', 'size'=>'2', 'placeholder'=>'MM')); ?>
						<?php echo Form::select('return_time_mm', Input::post('return_time_mm', isset($post) ? $post->return_time_mm : $return_time_mm), $listMinute, array('class'=>'form-control')); ?>
						<span class="text-info">
						<span>
						<?php
							if(isset($errors['return_time_date'])){ echo $errors['return_time_date'];
							}elseif(isset($errors['return_time_hh'])){ echo $errors['return_time_hh']; }
							elseif(isset($errors['return_time_mm'])){ echo $errors['return_time_mm']; }
						?>
						</span>
						</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">金額</th>
					<td>
						<div class="input-group">
							<?php echo Form::input('price', Input::post('price', isset($post) ? $post->price : $repairreservation->price), array('class'=>'form-control', 'size'=>'5', 'onchange' => 'Util.zen2han(this)')); ?>
							<div class="input-group-addon">円</div>
						</div>
						<span class="text-info"><span><?php if(isset($errors['price'])){ echo $errors['price']; }?></span>※必須</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">車番</th>
					<td>
						<?php echo Form::input('plate_no', Input::post('plate_no', isset($post) ? $post->plate_no : $repairreservation->plate_no), array('class'=>'form-control', 'size'=>'4','onchange' => 'Util.zen2han(this)')); ?>
						<span class="text-info"><span><?php if(isset($errors['plate_no'])){ echo $errors['plate_no']; }?></span>※必須</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">車両メーカー</th>
					<td>
						<?php
							$list_maker_range[''] = '';
							$list_maker_range = \Utility::move_last_to_top_array($list_maker_range);
						?>
						<?php
							$car_maker_code = Fuel\Core\Form::select('car_maker_code', Input::post('car_maker_code',isset($post) ? $post->car_maker_code : $repairreservation->car_maker_code), \Api::get_list_maker(), array('class' => 'form-control'));
							echo $car_maker_code;
						?>
						<?php //echo Form::select('car_maker_code', Input::post('car_maker_code', isset($post) ? $post->car_maker_code : $repairreservation->car_maker_code), $list_maker_range, array('class'=>'form-control'));?>
						<span class="text-info"><span><?php if(isset($errors['car_maker_code'])){ echo $errors['car_maker_code']; }?></span>※必須</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">車両モデル</th>
					<td>
						<?php
							$list_model_range[''] = '';
							$list_model_range = \Utility::move_last_to_top_array($list_model_range);
						?>
						<?php echo Form::select('car_model_code', Input::post('car_model_code', isset($post) ? $post->car_model_code : $repairreservation->car_model_code), $list_model_range, array('class'=>'form-control'));?>
						<span class="text-info"><span><?php if(isset($errors['car_model_code'])){ echo $errors['car_model_code']; }?></span><input type="checkbox" value="1" id="check_model_code" <?php if($repairreservation->car_model_code == null || $repairreservation->car_model_code == 0){ echo 'checked="checked"';}else{ echo 'disabled="disabled"';} ?> name="check_model_code">左記プルダウン以外のモデル <span><?php if(isset($errors['check_model_code'])){ echo $errors['check_model_code']; }?></span></span>
						<?php if(isset($errors['check_model_code'])){ ?>
						<script>
							document.getElementById('check_model_code').checked = false;
							document.getElementById("check_model_code").disabled= false;
						</script>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<th class="text-right">車両初度登録年月</th>
					<td>
						<?php
							$list_car_year[''] = '';
							$list_car_year = \Utility::move_last_to_top_array($list_car_year);
						?>
						<?php echo Form::select('car_year', Input::post('car_year', isset($post) ? $post->car_year : $repairreservation->car_year), $list_car_year, array('class'=>'form-control'));?>
						<?php
							$list_month = \Constants::$month;
							$list_month[''] = '';
						?>
						<?php echo Form::select('car_month', Input::post('car_month', isset($post) ? $post->car_month : $repairreservation->car_month), $list_month, array('class'=>'form-control'));?>
					</td>
				</tr>
				<tr>
					<th class="text-right">車両型式</th>
					<td>
						<?php
							$list_type_code[''] = '';
							$list_type_code = \Utility::move_last_to_top_array($list_type_code);
						?>
						<?php echo Form::select('car_type_code', Input::post('car_type_code', isset($post) ? $post->car_type_code : $repairreservation->car_type_code), $list_type_code, array('class'=>'form-control'));?>
					</td>
				</tr>
				<tr>
					<th class="text-right">車両グレード</th>
					<td>
						<?php
							$list_grade_code[''] = '';
							$list_grade_code = \Utility::move_last_to_top_array($list_grade_code);
						?>
						<?php echo Form::select('car_grade_code', Input::post('car_grade_code', isset($post) ? $post->car_grade_code : $repairreservation->car_grade_code), $list_grade_code, array('class'=>'form-control'));?>
					</td>
				</tr>
				<tr>
					<th class="text-right">車両の色</th>
					<td>
						<?php echo Form::select('car_color_code', Input::post('car_color_code', isset($post) ? $post->car_color_code : $repairreservation->car_color_code), \Constants::$car_color, array('class'=>'form-control'));?>
					</td>
				</tr>
				<tr>
					<th class="text-right">カラーナンバー</th>
					<td>
						<?php echo Form::input('color_number', Input::post('color_number', isset($post) ? $post->color_number : $repairreservation->color_number), array('class'=>'form-control', 'size'=>'12','onchange' => 'Util.zen2han(this)','maxlength'=>10)); ?>
						<span class="text-info"><span><?php if(isset($errors['color_number'])){ echo $errors['color_number']; }?></span>※半角英数のみ、10桁まで</span>
					</td>
				</tr>
				<tr>
					<th class="text-right">代車の希望</th>
					<td>
						<?php $is_car_request_list = array(''=>'','0'=>'無し','1'=>'有り'); ?>
						<?php echo Form::select('is_car_request', Input::post('is_car_request', isset($post) ? $post->is_car_request : $repairreservation->is_car_request), $is_car_request_list, array('class'=>'form-control'));?>
					</td>
				</tr>
				<tr>
					<th class="text-right">送迎の有無</th>
					<td>
						<?php $is_shuttle_request = array(''=>'','0'=>'無し','1'=>'有り'); ?>
						<?php echo Form::select('is_shuttle_request', Input::post('is_shuttle_request', isset($post) ? $post->is_shuttle_request : $repairreservation->is_shuttle_request), $is_shuttle_request, array('class'=>'form-control'));?>
					</td>
				</tr>
			</tbody></table>

		<div class="text-center">
			<button type="submit" class="btn btn-primary btn-sm" id="form-submit">
				<i class="glyphicon glyphicon-pencil icon-white"></i>
				保存
			</button>
		</div>

		<input type="file" name="imgfile" class="hide">

	</form>

	<div id="findcardform" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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

<div id="ssfinder" class="modal fade" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">SS検索</h4>
			</div>
			<div class="modal-body">
				<?php echo Form::open(array('id' => 'ssfinder-form', 'method' => 'get','class'=>'form-horizontal'));?>
					<div class="row">
						<label class="col-sm-2 control-label">支店</label>
						<div class="col-sm-3">
							<?php
								$branch = array('' => '全て');
						        foreach (\Constants::$branch as $branch_code => $branch_name)
								{
									$branch[$branch_code] = $branch_name;
								}
								echo Form::select('branch','none',
									$branch,
									array( // attributes
										'class' => 'form-control branch'
								   )
								);
							?>
						</div>
						<label class="col-sm-2 control-label">キーワード</label>
						<div class="col-sm-3">
							<input type="text" name="ssname" class="form-control ssname" placeholder="SS名・住所・SSコードなどを入力" size="50">
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-sm search-ss">
								<i class="glyphicon glyphicon-search icon-white"></i>
							</button>
						</div>
					</div>

					<div class="row container-fluid">
						<div class="list-group" id="iteams-ss">
						</div>
					</div>
				<?php echo Form::close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="hide">
	<div class="repair-image pull-left">
		<a href="" target="_blank">
			<img src="" target="_blank">
		</a>
		<button type="button" class="btn btn-danger btn-sm remove-btn">
			<i class="glyphicon glyphicon-remove"></i>
		</button>
		<input type="hidden" name="image_keys[]" value="">
	</div>
</div>

<script>
	$(function (e)
	{
		$('.dateform').datepicker();

		$('button[name=findss-btn]').on('click', function () {
			$('#ssfinder').modal();
			return false;
		});

		$('#ssfinder div.list-group a').on('click', function () {
			$('#ssfinder').modal('hide');
			return false;
		});

        $('.search-ss').on('click', function (){
			$('.please-wait').show();
            var branch = $('.branch').val();
			var ssname = $('.ssname').val();
			$.ajax({
				type: "POST",
				url : "<?php echo Uri::base(true) ?>staff/reserve/ss_search",
				dataType: 'json',
				data : {branch:branch, ssname:ssname},
				success : function(data, textStatus, request){
					$('.please-wait').hide();
					var option = ' <a href="javascript:void(0)" class="list-group-item disabled">検索結果</a>';
					for (var i = 0; i < data.length; i++) {
					    option += '<a href="javascript:void(0)" data-sscode="'+data[i]['sscode']+'" data-ssname="'+data[i]['ss_name']+'" class="list-group-item">'+data[i]['sscode']+' '+data[i]['ss_name']+'</a>';
					}
					$('.list-group-item ').remove();
					$('#iteams-ss').append(option);
				}
			});
        });

	$(document).on('click', '#iteams-ss a', function(){
		var sscode = $(this).attr('data-sscode');
		var ssname = $(this).attr('data-ssname');
		if(sscode == ''){
			return false;
		}
		$('input[name=sscode]').val(sscode);
		$('#ssfinder').modal('hide');
	});

	$('#ssfinder-form').on('submit', function()
	{
		$('.search-ss').trigger('click');
		return false;
	});
	//find_model_code();
	$( "#form_car_maker_code" ).change(function() {
		find_model_code();
	});

	function find_model_code(){
		if($( "#form_car_maker_code option:selected").val()=='0' || $( "#form_car_maker_code option:selected").val()=='')
		{
			$("#form_car_model_code").html('<option value="0"></option>');
			$("#form_car_year").html('<option value="0"></option>');
			$("#form_car_type_code").html('<option value="0"></option>');
			$("#form_car_grade_code").html('<option value="0"></option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>staff/reserve/ajax',
			{
				'car_maker_code':$( "#form_car_maker_code option:selected").val(),
				'level':'1'
			},
			function(data){
				$("#form_car_model_code").html('<option value="0"></option>'+data);
				$("#form_car_year").html('<option value="0"></option>');
				$("#form_car_type_code").html('<option value="0"></option>');
				$("#form_car_grade_code").html('<option value="0"></option>');
			}
		);
	}

	$( "#form_car_model_code" ).change(function() {
		if($("#form_car_model_code option:selected").val()== '0' || $("#form_car_model_code option:selected").val()== '')
		{
			$("#form_car_year").html('<option value="0"></option>');
			$("#form_car_type_code").html('<option value="0"></option>');
			$("#form_car_grade_code").html('<option value="0"></option>');
			document.getElementById("check_model_code").disabled = false;
			return;
		}
		document.getElementById("check_model_code").disabled = true;
		$.post('<?php echo Fuel\Core\Uri::base()?>staff/reserve/ajax',
				{
					'car_maker_code':$( "#form_car_maker_code option:selected").val(),
					'car_model_code':$( "#form_car_model_code option:selected").val(),
					'level':'2'
				},
				function(data){
					$("#form_car_year").html('<option value="0"></option>'+data);
					$("#form_car_type_code").html('<option value="0"></option>');
					$("#form_car_grade_code").html('<option value="0"></option>');
				}
			);
	});
	$( "#form_car_year" ).change(function() {
		if($( "#form_car_year option:selected").val()=='0')
		{
			$("#form_car_grade_code").html('<option value="0"></option>');
			$("#form_car_type_code").html('<option value="0"></option>');
			return ;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>staff/reserve/ajax',
				{
					'car_year':$( "#form_car_year option:selected").val(),
					'car_maker_code':$( "#form_car_maker_code option:selected").val(),
					'car_model_code':$( "#form_car_model_code option:selected").val(),
					'level':'3'
				},
				function(data){
					$("#form_car_type_code").html('<option value="0"></option>'+data);
					$("#form_car_grade_code").html('<option value="0"></option>');
				}
			);
	});
	$( "#form_car_type_code" ).change(function() {
		if($( "#form_car_type_code option:selected").val() =='' || $( "#form_car_type_code option:selected").val() =='0')
		{
			$("#form_car_grade_code").html('<option value="0"></option>');
			return;
		}
		$.post('<?php echo Fuel\Core\Uri::base()?>staff/reserve/ajax',
				{
					'car_type_code':$( "#form_car_type_code option:selected").val(),
					'car_year':$( "#form_car_year option:selected").val(),
					'car_maker_code':$( "#form_car_maker_code option:selected").val(),
					'car_model_code':$( "#form_car_model_code option:selected").val(),
					'level':'4'
				},
				function(data){
					$("#form_car_grade_code").html('<option value="0"></option>'+data);
				}
			);
	});

	$('button[name=addimg-btn]').on('click', function(e)
	{
		$('input[name=imgfile]').click();
	});

	$('input[name=imgfile]').on('change', function(e)
	{
		var loader = $('<img class="loaderimg" src="<?php echo Fuel\Core\Uri::base()?>assets/img/snake.gif">');
		$('#image-block').append(loader);

		var fd = new FormData();
		fd.append('imgfile', e.target.files[0]);
		$.ajax({
			type: 'POST',
			url: '<?php echo Fuel\Core\Uri::base()?>ajax/image/save',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response)
			{
				loader.remove();
				var json = JSON.parse(response);
				if (json.key !== undefined) {
					var clone = $('div.hide div.repair-image:first').clone();
					clone.find('img')
						.attr('src', '<?php echo Fuel\Core\Uri::base()?>ajax/image/' + json.key + '?w=200');
					clone.find('a')
						.attr('href', '<?php echo Fuel\Core\Uri::base()?>ajax/image/' + json.key);
					clone.find('input[name^=image_keys]').val(json.key);
					$('#image-block').append(clone);
				} else {
					alert(json.error);
				}
			}
		});
	});

	$('div.container table').on('click', 'button.remove-btn', function()
	{
		$(this).parents('div.repair-image:first').remove();
	});

    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('button.delete').click(function(){
		var reservation_no = $(this).attr('data-no');
		if(!confirm('削除します、よろしいですか？')){
			return false;
		}
		$.post('<?php echo Uri::base(); ?>staff/reserve/delete', {reservation_no:reservation_no}, function(result){
			var return_url = '<?php echo \Cookie::get('return_staff_url'); ?>';
			if(return_url != ''){
				location.href = return_url;
			}else{
				location.href = "<?php echo Uri::base(true) ?>staff";
			}
		});
	});

	$('#form_car_maker_code').change(function(){
		$('#check_model_code').removeAttr('disabled');
	});

	$('.btn-warning').click(function(){
		var returnUrl = '<?php echo Cookie::get('return_staff_url') ?>';
		if(returnUrl != ''){
			window.location = returnUrl;
		}else{
			window.location = '<?php echo \Uri::base(); ?>staff/list';
		}
	});
	$('input[name=arrival_time_date]').change(function(){
		var val = $(this).val();
		if($('input[name=return_time_date]').val() == ''){
			$('input[name=return_time_date]').val(val);
		}
	});
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