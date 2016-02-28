Yii 2 Admin module
============================

Description...

INSTALLATION
------------

### Add the following snippet into the `app\config\web.php` before `return $config;`:

```
$config['bootstrap'][] = 'admin';
$config['modules']['admin'] = [
    'class' => 'app\modules\admin\Module'
];
```

### Add the following snippet into the `app\config\console.php` in `components` section:

```
'log' => [
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
```

### Apply migrations from `app\modules\admin\migrations` by running console command:
 
`php yii migrate --migrationPath=@app/modules/admin/migrations/`
