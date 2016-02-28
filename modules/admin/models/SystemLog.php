<?php
namespace app\modules\admin\models;

use app\modules\admin\Module;
use Yii;

/**
 * This is the model class for table "system_log".
 *
 * @property integer $id
 * @property integer $level
 * @property string $category
 * @property integer $log_time
 * @property string $prefix
 * @property integer $message
 */
class SystemLog extends \yii\db\ActiveRecord
{
    const CATEGORY_NOTIFICATION = 'notification';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'log_time', 'message'], 'integer'],
            [['log_time'], 'required'],
            [['prefix'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('app', 'ID'),
            'level' => Module::t('app', 'Level'),
            'category' => Module::t('app', 'Category'),
            'log_time' => Module::t('app', 'Log Time'),
            'prefix' => Module::t('app', 'Prefix'),
            'message' => Module::t('app', 'Message'),
        ];
    }
}