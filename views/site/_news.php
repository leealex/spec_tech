<?php
/* @var $model \app\modules\admin\models\Article */

?>
<div class="news-item wow bounceInUp">
    <h4 class="text-center"><?= $model->title ?></h4>
    <p class="text-center"><small class="text-muted"><?= date('d.m.Y', $model->created_at) ?></small></p>
    <div class="news-body">
        <?= $model->body ?>
    </div>
</div>
<hr>
