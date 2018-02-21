<style>
	.fc-time{ display: none;}
</style>
<?php
	if(\Fuel\Core\Input::get('redirect') != '1')
	{
		Fuel\Core\Cookie::delete('staff_calendar_url_redirect');
	}
?>
<div class="container">
	<h3>
		<?php $staff_info = \Session::get('staff_info'); ?>
		<?php echo $staff_info['staff_name']; ?>さん担当リペア予約状況
	</h3>

	<p class="text-info">※本画面にて予約の新規登録はできません</p>

	<p class="text-center">
		<a href="<?php echo \Uri::base(); ?>staff/calendar">カレンダー表示</a>
		|
		<a href="<?php echo \Uri::base(); ?>staff/list">リスト表示</a>
	</p>

	<p id="calendar"></p>

</div>

<div id="ssfinder" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">SS検索</h4>
			</div>
			<div class="modal-body">
				<form mehod="get" class="form-horizontal">
					<div class="row">
						<label class="col-sm-2 control-label">支店</label>
						<div class="col-sm-3">
							<select class="form-control">
								<option value="">東日本宇佐美　北海道支店</option>
								<option value="">東日本宇佐美　東北支店</option>
								<option value="">東日本宇佐美　上信越支店</option>
								<option value="">東日本宇佐美　東京販売支店</option>
								<option value="">東日本宇佐美　神奈川販売支店</option>
								<option value="">東日本宇佐美　埼玉栃木販売支店</option>
								<option value="">東日本宇佐美　千葉茨城販売支店</option>
								<option value="">西日本宇佐美　東海支店</option>
								<option value="">西日本宇佐美　中部支店</option>
								<option value="">西日本宇佐美　北陸支店</option>
								<option value="">西日本宇佐美　関西支店</option>
								<option value="">西日本宇佐美　山陽支店</option>
								<option value="">西日本宇佐美　九州支店</option>
								<option value="">ダイツー</option>
							</select>
						</div>
						<label class="col-sm-2 control-label">キーワード</label>
						<div class="col-sm-3">
							<input type="email" class="form-control" placeholder="SS名・住所・SSコードなどを入力" size="50">
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-sm">
								<i class="glyphicon glyphicon-search icon-white"></i>
							</button>
						</div>
					</div>

					<div class="row container-fluid">
						<div class="list-group">
							<a href="#" class="list-group-item disabled">
								検索結果
							</a>
							<a href="#" class="list-group-item">243711 ２２号名岐西春</a>
							<a href="#" class="list-group-item">265064 ２３号名四港</a>
							<a href="#" class="list-group-item">267669 南陽町</a>
							<a href="#" class="list-group-item">275623 山王</a>
							<a href="#" class="list-group-item">277079 名古屋インター</a>
							<a href="#" class="list-group-item">277300 星崎インター</a>
							<a href="#" class="list-group-item">280975 ２２号名岐新西春</a>
							<a href="#" class="list-group-item">295709 知多産業道路大高</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function (e)
{
	var pleaseWait = function()
	{
		$('.please-wait').show();
		setTimeout(function()
		{
			$('.please-wait').hide();
		}, 4500);
	};

	var calendar = $('#calendar').fullCalendar({
		theme: true,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaDay'
		},
		dayClick: function(date, jsEvent, view)
		{
			if (view.name == 'month') {
				calendar.fullCalendar('gotoDate', date);
				calendar.fullCalendar('changeView', 'agendaDay');
			} else if (view.name == 'agendaDay') {
				location.href = '<?php echo Uri::base(true) ?>staff/reserve?reservation_no='+calEvent.reservation_no;
			}
		},
		viewRender:function (view, element) {
			var b = $('#calendar').fullCalendar('getDate');
			Util.setCookieRedirect('<?php echo Uri::base(true) ?>',b.format('L'),'staff_calendar');
		},
		eventClick: function(calEvent, jsEvent, view)
		{
			pleaseWait();
			location.href = '<?php echo Uri::base(true) ?>staff/reserve?reservation_no='+calEvent.reservation_no;
		},
		allDaySlot: false,
		axisFormat: 'HH:mm',
		timeFormat: 'HH:mm',
		minTime: '00:00:00',
		maxTime: '24:00:00',
		eventLimit:  true,
		editable : false,
		scrollTime: '08:00:00',
		defaultDate: moment('<?php if( \Fuel\Core\Cookie::get('staff_calendar_url_redirect') !='') echo \Fuel\Core\Cookie::get('staff_calendar_url_redirect'); else echo date('Y-m')  ?>'),
		lang: 'ja'
	});

	$('button[name=findss-btn]').on('click', function () {
		$('#ssfinder').modal();
		return false;
	});

	$('#ssfinder div.list-group a').on('click', function () {
		$('#ssfinder').modal('hide');
		return false;
	});

	getEvents();
});

function getEvents(){
	var myCalendar = $('#calendar');
		myCalendar.fullCalendar();
		$.ajax({
			type: "POST",
			url: "<?php echo Uri::base(true); ?>staff/calendar/get_reservation",
			data: "repair_staff_id="+<?php echo $repair_staff_id; ?>,
			dataType: 'json',
			success: function (data) {
				$(data).each(function (index) {
					myCalendar.fullCalendar('renderEvent', data[index] , true );
				});

			}
	});
}
</script>