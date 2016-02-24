<?php

namespace app\modules\admin;
use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layout = 'main';
        $this->defaultRoute = 'dashboard';
        $this->registerTranslations();
        Yii::configure($this, require(__DIR__ . '/config.php'));
        Yii::setAlias('@admin', '@app/modules/admin');
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/admin/*'] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'basePath'       => '@app/modules/admin/messages',
            'fileMap'        => [
                'modules/admin/app' => 'app.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/admin/' . $category, $message, $params, $language);
    }
}
