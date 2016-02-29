<?php

return [
    'language' => 'ru-RU',
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/dashboard/login'],
            'as afterLogin' => 'app\modules\admin\behaviors\LoginTimestampBehavior',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'aliases' => [
        '@admin' => '@app/modules/admin',
    ],
    'as globalAccess' => [
        'class' => '\app\modules\admin\behaviors\AccessBehavior',
        'rules' => [
            [
                'controllers' => ['site'],
                'allow' => true
            ],
            [
                'controllers' => ['admin/dashboard'],
                'actions' => ['login'],
                'allow' => true,
            ],
            [
                'allow' => true,
                'roles' => ['administrator', 'manager'],
            ]
        ]
    ]
];
