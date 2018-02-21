<div class="container">
	<h3>
		リペア実績
		<button type="button" class="btn btn-info btn-sm" name="add-btn"><i class="glyphicon glyphicon-plus icon-white"></i> 新規追加</button>
	</h3>

	<?php echo Form::open(array('method' => 'get', 'class' => 'form-inline')); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<label class="control-label">作業日</label>
						<?php echo Form::select('year', $set_year, $list_year, array('class'=>'form-control', 'onchange'=>'changeMonthYear()'));?>
						年
						<?php echo Form::select('month', $set_month, $list_month, array('class'=>'form-control', 'onchange'=>'changeMonthYear()'));?>
						月
					</div>
					<div class="col-md-4">
						<label class="control-label">月間目標</label>
						<span class="text-success"><?php echo $staff_plan; ?>P</span>
					</div>
					<div class="col-md-4">
						<label class="control-label">売上見込</label>
						<?php $total_price = $total_price_report + $total_price_remain; ?>
						<span class="text-success"><?php echo number_format($total_price); ?>円</span>
					</div>
				</div>
			</div>
		</div>

		<?php if(isset($repair_report) && $repair_report != null){ ?>
		<table class="table table-bordered table-striped">
			<tbody><tr>
					<th class="text-center">作業日</th>
					<th class="text-center">出勤区分</th>
					<th class="text-center">勤務地</th>
					<th class="text-center">出勤時間</th>
					<th class="text-center">予約P</th>
					<th class="text-center">金額(税込)</th>
					<th class="text-center">予約率</th>
					<th class="text-center">管理</th>
				</tr>
				<?php foreach ($repair_report as $items){ ?>
				<tr>
					<td><?php echo $items['repair_date'].'('.\Constants::$day_of_week[date('N', strtotime($items['repair_date']))]; ?>)</td>
					<td class="text-center">
					<?php
					$work_code = Constants::$work_code;
					echo array_key_exists($items['work_code'], $work_code) ? $work_code[$items['work_code']] : '';
					?>
					</td>
					<td>
						<?php echo array_key_exists($items['sscode1'], $list_ss) ? $list_ss[$items['sscode1']] : ''; ?>　
							<?php echo array_key_exists($items['sscode2'], $list_ss) ? $list_ss[$items['sscode2']] : ''; ?>
					</td>
					<td><?php echo \Utility::string_to_time($items['start_time']); ?>～<?php echo \Utility::string_to_time($items['end_time']); ?></td>
					<td class="text-right"><?php if($items['total_piece'] != null){ echo $items['total_piece'].'P'; }else{ echo '0P'; } ?></td>
					<td class="text-right"><?php echo number_format($items['price']); ?>円</td>
					<td class="text-right">
					<?php
					if($staff_plan == 0){
						echo '-';
					}else{
						$percen = ($items['total_piece_to']*100)/$staff_plan;
						echo round($percen, 1).'%';
						//echo abs(number_format($percen, 2, '.', '')).'%';
					}
					?>
					</td>
					<td>
						<div class="btn-group">
							<a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-sm btn-success" aria-expanded="false">
								処理
								<span class="caret"></span>
							</a>
							<ul name="add-pulldown" class="dropdown-menu">
								<li><a href="<?php echo \Uri::base().'staff/report?repair_date='.$items['repair_date']; ?>" name="edit-btn"><i class="glyphicon glyphicon-pencil"></i> 内容編集</a></li>
								<li><a class="del" href="<?php echo \Uri::base().'staff/reports/delete?repair_date='.$items['repair_date']; ?>"><i class="glyphicon glyphicon-trash"></i> 削除</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody></table>
			<?php } else { ?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					該当するデータがありません
				</div>
			<?php } ?>
	<?php echo Form::close(); ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('button[name=add-btn]').click(function(){
		window.location = '<?php echo \Uri::base(); ?>staff/report';
	});
	$('a.del').click(function(){
		if(!confirm('削除します、よろしいですか？')){
			return false;
		}
	});
});

function changeMonthYear(){
	var flag = '<?php echo \Input::get('flag'); ?>';
	if(flag == 'false'){ flag = 'true'; }else{ flag = 'false'; }
	window.location = '<?php echo \Uri::base(); ?>staff/reports?flag='+flag;
}
</script>