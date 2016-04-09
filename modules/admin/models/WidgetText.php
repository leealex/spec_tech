<?php

namespace app\modules\admin\models;

use app\modules\admin\Module;
use Yii;
use yii\behaviors\TimestampBehavior;

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
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
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
            [['key', 'title'], 'string', 'max' => 255],
            ['key', 'match', 'pattern' => '/^[0-9a-zA-Z_-]+$/', 'message' => 'Допускаются только буквы латинского алфавита, тире и нижнее подчеркивание'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('app', 'ID'),
            'key' => Module::t('app', 'Key'),
            'title' => Module::t('app', 'Title'),
            'body' => Module::t('app', 'Body'),
            'status' => Module::t('app', 'Status'),
            'created_at' => Module::t('app', 'Created At'),
            'updated_at' => Module::t('app', 'Updated At'),
        ];
    }
}
