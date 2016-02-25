<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\FileStorage;
use app\modules\admin\models\LoginForm;
use vova07\imperavi\actions\GetAction;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DashboardController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return $action->controller->redirect('/admin/dashboard/login');
                }
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
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->view->params['user'] = Yii::$app->user->identity;
            Yii::$app->user->loginUrl = ['/admin/dashboard/login'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result)
    {
        if ($action->id === 'image-upload' || $action->id === 'file-upload') {
            $fileName = substr($result['filelink'], strrpos($result['filelink'], '/') + 1);
            if ($action->id === 'image-upload') {
                if ($file = $_FILES['file']) {
                    $storage = new FileStorage();
                    $storage->path = $action->path . $fileName;
                    $storage->base_url = $result['filelink'];
                    $storage->name = $fileName;
                    $storage->size = $file['size'];
                    $storage->type = $file['type'];
                    $storage->created_at = time();
                    $storage->save();
                }
            }
        }
        return parent::afterAction($action, $result);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => '/uploads/images/',
                'path' => '@app/web/uploads/images'
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => '/uploads/images/',
                'path' => '@app/web/uploads/images',
                'type' => GetAction::TYPE_IMAGES,
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
                'type' => GetAction::TYPE_FILES,
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }
}
