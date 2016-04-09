<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "graph_item".
 *
 * @property integer $id
 * @property integer $number
 * @property string $text
 * @property string $color
 * @property integer $width
 */
class GraphItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'graph_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'text', 'color', 'width'], 'required'],
            [['width'], 'integer'],
            [['number'], 'string', 'max' => 10],
            [['text'], 'string', 'max' => 300],
            [['color'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Число'),
            'text' => Yii::t('app', 'Описание'),
            'color' => Yii::t('app', 'Цвет'),
            'width' => Yii::t('app', 'Толщина'),
        ];
    }

    /**
     * Renders graph items for the carousel
     *
     * @return array
     */
    public static function renderItems()
    {
        $items = self::find()->all();
        $itemsHtml = [];
        $counter = 1;
        $row = '';
        foreach ($items as $index => $item) {
            $options['class'] = 'circle';
            $number = str_replace(' ', '', $item->number);
            if (substr($number, -1) === '%') {
                $options['data-percent'] = (int)$number;
            } else {
                $options['data-number'] = (int)$number;
                $options['data-percent'] = 100;
            }
            if ($item->color) {
                $options['data-color'] = $item->color;
            }
            if ($item->width) {
                $options['data-width'] = $item->width;
            }
            $text = Html::tag('span', $item->text);
            $itemHtml = Html::tag('div', '', $options);
            if ($counter == 3) {
                $row .= Html::tag('div', $itemHtml . $text, ['class' => 'circle-graph']);
                $itemsHtml[]['content'] = $row;
                $row = '';
                $counter = 1;
            } else {
                $row .= Html::tag('div', $itemHtml . $text, ['class' => 'circle-graph']);
                $counter++;
            }
        }
        return $itemsHtml;
    }
}
