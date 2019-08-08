<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\FileStorage;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\SystemLog;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DashboardController extends Controller
{
    public function behaviors()
    {
        return [
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
        return parent::afterAction($action, $result);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
            'file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SystemLog::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => ['log_time' => SORT_DESC]
            ]
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
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

    /**
     * @return string
     */
    public function actionError()
    {
        return $this->render('error', [
            'name' => 'Ошибка доступа',
            'message' => 'У вас нет прав на просмотр содержимого этого раздела.',
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionGitStatus()
    {
        $r = shell_exec('cd ' . Yii::getAlias('@app') . ' && git status');
        Yii::$app->session->setFlash('success', '<pre>' . $r . '</pre>');

        return $this->redirect('/admin');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionGitPull()
    {
        $r = shell_exec('cd ' . Yii::getAlias('@app') . ' && git fetch --all && git reset --hard origin/master && git pull origin master');
        Yii::$app->session->setFlash('success', '<pre>' . $r . '</pre>');

        return $this->redirect('/admin');
    }
}
