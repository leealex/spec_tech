<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $text
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image', 'text'], 'required'],
            [['text'], 'string'],
            [['title', 'image'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => 'Название',
            'image' => 'Логотип',
            'text' => 'Описание',
        ];
    }

    /**
     * Prepares the array of slides for carousel
     * @return array
     */
    public static function getSlides()
    {
        $items = self::find()->all();
        $slides = [];
        foreach ($items as $item) {
            $slides[] = '<div><img src="' . $item->image . '" alt="' . $item->title . '"></div>';
        }
        return $slides;
    }
}
