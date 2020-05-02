<?php

use app\modules\admin\widgets\ButtonGroup;
use app\modules\admin\widgets\ImageBrowser;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;

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
        <div class="col-md-2"><?= $form->field($model, 'createdAt')->textInput([
                'placeholder' => $model->created_at ? date('d.m.Y', $model->created_at) : date('d.m.Y', time())]) ?></div>
        <div
            class="col-md-2"><?= $form->field($model, 'category_id')->dropDownList($categories, ['prompt' => '']) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'view')->dropDownList([
                'card-style-1' => 'Стиль 1',
                'card-style-2' => 'Стиль 2',
                'card-style-3' => 'Стиль 3',
                'card-style-4' => 'Стиль 4',
                'card-style-5' => 'Стиль 5',
            ]) ?></div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'body')->widget(CKEditor::class, [
                'editorOptions' => ElFinder::ckeditorOptions('admin/elfinder',
                    ['preset' => 'full', 'extraAllowedContent' => ['p[*]', 'a[*]', 'video[*]', 'source[*]', '*(*){*}']]),
            ]) ?>
        </div>
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
