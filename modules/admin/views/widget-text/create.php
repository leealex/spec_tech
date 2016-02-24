<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetText */

$this->title = 'Create Widget Text';
$this->params['breadcrumbs'][] = ['label' => 'Widget Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
