<?php
/* @var $model \app\modules\admin\models\News */

?>
<li id="article-<?= $model->id ?>" class="news-item">
    <div class="news-title"><?= $model->title ?></div>
    <div class="news-date">Дата: <?= date('d.m.Y', $model->created_at) ?></div>
    <div class="news-body"><?= $model->text ?></div>
</li>
<hr>