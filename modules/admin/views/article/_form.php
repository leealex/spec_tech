<?php

use app\modules\admin\widgets\ButtonGroup;
use app\modules\admin\widgets\ImageBrowser;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'createdAt')->textInput([
            'placeholder' => $model->created_at ? date('d.m.Y', $model->created_at) : date('d.m.Y', time())]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'category_id')->dropDownList($categories) ?></div>
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
            <?= $form->field($model, 'body')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'table',
                        'imagemanager',
                        'filemanager',

                    ],
                    'imageManagerJson' => Url::to(['/admin/dashboard/images-get']),
                    'imageUpload' => Url::to(['/admin/dashboard/image-upload']),
                    'fileManagerJson' => Url::to(['/admin/dashboard/files-get']),
                    'fileUpload' => Url::to(['/admin/dashboard/file-upload'])
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'thumbnail_path')->widget(ImageBrowser::className()) ?></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'status')->widget(ButtonGroup::className(), [
                    'default' => 1,
                    'items' => [
                        ['label' => 'Да', 'value' => 1],
                        ['label' => 'Нет', 'value' => 0],
                    ]
                ])->label(null, ['style' => 'display: block']) ?>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
