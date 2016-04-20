<?php

/* @var $this yii\web\View */
/* @var $documents array */
use app\modules\admin\widgets\Text;
use yii\helpers\Html;

/* @var $model \app\modules\admin\models\Feedback */


?>
<div class="site-production">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="icon gear wow bounceInLeft"></div>
                    <h2 class="wow bounceInLeft">Продукция</h2>
                    <div class="wow bounceInRight">
                        <?php foreach ($documents as $document) {
                            $link = Html::a('<i class="fa fa-file-word-o"></i> ' . $document->name, $document->base_url);
                            echo Html::tag('p', $link);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?= Text::widget([
                        'key' => 'productionTable',
                        'htmlOptions' => ['class' => 'wow bounceInUp']
                    ]) ?>
                </div>
            </div>
        </div>
    </section>
</div>
