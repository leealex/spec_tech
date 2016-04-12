<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "article".
 *
 * @property string $title
 * @property string $user
 * @property string $phone
 * @property string $email
 * @property string $body
 */
class Feedback extends Model
{
    public $title;
    public $user;
    public $phone;
    public $email;
    public $body;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user', 'phone', 'email', 'body'], 'required'],
            [['title', 'user', 'phone', 'body'], 'string'],
            ['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название института',
            'user' => 'Контактное лицо',
            'phone' => 'Телефон',
            'email' => 'Email',
            'body' => 'Сообщение',
        ];
    }

    /**
     * @return bool
     */
    public function send()
    {
        // to customer
        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo([$this->email])
            ->setSubject('Копия: Сообщение с сайта ' . Yii::$app->name)
            ->setHtmlBody('Сообщение: ' . $this->body
            . 'Название института' . $this->title
            . 'Контактное лицо' . $this->user
            . 'Телефон' . $this->phone
            . 'Email' . $this->email)
            ->send();

        // to admin
        Yii::$app->mailer->compose()
            ->setFrom($this->email)
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Сообщение с сайта ' . Yii::$app->name)
            ->setHtmlBody('Сообщение: ' . $this->body
                . 'Название института' . $this->title
                . 'Контактное лицо' . $this->user
                . 'Телефон' . $this->phone
                . 'Email' . $this->email)
            ->send();
        return true;
    }
}
