<?php

use app\modules\admin\widgets\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
                'slug',
                [
                    'attribute' => 'title',
                    'value' => function ($model) {
                        return Html::a($model->title, ['update', 'id' => $model->id]);
                    },
                    'format' => 'raw'
                ],
                [
                    'label' => 'Категория',
                    'value' => 'category.title',
                    'filter' => Html::activeDropDownList($searchModel, 'category_id', $categories,
                        ['class' => 'form-control', 'prompt' => ''])
                ],
                [
                    'label' => 'Автор',
                    'value' => 'author.username',
                ],
                [
                    'label' => 'Редактор',
                    'value' => 'updater.username',
                ],
                'status:boolean',
                [
                    'headerOptions' => ['width' => 150],
                    'attribute' => 'created_at',
                    'value' => function ($model) {
                        return date('d.m.Y H:i', $model->created_at);
                    }
                ]
            ],
        ]); ?>
    </div>
  </div>
</div>
