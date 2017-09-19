<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=testyii',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'RedisCache'=> [
            'class' => 'yii\redis\Cache',
            'redis'=>[
                'hostname' => '',
                'port' => '',
                'database' => '',
            ]
        ],
        'Mcache' => [
            'class' => 'yii\caching\MemCache',
            'servers' => [
                [
                    'host' => 'server1',
                    'port' => 11211,
                    'weight' => 60,
                ],
                [
                    'host' => 'server2',
                    'port' => 11211,
                    'weight' => 40,
                ],
            ],
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
