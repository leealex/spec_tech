<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "file_storage".
 *
 * @property integer $id
 * @property string $base_url
 * @property string $path
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 */
class FileStorage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_storage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['base_url', 'path'], 'required'],
            [['size', 'created_at'], 'integer'],
            [['base_url', 'path'], 'string', 'max' => 1024],
            [['type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'base_url' => Yii::t('app', 'Base Url'),
            'path' => Yii::t('app', 'Path'),
            'type' => Yii::t('app', 'Type'),
            'size' => Yii::t('app', 'Size'),
            'name' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
