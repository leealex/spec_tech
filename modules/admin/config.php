<?php

return [
    'language' => 'ru-RU',
    'components' => [
        'user' => [
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => true,
            'as afterLogin' => 'app\modules\admin\behaviors\LoginTimestampBehavior',
            'class' => 'yii\web\User'
        ],
        'log' => [
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ]
];
