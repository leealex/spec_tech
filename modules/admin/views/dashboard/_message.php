<?php
/**
 * @var $model \app\modules\admin\models\SystemLog
 */
use yii\helpers\Html;

?>
<li class="list-group-item">
    <a href="">
        <small><i class="fa fa-clock-o"></i> <?= Html::encode(date('d.m.Y H:i:s', $model->log_time)) ?></small>
    </a>
    <strong><?= Html::encode($model->category) ?></strong>
    <?= $model->level === 1 ? '<span class="label label-danger">Error #' . $model->id . '</span> ' :
        '<span class="label label-info">Info</span> ' ?>
</li>
