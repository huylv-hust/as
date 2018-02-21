<div class="container">
	<h3></h3>
	<div class="panel panel-warning">
		<div class="panel-heading">
			<?php $staff_info = \Session::get('staff_info'); ?>
			本日の<?php echo $staff_info['staff_name']; ?>さん担当リペア予約
		</div>
		<div class="panel-body">
			<p id="calendar"></p>
		</div>
	</div>
</div>
<style type="text/css">
	.fc-event-container a{border-color: rgb(0, 80, 203); background-color: rgb(0, 80, 203);}
</style>
<script>
    $(function (e)
    {
        var calendar = $('#calendar').fullCalendar({
            theme: true,
            header: {
                left: '',
                center: 'title',
                right: ''
            },
            allDaySlot: false,
            axisFormat: 'HH:mm',
            timeFormat: 'HH:mm',
            minTime: '00:00:00',
            maxTime: '24:00:00',
            scrollTime: '08:00:00',
            selectable: true,
            editable: false,
            eventClick: function (event, jsEvent, view) {
				location.href = '<?php echo Uri::base(true) ?>staff/reserve?reservation_no='+event.reservation_no;
            },
            lang: 'ja',
			
        });
        calendar.fullCalendar('changeView', 'agendaDay');
		getEvent();
    });
	function getEvent(){
		var myCalendar = $('#calendar');
            myCalendar.fullCalendar();
            $.ajax({
                type: "POST",
                url: "<?php echo Uri::base(true) ?>staff/default/get_repair_reservation",
				data: 'repair_staff_id='+<?php echo $repair_staff_id; ?>,
                dataType: 'json',
                success: function (data) {
                    $(data).each(function (index) {
                        myCalendar.fullCalendar('renderEvent', data[index] , true );
                    });

                }
        });
	}
</script>