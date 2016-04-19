<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class Gis
 *
 * @author Alexey Lee <alex@plumy.ru>
 * @since 1.0
 */
class Gis extends Widget
{
    public $zoom = 16;
    public $text = '';
    public $address = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->registerAssets();
    }

    /**
     * Registers all necessary assets
     */
    public function registerAssets()
    {
        $widget = new Widget();
        $view = $widget->getView();
        GisAsset::register($view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return Html::tag('div', '', [
            'id' => 'gis-map',
            'data-zoom' => $this->zoom,
            'data-address' => $this->address,
            'data-text' => $this->text,
        ]);
    }
}
