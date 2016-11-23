<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=asdb01;dbname=usappyas',
			'username'   => 'www',
			'password'   => 'Saetb3MQas',
		),
	),
	'redis' => array(
		'default' => array(
			'hostname' => 'localhost',
			'port'     => 6379
		)
	),
);
