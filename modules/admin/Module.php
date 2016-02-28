<?php

namespace app\modules\admin;

use app\modules\admin\models\Article;
use app\modules\admin\models\ArticleCategory;
use app\modules\admin\models\FileStorage;
use app\modules\admin\models\Page;
use app\modules\admin\models\Settings;
use app\modules\admin\models\SystemLog;
use app\modules\admin\models\User;
use app\modules\admin\models\WidgetMenu;
use app\modules\admin\models\WidgetText;
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
        $this->loadLogData();
        $this->loadCounters();
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
     * Loads log data into params
     */
    public static function loadLogData()
    {
        $messages = SystemLog::find()->where(['read' => false])->all();

        Yii::$app->params['logCount'] = count($messages);
        Yii::$app->params['logData'] = $messages;
    }

    /**
     * Loads counters for the sidebar into params
     */
    public function loadCounters()
    {
        Yii::$app->params['counters'] = [
            'menu' => '<small class="label pull-right bg-gray">' . WidgetMenu::find()->count() . '</small>',
            'category' => '<small class="label pull-right bg-black">' . ArticleCategory::find()->count() . '</small>',
            'page' => '<small class="label pull-right bg-black">' . Page::find()->count() . '</small>',
            'article' => '<small class="label pull-right bg-black">' . Article::find()->count() . '</small>',
            'file' => '<small class="label pull-right bg-black">' . FileStorage::find()->count() . '</small>',
            'text' => '<small class="label pull-right bg-black">' . WidgetText::find()->count() . '</small>',
            'user' => '<small class="label pull-right bg-gray">' . User::find()->count() . '</small>',
            'settings' => '<small class="label pull-right bg-gray">' . Settings::find()->count() . '</small>',
            'log' => '<small class="label pull-right bg-red">' . SystemLog::find()->count() . '</small>',
        ];
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
