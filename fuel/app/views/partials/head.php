<?php \Fuel\Core\Config::load('apidefine');?>
<script>
	var base_url = 	"<?php echo Uri::base() ?>";
</script>
<link rel="shortcut icon" href="<?php echo Uri::base() ?>assets/img/common/favicon.ico" />
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/blitzer/jquery-ui.css" />
<?php echo Asset::css('common.css'); ?>
<?php echo Asset::css('style.css'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<?php echo Asset::js('scrolltopcontrol.js'); ?>
<?php echo Asset::js('common.js'); ?>
<?php echo Asset::js('ga.js'); ?>
<?php echo Asset::js('util.js'); ?>
<?php echo Asset::js('jquery.imagemapster.js'); ?>
<?php echo Asset::js('csv.js'); ?>
<?php echo Asset::js('jquery.autoKana.js'); ?>
<?php echo Asset::js('moment.js'); ?>
<script type="text/javascript" src="https://<?php echo Fuel\Core\Config::get('map_auth_host');?>/v1/jslib/js/map/mfjsapi"></script>
