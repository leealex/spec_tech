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
            'title',
            [
                'label' => 'Категория',
                'value' => 'category.title'
            ],
            'author.username',
            'updater.username',
            'status:boolean',
            'created_at:date',
            'updated_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => false
                ]

            ],
        ],
    ]); ?>

</div>
