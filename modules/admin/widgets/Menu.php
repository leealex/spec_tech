<?php

namespace app\modules\admin\widgets;

use app\modules\admin\models\WidgetMenu;
use app\modules\admin\models\WidgetMenuItem;
use Yii;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;

/**
 * Menu widget renders a menu
 *
 * @author Alexey Lee <alex@plumy.ru>
 */
class Menu extends Widget
{
    /**
     * @var string The key of the menu
     */
    public $key;
    /**
     * @var array
     */
    private $menuItems;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->buildItems();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'items' => $this->menuItems,
        ]);
    }

    /**
     * Prepares the array of items for the Nav widget
     */
    private function buildItems()
    {
        $menu = WidgetMenu::findOne(['key' => $this->key]);
        foreach ($menu->items as $item) {
            if ($item->children) {
                $children = [];
                foreach ($item->children as $child) {
                    $children[] = ['label' => $child->title, 'url' => $child->url, 'linkOptions' => $child->optionsArray];
                }
                $this->menuItems[] = ['label' => $item->title, 'items' => $children];
            } else {
                $this->menuItems[] = ['label' => $item->title, 'url' => $item->url, 'linkOptions' => $item->optionsArray];
            }
        }
    }
}
