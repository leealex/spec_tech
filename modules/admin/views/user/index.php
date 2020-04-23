<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <p>
      <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            [
                'label' => 'Роль',
                'value' => function ($model) {
                    if ($roles = Yii::$app->authManager->getRolesByUser($model->id)) {
                        return $roles[key($roles)]->description;
                    } else {
                        return '';
                    }
                }
            ],
            'created_at:date',
            'updated_at:date',
            'logged_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => function ($model) {
                        return $model->id != 1;
                    }
                ]
            ],
        ],
    ]); ?>

</div>
