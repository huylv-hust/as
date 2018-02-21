<div class="container">
	<h3></h3>

	<div class="panel panel-primary">
		<div class="panel-heading">
			ログイン
		</div>
		<div class="panel-body">
			<?php 
				$status = $error ? 'block' : 'none';
			?>
			<div id="controller" style="display:<?php echo $status; ?>">
			<div class="alert alert-danger alert-dismissible" id="show-err" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<?php echo $error; ?>
			</div>
			</div>
			<?php echo Form::open(array('method' => 'post', 'class' => 'form-horizontal')); ?>
				<div class="form-group">
					<label class="col-sm-4 control-label">ログインID</label>
					<div class="col-sm-6">
						<?php echo Form::input('login_id', Input::post('login_id', isset($post) ? $post->login_id : ''), array('class' => 'form-control','placeholder'=>'ログインID')); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">パスワード</label>
					<div class="col-sm-6">
						<?php echo Form::input('password', '', array('type'=>'password','class' => 'form-control','placeholder'=>'パスワード')); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-10">
						<button type="submit" class="btn btn-primary btn-sm">ログイン</button>
					</div>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('button[type=submit]').click(function(){
			var login_id = $('input[name=login_id]');
			var password = $('input[name=password]');
			var error = $('#controller');
			if(login_id.val() == '' && password.val() == ''){
				$('#show-err').html('ログインIDとパスワードを入力してください');
				error.show();
				return false;
			}
			if(login_id.val() == ''){
				$('#show-err').html('ログインIDを入力してください');
				error.show();
				return false;
			}
			if(password.val() == ''){
				$('#show-err').html('パスワードを入力してください');
				error.show();
				return false;
			}
			return true;
		});
	});
</script>