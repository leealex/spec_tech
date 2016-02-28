<?php

namespace app\modules\admin;

use app\modules\admin\models\Settings;
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
        $this->loadSettings();
    }

    /**
     * Loads settings from DB into global params array
     */
    public function loadSettings()
    {
        $settings = Settings::getAll();
        foreach ($settings as $key => $value) {
            Yii::$app->params['settings'][$key] = $value;
        }
        Yii::$app->name = Yii::$app->params['settings']['siteName'];
    }

    /**
     * Registers translations
     */
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/admin/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/modules/admin/messages',
            'fileMap' => [
                'modules/admin/app' => 'app.php'
            ],
        ];
    }

    /**
     * @param $category
     * @param $message
     * @param array $params
     * @param null $language
     * @return string
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/admin/' . $category, $message, $params, $language);
    }
}
