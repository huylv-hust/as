<div class="container">
	<h3>
		<?php $staff_info = \Session::get('staff_info'); ?>
		<?php echo $staff_info['staff_name']; ?>さん担当リペア予約リスト
	</h3>

	<p class="text-center">
		<a href="<?php echo \Uri::base().'staff/calendar'; ?>">カレンダー表示</a>
		|
		<a href="<?php echo \Uri::base().'staff/list'; ?>">リスト表示</a>
	</p>

	<form action="<?php echo \Uri::base().'staff/list/index'; ?>" method="get" class="form-inline">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<label class="control-label col-md-3">期間</label>
						<input type="text" class="form-control dateform" size="8" name="arrival_time" value="<?php if(isset($_GET['arrival_time'])){ echo $_GET['arrival_time']; } ?>">
						～
						<input type="text" class="form-control dateform" size="8" name="return_time" value="<?php if(isset($_GET['return_time'])){ echo $_GET['return_time']; } ?>">
					</div>
				</div>
				<div class="row text-center">
					<button type="submit" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-search icon-white"></i> フィルタ</button>
				</div>
			</div>
		</div>
		</form>

		<nav>
			<?php echo Pagination::instance('list-pagination'); ?>
		</nav>

		<?php if(isset($repair_reservation) && $repair_reservation != null){ ?>
		<?php
		//get list car maker
		$list_maker_range = \Api::get_list_maker();
		array_shift($list_maker_range);
		$list_maker_range_0 = current($list_maker_range);
		$list_maker_range_1 = next($list_maker_range);
		$list_maker_ranged = $list_maker_range_0 + $list_maker_range_1;
		?>
		<table class="table table-bordered table-striped">
			<tbody><tr>
					<th class="text-center">SSコード</th>
					<th class="text-center">SS名</th>
					<th class="text-center">入庫予定時刻<br>納車予定時刻</th>
					<th class="text-center">ピース数<br>金額</th>
					<th class="text-center">代車</th>
					<th class="text-center">送迎</th>
					<th class="text-center">車番</th>
					<th class="text-center">車種</th>
					<th class="text-center">管理</th>
				</tr>
				<?php foreach($repair_reservation as $items){ ?>
				<?php $car_maker = array_key_exists($items['car_maker_code'], $list_maker_ranged) ? $list_maker_ranged[$items['car_maker_code']] : ''; ?>
				<?php
				//get list car model
				$list_car_ranged = array();
				if($items['car_maker_code'])
				{
					$list_car_model = Api::get_list_model($items['car_maker_code']);
					$list_car_ranged = Utility::array_column($list_car_model, 'model', 'model_code');
				}
				$car_model_code = isset($list_car_ranged[$items['car_model_code']]) ? $list_car_ranged[$items['car_model_code']] : '';
				?>
				<tr>
					<td><?php echo $items['sscode']; ?></td>
					<td><?php echo array_key_exists($items['sscode'], $list_ss) ? $list_ss[$items['sscode']] : '○○○○○○○'; ?></td>
					<td>
						<?php echo date('Y-m-d H:i', strtotime($items['arrival_time'])); ?>
						<?php if ($items['return_time']) { ?>
						<br><?php echo date('Y-m-d H:i', strtotime($items['return_time'])); ?>
						<?php } ?>
					</td>
					<td class="text-center">
						<span class="label label-danger">A</span>
						<span class="text-warning"><?php echo $items['a_piece_count']; ?></span>
						<span class="label label-primary">B</span>
						<span class="text-warning"><?php echo $items['b_piece_count']; ?></span>
						<br><?php echo number_format($items['price']) ?>円
					</td>
					<td class="text-center">
						<?php if ($items['is_car_request']) { ?>
						<span class="label label-warning">あり</span>
						<?php } ?>
					</td>
					<td class="text-center">
						<?php if ($items['is_shuttle_request']) { ?>
						<span class="label label-warning">あり</span>
						<?php } ?>
					</td>
					<td><?php echo $items['plate_no']; ?></td>
					<td><?php echo $car_maker.'　'.$car_model_code; ?></td>
					<td>
						<div class="btn-group">
							<a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-sm btn-success">
								処理
								<span class="caret"></span>
							</a>
							<ul name="add-pulldown" class="dropdown-menu">
								<li><a href="<?php echo \Uri::base().'staff/reserve?reservation_no='.$items['reservation_no'] ?>" name="add-btn"><i class="glyphicon glyphicon-pencil"></i> 内容編集</a></li>
								<li><a href="javascript:void(0)" class="del" data-id="<?php echo $items['reservation_no']; ?>"><i class="glyphicon glyphicon-trash"></i> 削除</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody></table>

			<label class="text-info">合計ピース数</label>
			<span class="label label-danger">A</span>
			<span class="text-warning"><?php echo $total_a_piece; ?></span>

			<span class="label label-primary">B</span>
			<span class="text-warning"><?php echo $total_b_piece; ?></span>

			<span class="label label-success">全合計</span>
			<span class="text-warning"><?php echo ($total_a_piece + $total_b_piece); ?></span>

			<?php }else{ ?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					データがありません
				</div>
			<?php } ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('a.del').click(function(){
		var reservation_no = $(this).attr('data-id');
		if(!confirm('削除します、よろしいですか？')){
			return false;
		}
		$.post('<?php echo \Uri::base(); ?>staff/list/delete', {reservation_no:reservation_no} , function(result){
			if(result){
				location.reload(true);
			}
		});
	});
});

$(function (e)
{
	$('.dateform').datepicker();

	$('[name=add-btn]').on('click', function ()
	{
		location.href = 'reserve';
	});

	$('button[name=findss-btn]').on('click', function () {
		$('#ssfinder').modal();
		return false;
	});

	$('#ssfinder div.list-group a').on('click', function () {
		$('#ssfinder').modal('hide');
		return false;
	});
});
</script>