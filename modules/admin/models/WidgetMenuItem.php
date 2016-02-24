<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "widget_menu_item".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $key
 * @property string $title
 * @property string $url
 * @property string $options
 * @property integer $status
 *
 * @property WidgetMenu $parent
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
            [['parent_id', 'status'], 'integer'],
            [['key'], 'string', 'max' => 32],
            [['title', 'url'], 'string', 'max' => 255],
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
    public function getParent()
    {
        return $this->hasOne(WidgetMenu::className(), ['id' => 'parent_id']);
    }
}
