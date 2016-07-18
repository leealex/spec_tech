<?php
/* @var $model \app\modules\admin\models\Article */

?>
<li class="news-item">
    <div class="time-badge"><?= date('d.m.Y', $model->created_at) ?></div>
    <h4><?= $model->title ?></h4>
    <div class="news-body">
        <?= $model->body ?>
    </div>
</li>
