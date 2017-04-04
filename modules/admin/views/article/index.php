<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
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
            'created_at:date',
            'updated_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => false,
                    'update' => false
                ]

            ],
        ],
    ]); ?>

</div>
