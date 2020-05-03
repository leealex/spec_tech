<?php

use yii\helpers\Html;
use app\modules\admin\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Доавить партнера', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'title',
                'image:image',
                'text:ntext'
            ],
        ]); ?>
    </div>
  </div>
</div>
