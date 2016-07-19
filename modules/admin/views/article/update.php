<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $categories array */

$this->title = 'Редактирование: ' . ' ' . $model->slug;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slug, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="article-update">

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
