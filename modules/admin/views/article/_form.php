<?php

use app\modules\admin\widgets\ButtonGroup;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use yii\widgets\MaskedInput;

/**
 * @var $this yii\web\View
 * @var $model app\modules\admin\models\Article
 * @var $form yii\widgets\ActiveForm
 * @var $categories \app\modules\admin\models\ArticleCategory[]
 */
?>

<div class="article-form">
    <?php $form = ActiveForm::begin(); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'apply']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'action', 'value' => 'save']) ?>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'createdAt')
                ->widget(MaskedInput::class, ['mask' => '99.99.9999', 'options' => ['placeholder' => 'ДД.ММ.ГГГГ']]) ?></div>
        <div
            class="col-md-2"><?= $form->field($model, 'category_id')->dropDownList($categories, ['prompt' => '']) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'body')->widget(CKEditor::class, [
                'editorOptions' => ElFinder::ckeditorOptions('admin/elfinder', [
                    'preset' => 'full',
                    'extraAllowedContent' => ['p[*]', 'a[*]*', 'i[*]', 'video[*]', 'source[*]', '*(*){*}']
                ]),
            ]) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <?= $model->thumbnail_path ? Html::img($model->thumbnail_path) : Html::img('/img/no-image.png') ?>
            <?= $form->field($model, 'thumbnail_path')->widget(InputFile::class, [
                'controller' => 'admin/elfinder',
                'filter' => 'image',
                'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                'buttonOptions' => ['class' => 'btn btn-default'],
                'multiple' => false
            ]); ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
              <?= $form->field($model, 'status')->widget(ButtonGroup::class, [
                  'default' => 1,
                  'items' => [
                      ['label' => 'Да', 'value' => 1],
                      ['label' => 'Нет', 'value' => 0],
                  ]
              ])->label(null, ['style' => 'display: block']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php ActiveForm::end(); ?>
</div>
