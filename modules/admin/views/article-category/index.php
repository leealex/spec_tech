<?php

use yii\helpers\Html;
use app\modules\admin\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-index">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'slug',
                'title',
                [
                    'label' => 'Элементов',
                    'value' => function ($model) {
                        return count($model->articles);
                    }
                ],
                'status:boolean',
                'created_at:date',
                'updated_at:date',
            ],
        ]); ?>
    </div>
  </div>
</div>
