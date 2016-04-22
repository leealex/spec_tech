<?php

namespace app\controllers;

use app\modules\admin\models\Article;
use app\modules\admin\models\ArticleCategory;
use app\modules\admin\models\ArticleSearch;
use app\modules\admin\models\Feedback;
use app\modules\admin\models\FileStorage;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new Feedback();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->send()) {
            return Html::tag('div', '<i class="fa fa-check" aria-hidden="true"></i> Сообщение успешно отправлено.',
                ['class' => 'feedback-result wow fadeInDown']);
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

    /**
     * @return string
     */
    public function actionProduction()
    {
        return $this->render('production');
    }

    /**
     * @return string
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /**
     * @return string
     */
    public function actionNews()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['category_id' => ArticleCategory::getIdBySlug('news')]);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];
        return $this->render('news', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionModalContent()
    {
        $article = Article::findOne(Yii::$app->request->post('id'));
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $article->body;
    }
}
