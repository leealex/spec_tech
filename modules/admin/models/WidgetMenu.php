<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "widget_menu".
 *
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property integer $status
 *
 * @property WidgetMenuItem[] $items
 */
class WidgetMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title'], 'required'],
            [['status'], 'integer'],
            [['key'], 'string', 'max' => 32],
            [['title'], 'string', 'max' => 255]
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
            'status' => 'Активно',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(WidgetMenuItem::className(), ['parent_id' => 'id']);
    }
}
