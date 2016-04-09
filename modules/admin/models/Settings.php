<?php

namespace app\modules\admin\models;

use app\modules\admin\Module;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "settings".
 *
 * @property string $key
 * @property string $value
 * @property string $comment
 * @property integer $editable
 * @property integer $updated_at
 * @property integer $created_at
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['value', 'comment'], 'string'],
            [['editable', 'updated_at', 'created_at'], 'integer'],
            [['key'], 'string', 'max' => 128],
            ['key', 'match', 'pattern' => '/^[0-9a-zA-Z_-]+$/', 'message' => 'Допускаются только буквы латинского алфавита, тире и нижнее подчеркивание'],
            [['key'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Module::t('app', 'Key'),
            'value' => Module::t('app', 'Value'),
            'comment' => Module::t('app', 'Comment'),
            'editable' => Module::t('app', 'Editable'),
            'updated_at' => Module::t('app', 'Updated At'),
            'created_at' => Module::t('app', 'Created At'),
        ];
    }

    /**
     * @param $key
     * @return null|static
     */
    public static function getOne($key)
    {
        return self::findOne($key);
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        $settings = self::find()->asArray()->all();
        return ArrayHelper::map($settings, 'key', 'value');
    }

    /**
     * @param $key
     * @return string
     */
    public static function getValue($key)
    {
        if (self::findOne($key)) {
            return self::findOne($key)->value;
        }
    }
}
