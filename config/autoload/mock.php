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
    'log' => [
        'Log\App' => [
            'writers' => [
                [
                    'name' => 'stream',
                    'priority' => 1000,
                    'options' => [
                        'stream' => 'data/logs/app.log'
                    ]
                ]
            ]
        ]
    ],
    'service_manager' => [
        'abstract_factories' => [
            'Zend\Log' => 'Zend\Log\LoggerAbstractServiceFactory'
        ],
        'factories' => [
            'Zend\Db\Adapter' => 'Fgsl\Mock\Db\Adapter\AdapterServiceFactory'
        ]
    ]
];
