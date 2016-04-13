<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class ButtonGroup
 *
 * @property mixed variableWidth
 * @property mixed autoPlay
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
     * @var int
     */
    public $variableWidth = false;
    /**
     * @var bool
     */
    public $autoPlay = false;
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
            'data-auto-play' => $this->autoPlay ? 'true' : 'false',
            'data-show-number' => $this->numberToShow,
            'data-scroll-number' => $this->numberToScroll,
            'data-variable-width' => $this->variableWidth ? 'true' : 'false',
        ]);
        foreach ($this->items as $item) {
            $items .= $item;
        }
        $items .= Html::endTag('div');
        return $items;
    }
}
