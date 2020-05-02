<?php

use app\modules\admin\models\Article;
use app\widgets\Slick;

?>

<div>
    <?= Slick::widget([
        'items' => Article::slideHistory(),
        'numberToShow' => 1,
        'numberToScroll' => 1,
        'autoPlay' => true,
    ]) ?>
</div>
