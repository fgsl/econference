<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'db' => [
    		'driver' => 'Mysqli',
    		'database' => 'econference',
    		],
	'service_manager' => [	
		'factories' => [
				'Zend\Db\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
				'Zend\Log' => 'Zend\Log\LoggerServiceFactory'
				]
	],
	'log' => [
			'Log\App' => [
					'writers' => [
							[
									'name' => 'stream',
									'priority' => 1000,
									'options' => [
											'stream' => 'data/logs/app.log',
									],
							],
					],
			],
	],			
];
