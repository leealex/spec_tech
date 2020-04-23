<?php

use app\modules\admin\widgets\ButtonGroup;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetText */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-text-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'status')->widget(ButtonGroup::class, [
                'default' => 1,
                'items' => [
                    ['label' => 'Да', 'value' => 1],
                    ['label' => 'Нет', 'value' => 0],
                ]
            ])->label(null, ['style' => 'display: block']) ?></div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <?= $form->field($model, 'body')->widget(CKEditor::class, [
                'editorOptions' => ElFinder::ckeditorOptions('admin/elfinder',
                    ['preset' => 'full', 'extraAllowedContent' => ['p[*]', 'a[*]', 'video[*]', 'source[*]', '*(*){*}']]),
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
