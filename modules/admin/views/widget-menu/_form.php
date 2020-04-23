<?php

use app\modules\admin\widgets\ButtonGroup;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WidgetMenu */
/* @var $form yii\widgets\ActiveForm */
/* @var array $parents */
?>

<div class="widget-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2"><?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'status')->widget(ButtonGroup::class, [
                'default' => 1,
                'items' => [
                    ['label' => 'Да', 'value' => 1],
                    ['label' => 'Нет', 'value' => 0],
                ]
            ])->label(null, ['style' => 'display: block']) ?></div>
    </div>
    <h3>Пункты меню</h3>
    <p><strong>Код</strong> Системное название пункта меню, заполняется латиницей без пробелов.</p>
    <p><strong>Название</strong> пункта отображается в меню на сайте.</p>
    <p><strong>Ссылка</strong> пункта меню, может быть как относительной (/index.php) так и обычной (http://example.com).</p>
    <p><strong>Опции</strong> HTML атрибуты пункта меню в JSON формате {"class":"my-class", "data":"value"}.</p>
    <p><strong>Активно</strong> Включен или выключен пункт меню.</p>
    <?php foreach ($items as $index => $item) { ?>
        <div class="row">
            <div class="col-md-1"><?= $form->field($item, "[$index]id")->textInput(['disabled' => true]) ?></div>
            <div class="col-md-1"><?= $form->field($item, "[$index]parent_id")->dropDownList($parents) ?></div>
            <div class="col-md-1"><?= $form->field($item, "[$index]key") ?></div>
            <div class="col-md-2"><?= $form->field($item, "[$index]title") ?></div>
            <div class="col-md-2"><?= $form->field($item, "[$index]url") ?></div>
            <div class="col-md-3"><?= $form->field($item, "[$index]options") ?></div>
            <div class="col-md-1"><?= $form->field($item, "[$index]status")->widget(ButtonGroup::class, [
                    'default' => 1,
                    'items' => [
                        ['label' => 'Да', 'value' => 1],
                        ['label' => 'Нет', 'value' => 0],
                    ]
                ])->label(null, ['style' => 'display: block']) ?></div>
            <div class="col-md-1"><?= Html::a('Удалить', '/admin/widget-menu/delete-item?id=' . $index, ['class' => 'btn btn-danger btn-form', 'data-method' => 'post']) ?></div>
        </div>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
