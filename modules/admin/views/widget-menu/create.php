<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetMenu */
/* @var array $parents */

$this->title = 'Создание меню';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-menu-create">

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
        'parents' => $parents
    ]) ?>

</div>
