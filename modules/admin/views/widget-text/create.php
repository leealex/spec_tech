<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetText */

$this->title = 'Создание тектового блока';
$this->params['breadcrumbs'][] = ['label' => 'Текстовые блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
