<?php

use yii\helpers\Html;
use app\modules\admin\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\GraphItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Инфографика';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graph-item-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'number',
                'color',
                'width',
                'text'
            ],
        ]); ?>
    </div>
  </div>
</div>
