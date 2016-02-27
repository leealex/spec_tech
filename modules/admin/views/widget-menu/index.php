<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\WidgetMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Разделы сайта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-menu-index">
    <p>
        <?= Html::a('Создать меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'key',
            'title',
            [
                'label' => 'Элементов',
                'value' => function ($model) {
                    return count($model->items);
                }
            ],
            'status:boolean',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => false
                ]

            ],
        ],
    ]); ?>

</div>
