<style type="text/css">
span.red{color: red}
</style>
<div class="container">
	<form method="post" class="form-inline">
		<h3>
			リペア目標
			<?php $list_year = array(date('Y') => date('Y'), date('Y') + 1 => date('Y') + 1);?>
			<?php echo Form::select('year', Input::post('year', isset($post) ? $post->year : $active_year), $list_year, array('class'=>'form-control'));?>
			年
		</h3>

		<?php if(isset($status) && $status == true){ ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			保存しました
		</div>
		<?php } ?>
		<table class="table table-striped">
			<tbody>
			<?php for($i=1;$i<=12;$i++){ ?>
				<tr>
					<th class="text-right"><?php echo $i; ?>月</th>
					<td>
						<input type="text" name="month[<?php echo $i; ?>]" data-id="<?php echo $i; ?>" class="form-control" size="10" onchange="Util.zen2han(this)" value="<?php if(isset($_POST['month'][$i])){ echo $_POST['month'][$i]; }elseif(isset($repair_staff_plan[$i])){ echo $repair_staff_plan[$i]; } ?>" />
						P<span class="red hide<?php echo $i; ?> error<?php echo $i; ?>"><?php if(isset($error[$i])){ echo $error[$i]; } ?></span>
					</td>
				</tr>
			<?php } ?>
			</tbody></table>

		<div class="text-center">
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="glyphicon glyphicon-pencil icon-white"></i>
				保存
			</button>
		</div>

	</form>

</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#form_year').change(function(){
		var year = $(this).val();
		window.location = '<?php echo \Uri::base(); ?>staff/plan?year='+year;
	});
	$('table input').focus(function(){
		var id = $(this).attr('data-id');
		$('.hide'+id).html('');
	});
});
</script>