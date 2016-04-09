<?php

return [
    'as globalAccess' => [
        'class' => '\app\modules\admin\behaviors\AccessBehavior',
        'rules' => [
            [
                'controllers' => ['admin/dashboard'],
                'actions' => ['login'],
                'roles' => ['?'],
                'allow' => true,
            ],
            [
                'roles' => ['administrator', 'manager'],
                'allow' => true
            ],
        ]
    ]
];
