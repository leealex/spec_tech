<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class ButtonGroup
 *
 * @author Alexey Lee <alex@plumy.ru>
 * @since 1.0
 */
class Slick extends Widget
{
    /**
     * @var int
     */
    public $numberToShow = 1;
    /**
     * @var int
     */
    public $numberToScroll = 1;
    /**
     * @var array The array of items each wrapped in DIV
     */
    public $items = [];

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
        SlickAsset::register($view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $items = Html::beginTag('div', [
            'class' => 'slick-slider',
            'data-show-number' => $this->numberToShow,
            'data-scroll-number' => $this->numberToScroll,
        ]);
        foreach ($this->items as $item) {
            $items .= $item;
        }
        $items .= Html::endTag('div');
        return $items;
    }
}
