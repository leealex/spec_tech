<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\WidgetMenuItem;
use Yii;
use app\modules\admin\models\WidgetMenu;
use app\modules\admin\models\WidgetMenuSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WidgetMenuController implements the CRUD actions for WidgetMenu model.
 */
class WidgetMenuController extends Controller
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
     * Lists all WidgetMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WidgetMenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WidgetMenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WidgetMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WidgetMenu();
        $count = count(Yii::$app->request->post('WidgetMenuItem', []));
        $items = [new WidgetMenuItem()];
        for ($i = 1; $i < $count; $i++) {
            $items[] = new WidgetMenuItem();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Model::loadMultiple($items, Yii::$app->request->post()) && Model::validateMultiple($items)) {
                foreach ($items as $item) {
                    $item->parent_id = $model->id;
                    $item->save(false);
                }
            }
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'items' => $items
            ]);
        }
    }

    /**
     * Updates an existing WidgetMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $items = WidgetMenuItem::find()->where(['parent_id' => $id])->indexBy('id')->all();
        $items[] = new WidgetMenuItem();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Model::loadMultiple($items, Yii::$app->request->post()) && Model::validateMultiple($items)) {
                foreach ($items as $item) {
                    if (!empty($item->key) && !empty($item->title)) {
                        $item->parent_id = $id;
                        $item->save(false);
                    }
                }
            }
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'items' => $items
            ]);
        }
    }

    /**
     * Deletes an existing WidgetMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing WidgetMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteItem($id)
    {
        if ($item = WidgetMenuItem::findOne($id)) {
            $item->delete();
            return $this->redirect(['update', 'id' => $item->parent_id]);
        }
    }

    /**
     * Finds the WidgetMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WidgetMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WidgetMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
