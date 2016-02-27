<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */

$this->title = 'Создание материала';
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
