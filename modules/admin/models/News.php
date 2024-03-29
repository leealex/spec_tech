<?php

namespace app\modules\admin\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $text
 * @property string $slug
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'createdAt'], 'required'],
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['text', 'createdAt'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique' => true
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id'

            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Автор',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'slug' => 'Псевдоним',
            'status' => 'Активно',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
            'createdAt' => 'Дата публикации',
        ];
    }

    /**
     * @return false|string
     */
    public function getCreatedAt()
    {
        return $this->created_at ? date('d.m.Y', $this->created_at) : date('d.m.Y');
    }

    /**
     * @param $date
     */
    public function setCreatedAt($date)
    {
        $this->created_at = strtotime($date);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
