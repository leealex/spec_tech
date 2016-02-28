<?php

namespace app\modules\admin\models;

use app\modules\admin\Module;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property integer $parent_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Article[] $articles
 * @property ArticleCategory $parent
 * @property ArticleCategory[] $articleCategories
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
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
            [['slug', 'title'], 'required'],
            [['body'], 'string'],
            [['parent_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 1024],
            ['slug', 'match', 'pattern' => '/^[a-zA-Z_-]+$/', 'message' => 'Допускаются только буквы латинского алфавита, тире и нижнее подчеркивание'],
            [['title'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('app', 'ID'),
            'slug' => Module::t('app', 'Slug'),
            'title' => Module::t('app', 'Title'),
            'body' => Module::t('app', 'Body'),
            'parent_id' => Module::t('app', 'Parent ID'),
            'status' => Module::t('app', 'Status'),
            'created_at' => Module::t('app', 'Created At'),
            'updated_at' => Module::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['parent_id' => 'id']);
    }
}
