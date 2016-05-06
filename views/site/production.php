<?php

/* @var $this yii\web\View */
use app\modules\admin\widgets\Text;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $model \app\modules\admin\models\Feedback */


?>
<div class="site-production">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="icon gear wow bounceInLeft"></div>
                    <h2 class="wow bounceInLeft">Продукция</h2>
                    <div class="wow bounceInUp">
                        <?= Text::widget([
                            'key' => 'productionTable',
                            'htmlOptions' => ['class' => 'wow bounceInUp']
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
