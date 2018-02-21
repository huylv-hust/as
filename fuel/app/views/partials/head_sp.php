<?php \Fuel\Core\Config::load('apidefine');?>
<script>
var base_url = 	"<?php echo Uri::base() ?>";
</script>
<meta name="viewport" content="width=320,user-scalable=0,initial-scale=1.0,maximum-scale=1.0;" />
<meta name="format-detection" content = "telephone=no">
<meta charset="UTF-8">
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="description" content="Usappy オートサービス　お客様のカーライフをサポート。車検・オイル交換・タイヤ交換など、WEBで簡単予約！" />
<meta name="keywords" content="宇佐美,給油,SS,車検,オイル交換,コーティング,ボディリペア,タイヤ交換" />
<link rel="shortcut icon" href="<?php  echo Uri::base() ?>assets/img/common/favicon.ico" />
<?php echo Asset::css('common_sp.css');?>
<?php echo Asset::css('style_sp.css');?>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/blitzer/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<?php echo Asset::js('common_sp.js'); ?>
<?php echo Asset::js('ga_sp.js'); ?>
<?php echo Asset::js('util_sp.js'); ?>
<?php echo Asset::js('moment.js'); ?>
<?php echo Asset::js('csv.js'); ?>
<script type="text/javascript" src="https://<?php echo Fuel\Core\Config::get('map_auth_host');?>/v1/jslib/js/map/mfjsapi"></script>


