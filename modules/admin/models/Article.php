<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property integer $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $author_id
 * @property integer $updater_id
 * @property integer $status
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ArticleCategory $category
 * @property User $author
 * @property User $updater
 * @property ArticleAttachment[] $articleAttachments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'body'], 'required'],
            [['body'], 'string'],
            [['category_id', 'author_id', 'updater_id', 'status', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['view'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'view' => Yii::t('app', 'View'),
            'category_id' => Yii::t('app', 'Category ID'),
            'thumbnail_base_url' => Yii::t('app', 'Thumbnail Base Url'),
            'thumbnail_path' => Yii::t('app', 'Thumbnail Path'),
            'author_id' => Yii::t('app', 'Author ID'),
            'updater_id' => Yii::t('app', 'Updater ID'),
            'status' => Yii::t('app', 'Status'),
            'published_at' => Yii::t('app', 'Published At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleAttachments()
    {
        return $this->hasMany(ArticleAttachment::className(), ['article_id' => 'id']);
    }
}
