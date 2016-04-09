<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetMenu */
/* @var array $parents */

$this->title = 'Редактирование: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="widget-menu-update">

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
        'parents' => $parents
    ]) ?>

</div>
