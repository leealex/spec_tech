<?php

use app\modules\admin\widgets\ButtonGroup;
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
        <div class="col-md-2"><?= $form->field($model, 'category_id')->dropDownList($categories) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'status')->widget(ButtonGroup::className(), [
                'default' => 1,
                'items' => [
                    ['label' => 'Да', 'value' => 1],
                    ['label' => 'Нет', 'value' => 0],
                ]
            ])->label(null, ['style' => 'display: block']) ?></div>
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

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
