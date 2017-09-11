<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
            'class' => 'yii\web\View',
            'defaultExtension' => 'tpl',
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    'cachePath' => '@runtime/Smarty/cache',
                    'compilePath' => '@runtime/Smarty/compile'
                ],
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => [
                        'html' => ['class' => '\yii\helpers\Html'],
                    ],
                    'uses' => ['yii\bootstrap'],
                ],
            ],
            'theme' => [
                'class' => 'yii\base\Theme',
                'pathMap' => [
                    '@app/views' => [
                        '@app/themes/basic',
                        '@app/themes/spring',
                    ]
                ],
                'basePath' => '@web/themes/basic',
                'baseUrl' => '@web/themes/basic',
            ]

        ],
//        'redis' => [
//            'class' => 'yii\redis\Connection',
//            'hostname' => 'localhost',
//            'port' => 6379,
//            'database' => 0,
//        ],
//        'elasticsearch' => [
//            'class' => 'yii\elasticsearch\Connection',
//            'nodes' => [
//                ['http_address' => '127.0.0.1:9200'],
//                // configure more hosts if you have a cluster
//            ],
//        ],
//        'mongodb' => [
//            'class' => '\yii\mongodb\Connection',
//            'dsn' => 'mongodb://developer:password@localhost:27017/mydatabase',
//        ],
//        'sphinx' => [
//            'class' => 'yii\sphinx\Connection',
//            'dsn' => 'mysql:host=127.0.0.1;port=9306;',
//            'username' => '',
//            'password' => '',
//        ],
    ],
];
