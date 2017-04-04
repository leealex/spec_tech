<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\WidgetTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Текстовые блоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-index">

    <p>
        <?= Html::a('Создать текстовый блок', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'key',
            [
                'attribute' => 'title',
                'value' => function ($model) {
                    return Html::a($model->title, ['widget-text/update', 'id' => $model->id]);
                },
                'format' => 'raw'
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
