<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Partner */

$this->title = Yii::t('app', 'Create Partner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
