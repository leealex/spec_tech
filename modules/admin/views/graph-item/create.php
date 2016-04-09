<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphItem */

$this->title = Yii::t('app', 'Create Graph Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Graph Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graph-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
