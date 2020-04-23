<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetText */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Widget Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-view">

  <p>
      <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
          ],
      ]) ?>
  </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'key',
            'title',
            'body:html',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
