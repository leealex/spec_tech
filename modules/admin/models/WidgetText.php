<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "widget_text".
 *
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property string $body
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class WidgetText extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'body'], 'required'],
            [['body'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['key', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
