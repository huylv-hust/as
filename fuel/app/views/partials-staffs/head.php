<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/cupertino/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css">
<link rel="stylesheet" media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css">
<?php echo Asset::forge('staffs-css', array('paths' => array('assets/staffs/')))->css(array('layout.css')); ?>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?php echo Asset::js('moment.js'); ?>
<?php echo Asset::forge('staffs-js', array('paths' => array('assets/staffs/')))->js(array('datepicker.ja.js')); ?>
<?php echo Asset::js('util.js'); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/lang-all.js"></script>
<style>
	td.ui-widget-content {
		background-color: #ffffff !important;
	}
</style>
<?php echo Asset::js('jquery.imagemapster.js'); ?>