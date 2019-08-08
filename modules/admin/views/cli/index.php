<?php

/**
 * @var $this \yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

$this->title = 'CLI Commands';
?>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <a href="/admin/cli/git-pull" class="btn btn-default">git pull</a>
        <a href="/admin/cli/composer-install" class="btn btn-default">composer install</a>
        <a href="/admin/cli/git-hard-pull" class="btn btn-danger">git hard pull</a>
        <a href="/admin/cli/composer-update" class="btn btn-danger">composer update</a>
      </div>
    </div>
  </div>
</div>
