<?php

namespace app\widgets;

use yii\web\View;
use yii\web\AssetBundle;

class SlickAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/slick';
    public $css = [
        'slick.css',
    ];
    public $js = [
        'slick.min.js',
        'slick.js'
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