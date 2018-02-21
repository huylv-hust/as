<?php echo Asset::js('util.js'); ?>
<div id="ssfinder" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">SS検索</h4>
            </div>
            <div class="modal-body">
				<?php echo Form::open(array('id' => 'ssfinder-form', 'action' => '', 'method' => 'get','class'=>'form-horizontal'));?>
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
                            <input type="text" name="ssname" class="form-control ssname" placeholder="SS名を入力" size="50">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary btn-sm search-ss">
                                <i class="glyphicon glyphicon-search icon-white"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row container-fluid">
                        <div class="list-group" id="iteams-ss">

                        </div>
                    </div>
				<input type="hidden" id="ss_id">
                <?php echo Form::close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function (e)
    {

        $('.search-ss').on('click', function (){
			$('.please-wait').show();
            var branch = $('.branch').val();
			var ssname = $('.ssname').val();
			$.ajax({
				type: "POST",
				url : "<?php echo Uri::base(true) ?>staff/report/search_ss",
				dataType: 'json',
				data : {branch:branch,ssname:ssname},
				success : function(data, textStatus, request){
					$('.please-wait').hide();
					var option = ' <a href="#" class="list-group-item disabled">検索結果</a>';
					for (var i = 0; i < data.length; i++) {
					    option += '<a href="#" onclick=setCc('+data[i]['sscode']+','+ '"'+data[i]['ss_name']+'"'+') class="list-group-item">'+data[i]['sscode']+' '+data[i]['ss_name']+'</a>';
					}
					$('.list-group-item ').remove();
					$('#iteams-ss').append(option);
				}
			});
        });

		$('#ssfinder-form').on('submit', function()
		{
			$('.search-ss').trigger('click');
			return false;
		});
    });

    function setCc(sscode,ssname){
		var id = $('#ss_id').val();
		$("#ss_"+id).val(sscode);
		$('#ssfinder').modal('hide');
	}


</script>