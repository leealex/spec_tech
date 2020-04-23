<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Partner */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Partner',
    ]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="partner-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
