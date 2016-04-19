<?php

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\Feedback */

use app\modules\admin\widgets\Text;
use app\widgets\Gis;

?>
<div class="site-contacts">
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
<!--                    <div class="icon factory wow bounceInLeft"></div>-->
                    <h2 class="wow bounceInLeft">Контакты</h2>
                    <?= Text::widget([
                        'key' => 'contacts',
                        'htmlOptions' => ['class' => 'wow bounceInRight']
                    ]) ?>
                </div>
            </div>
        </div>
    </section>
    
    <?= Gis::widget([
        'address' => 'Омск',
        'text' => 'ООО НПП "Спецтех"'
    ])?>
</div>
