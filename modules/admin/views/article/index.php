<?php

use app\modules\admin\models\Category;
use app\modules\admin\widgets\GridView;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $searchModel \app\modules\admin\models\ArticleSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $categories array
 */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'format' => 'raw',
                    'attribute' => 'title',
                    'value' => function ($model) {
                        return Html::a($model->title, ['article/update', 'id' => $model->id]);
                    }
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'slug',
                    'value' => function ($model) {
                        return '<span class="text-light">/page/</span>' . $model->slug;
                    }
                ],
                [
                    'attribute' => 'category_id',
                    'value' => function ($model) {
                        return $model->category ? $model->category->title : '';
                    },
                    'filter' => $categories
                ],
                'author.username:text:Автор',
                [
                    'format' => 'raw',
                    'attribute' => 'status',
                    'headerOptions' => ['width' => 50],
                    'contentOptions' => ['class' => 'text-center'],
                    'value' => function ($model) {
                        return $model->status
                            ? '<span class="label label-success">Да</span>'
                            : '<span class="label label-danger">Нет</span>';
                    },
                    'filter' => ['Нет', 'Да']
                ],
                [
                    'headerOptions' => ['width' => 150],
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i', $model->created_at);
                    }
                ]
            ]
        ]); ?>
    </div>
  </div>
</div>
