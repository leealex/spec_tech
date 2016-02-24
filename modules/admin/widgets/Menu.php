<?php

namespace app\modules\admin\widgets;
use app\modules\admin\models\WidgetMenu;
use yii\bootstrap\Html;
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
     * @var array HTML options of the <UL> tag
     */
    public $menuOptions = [];
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

        $menu = WidgetMenu::findOne(['key' => $this->key]);

        $this->menuItems = $menu->items;
        if (empty($this->menuOptions)) {
            $this->menuOptions = ['class' => 'nav nav-pills'];
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        $html = Html::beginTag('ul', $this->menuOptions);
        foreach ($this->menuItems as $item) {
            if (!$item->status) continue;
            $options = [];
            if ($item->options) {
                $options = json_decode($item->options);
                $options = ArrayHelper::toArray($options);
            }
            $button = Html::a($item->title, $item->url, $options);
            $html .= Html::tag('li', $button);
        }
        $html .= Html::endTag('ul');
        return $html;
    }
}
