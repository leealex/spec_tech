<?php

namespace app\controllers;

use app\modules\admin\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class PageController
 * @package app\controllers
 */
class PageController extends Controller
{
    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        if (!$model = Article::findOne(['slug' => $slug])) {
            throw new NotFoundHttpException('Страница не найдена');
        }

        return $this->render('view', ['model' => $model]);
    }
}
