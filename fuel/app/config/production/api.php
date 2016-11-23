<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 04/06/2015
 */

$_API_URL_USAPPY = 'https://usappy.jp/api/';
$_API_URL_UPS = 'https://usami-p.com/api/';

return  array(
	'ss'     => array(
		'url_ss' => $_API_URL_USAPPY.'ss',
	),
	'car'    => array(
		'url_car' => $_API_URL_USAPPY.'car',
	),
	'member' => array(
		'url_login'	        => 'https://usappy.jp/login',
		'url_login_api'     => 'https://usappy.jp/api/login',
		'url_card'          => $_API_URL_UPS.'getcardno',
		'url_member'        => $_API_URL_UPS.'getmemberbasic',
		'url_member_list'   => $_API_URL_UPS.'getmembers',
		'url_update_member' => $_API_URL_UPS.'updmemberbasic',
	),
	'secret' => 'CJCHG2SEFN',
);
