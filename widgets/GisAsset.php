<?php

namespace app\widgets;

use yii\web\View;
use yii\web\AssetBundle;

class GisAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/yandex';
    public $css = [
        'style.css'
    ];
    public $js = [
        'http://maps.api.2gis.ru/2.0/loader.js',
        'map.js'
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
} 