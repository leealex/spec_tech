<?php

use app\modules\admin\models\TextBlock;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $model \app\modules\admin\models\Article
 */

$this->title = $model->title;
if ($model->category && $model->category->parent) {
    $this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['/page/' . $model->category->slug]];
}
$this->params['breadcrumbs'][] = $this->title;
$text = str_replace('{map}', $this->render('_map'), $model->body);
$text = str_replace('{history}', $this->render('_history'), $text);
?>
  <div class="container">
    <div class="page-view">
      <div class="row">
        <div class="col-md-12">
          <h1><?= $model->title ?></h1>
            <?= $text ?>
        </div>
      </div>
    </div>
  </div>
<?php
Modal::begin([
    'id' => 'modalDocument',
    'header' => Html::tag('span'),
    'size' => Modal::SIZE_LARGE
]);
Modal::end();
?>