<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphItem */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Graph Item',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Graph Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="graph-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
