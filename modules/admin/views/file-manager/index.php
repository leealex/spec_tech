<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\UploadForm */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджер файлов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-index">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= Html::submitButton('Загрузить файл', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Тип',
                'value' => function ($model) {
                    $type = explode('/', $model->type);
                    return $type[0] === 'image' ? '<i class="fa fa-file-image-o"></i>' : '<i class="fa fa-file"></i>';
                },
                'format' => 'html'
            ],
            'name',
            'base_url',
            'path',
            [
                'label' => 'Эскиз',
                'value' => function ($model) {
                    $type = explode('/', $model->type);
                    return $type[0] === 'image' ? Html::img($model->base_url, ['width' => 100]) : '';
                },
                'format' => 'html'
            ],
            'size:shortSize',

            'created_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => false,
                ],
            ],
        ],
    ]); ?>

</div>
