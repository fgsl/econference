<?php
return array(
    'db' => array(
        'host' => 'localhost',
        'driver' => 'Pdo_Mysql',
        'database' => 'econference',
        'user' => 'root',
        'password' => 'mysql',
    ),
    'log' => array(
        'Log\\App' => array(
            'writers' => array(
                0 => array(
                    'name' => 'stream',
                    'priority' => 1000,
                    'options' => array(
                        'stream' => 'data/logs/app.log',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\\Log' => 'Zend\\Log\\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'Zend\\Db\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
            'MvcTranslator' => 'Zend\\Mvc\\I18n\\TranslatorFactory',
        ),
    ),
);
