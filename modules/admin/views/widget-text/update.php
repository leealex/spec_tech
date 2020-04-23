<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetText */

$this->title = 'Редактирование: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Текстовые блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="widget-text-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
