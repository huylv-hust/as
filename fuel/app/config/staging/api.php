<?php
/**
 * @author NamDD <namdd6566@seta-asia.com.vn>
 * @date 04/06/2015
 */

$_API_URL_USAPPY = 'https://st.usappy.jp/api/';
$_API_URL_UPS = 'http://verify-ups.com/api/';

return  array(
	'ss'     => array(
		'url_ss' => $_API_URL_USAPPY.'ss',
	),
	'car'    => array(
		'url_car' => $_API_URL_USAPPY.'car',
	),
	'member' => array(
		'url_login'	        => 'https://st.usappy.jp/login',
		'url_login_api'     => 'https://st.usappy.jp/api/login',
		'url_card'          => $_API_URL_UPS.'getcardno',
		'url_member'        => $_API_URL_UPS.'getmemberbasic',
		'url_member_list'   => $_API_URL_UPS.'getmembers',
		'url_update_member' => $_API_URL_UPS.'updmemberbasic',
	),
	'secret' => 'sec',
);
