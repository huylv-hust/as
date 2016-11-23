<style type="text/css">
	.text-info span{color: #F00}
</style>
<div class="container">
	<h3>
		アカウント情報
	</h3>
	<?php if(isset($status) && $status == true){ ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$('input[name=current_password]').val('');
		$('input[name=password]').val('');
		$('input[name=re-password]').val('');
	});
	</script>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		保存しました
	</div>
	<?php } ?>
	<?php $default = array('current_password' => '', 'password' => ''); ?>
	<div class="panel panel-primary">
		<div class="panel-heading">
			パスワード
		</div>
		<div class="panel-body">
			<?php echo Form::open(array('method' => 'post', 'class' => 'form-inline')); ?>
				<table class="table table-striped">
					<tbody><tr>
							<th class="text-right">現在のパスワード</th>
							<td>
								<?php echo Form::input('current_password', Input::post('current_password', isset($post) ? $post->current_password : $default['current_password']), array('class' => 'form-control','size'=>'30')); ?>
								<span class="text-info"><span><?php if(isset($errors['current_password'])){ echo $errors['current_password']; } ?></span>※必須</span>
							</td>
						</tr>
						<tr>
							<th class="text-right">新しいパスワード</th>
							<td>
								<?php echo Form::input('password', Input::post('password', isset($post) ? $post->password : ''), array('class' => 'form-control','size'=>'30')); ?>
								<span class="text-info"><span><?php if(isset($errors['password'])){ echo $errors['password']; } ?></span>※必須</span>
							</td>
						</tr>
						<tr>
							<th class="text-right">新しいパスワード(確認)</th>
							<td>
								<?php echo Form::input('re-password', Input::post('re-password', isset($post) ? $post->re-password : ''), array('class' => 'form-control','size'=>'30')); ?>
								<span class="text-info"><span><?php if(isset($errors['re-password'])){ echo $errors['re-password']; } ?></span>※必須</span>
							</td>
						</tr>
					</tbody></table>

				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="glyphicon glyphicon-pencil icon-white"></i>
						保存
					</button>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>

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