<?php

/* @var $this yii\web\View */
use yii\widgets\ListView;

/* @var $documents array */
?>
<div class="site-news">
    <section>
        <?php echo strtotime('08.06.2016')?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="icon news wow bounceInLeft"></div>
                    <h2 class="wow bounceInLeft">Новости</h2>
                    <ul class="news-wrapper wow bounceInRight">
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_news',
                            'summary' => false
                        ]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
