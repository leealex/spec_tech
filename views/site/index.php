<?php

/* @var $this yii\web\View */

use app\modules\admin\models\GraphItem;
use app\modules\admin\widgets\Text;
use yii\bootstrap\Carousel;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <section class="intro">
        <div class="container">
            <div class="about-us">
                <h2>Чем занимаемся</h2>
                <div class="subtitle">
                    Осуществляем поставки для нужд предприятий нефтегазовой отрасли
                </div>
                <div class="years">
                    <div class="number">5</div>
                    лет
                </div>
                <div class="years-desc">
                    Успешной работы
                </div>
            </div>
            <div class="laptop"><img src="/img/laptop.png" alt="ООО НПП Спецтех" class="img-responsive"></div>
        </div>
        <div class="section-footer-wrapper">
            <div class="section-footer"></div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="icon"><i class="fa fa-commenting"></i></div>
                    <h2>О нашей компании</h2>
                    <div class="text">
                        <?= Text::widget(['key' => 'about']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= Carousel::widget([
                        'controls' => false,
                        'showIndicators' => false,
                        'options' => ['class' => 'slide'],
                        'items' => GraphItem::renderItems()
                    ]) ?>
                </div>
            </div>
        </div>
    </section>
</div>
