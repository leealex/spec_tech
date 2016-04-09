<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "widget_menu_item".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property integer $parent_id
 * @property string $key
 * @property string $title
 * @property string $url
 * @property string $options
 * @property integer $status
 *
 * @property WidgetMenu $parent
 * @property WidgetMenuItem[] $children
 * @property array $optionsArray
 */
class WidgetMenuItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'parent_id', 'status'], 'integer'],
            [['key'], 'string', 'max' => 32],
            [['title', 'url'], 'string', 'max' => 255],
            ['parent_id', 'compare',
                'compareAttribute' => 'parent_id',
                'compareValue' => $this->id,
                'operator' => '!=',
                'message' => 'Элемент не может быть сам себе родителем.',
                'when' => function ($model) {
                    return $model->id;
                }
            ],
            ['options', 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'menu_id',
            'parent_id' => 'Родитель',
            'key' => 'Код',
            'title' => 'Название',
            'url' => 'Ссылка',
            'options' => 'Опции',
            'status' => 'Активно',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(WidgetMenu::className(), ['id' => 'menu_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(WidgetMenu::className(), ['id' => 'parent_id']);
    }

    /**
     * @return static[]
     */
    public function getChildren()
    {
        return $this->findAll(['parent_id' => $this->id]);
    }

    /**
     * @param integer $id
     * @return array
     */
    public static function parents($id)
    {
        $parents = self::find(['menu_id' => $id, 'parent_id' => 0])->asArray()->all();
        $parents = ArrayHelper::map($parents, 'id', 'title');
        $parents[0] = 'Нет';
        ksort($parents);
        return $parents;
    }

    /**
     * @return array
     */
    public function getOptionsArray()
    {
        return $this->options ? (array)json_decode($this->options) : [];
    }
}
