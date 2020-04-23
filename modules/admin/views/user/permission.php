<?php

use yii\bootstrap\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Права пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="row">
    <div class="col-md-8">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'description:text:Действие',
                [
                    'label' => 'Администратор',
                    'value' => function ($model) use ($administrator) {
                        return Html::checkbox($model->name, key_exists($model->name, $administrator), ['value' => 'admin', 'disabled' => 'disabled']);
                    },
                    'format' => 'raw'
                ],
                [
                    'label' => 'Менеджер',
                    'value' => function ($model) use ($manager) {
                        return Html::checkbox($model->name, key_exists($model->name, $manager), ['value' => 'manager']);
                    },
                    'format' => 'raw'
                ],
                [
                    'label' => 'Пользователь',
                    'value' => function ($model) use ($user) {
                        return Html::checkbox($model->name, key_exists($model->name, $user), ['value' => 'user']);
                    },
                    'format' => 'raw'
                ]

            ]
        ]); ?>
    </div>
  </div>
</div>
