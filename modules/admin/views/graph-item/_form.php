<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GraphItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="graph-item-form">

    <?php $form = ActiveForm::begin(); ?>

  <div class="row">
    <div class="col-md-1"><?= $form->field($model, 'number')->textInput() ?></div>
    <div class="col-md-1"><?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-1"><?= $form->field($model, 'width')->textInput() ?></div>
    <div class="col-md-9"><?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?></div>
  </div>

  <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
