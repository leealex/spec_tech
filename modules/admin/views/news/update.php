<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\News
 */

$this->title = 'Новость #: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id];
?>
<div class="content-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
