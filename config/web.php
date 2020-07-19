<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'ZUVycbpQJp2MOxGLaYQ6QkA3PqzChHjN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'production' => 'site/production',
                'contacts' => 'site/contacts',
                'testimonials' => 'site/testimonials',
                'page/<slug:[a-z-0-9]+>' => 'page/view',
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
            ]
        ],
        'db' => require(__DIR__ . '/db.php'),
        'assetManager' => [
            'appendTimestamp' => true,
        ],
    ],
    'params' => $params,
];

$config['bootstrap'][] = 'admin';
$config['modules']['admin'] = [
    'class' => 'app\modules\admin\Module'
];

return $config;
