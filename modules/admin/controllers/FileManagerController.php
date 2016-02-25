<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\FileStorage;
use app\modules\admin\models\FileStorageSearch;
use app\modules\admin\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class FileManagerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileStorageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                return $this->redirect('/admin/file-manager');
            }
        }
        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($file = FileStorage::findOne($id)) {
            if (file_exists($file->path)) {
                unlink($file->path);
            }
            $file->delete();
        }
        return $this->redirect('/admin/file-manager');
    }
}
