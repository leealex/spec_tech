<?php

/* @var $this yii\web\View */

use app\modules\admin\models\GraphItem;
use app\modules\admin\models\Settings;
use app\modules\admin\widgets\Text;
use yii\bootstrap\Carousel;


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
                    <div class="number"><?= date('Y') - Settings::getValue('foundationYear') ?></div>
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
                    <div class="column-2">
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

    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="icon"><i class="fa fa-industry"></i></div>
                    <h2>Оборудование</h2>
                    <div class="">
                        <?= Text::widget(['key' => 'about']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-md card-black">
                        <div class="card-header">
                            <div class="card-title">
                                Название карточки
                            </div>
                            <div class="card-avatar">
                                <img src="/img/D6C5CSdHWEs.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquid assumenda
                            consequatur dignissimos eius eum expedita explicabo harum magnam neque odio possimus
                            praesentium quasi saepe suscipit tempora unde ut voluptates?
                        </div>
                        <div class="card-footer">
                            <button>Подробнее</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-md card-black">
                        <div class="card-header">
                            <div class="card-title">
                                Название карточки
                            </div>
                            <div class="card-avatar">
                                <img src="/img/D6C5CSdHWEs.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquid assumenda
                            consequatur dignissimos eius eum expedita explicabo harum magnam neque odio possimus
                            praesentium quasi saepe suscipit tempora unde ut voluptates?
                        </div>
                        <div class="card-footer">
                            <button>Подробнее</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-md card-black">
                        <div class="card-header">
                            <div class="card-title">
                                Название карточки
                            </div>
                            <div class="card-avatar">
                                <img src="/img/D6C5CSdHWEs.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquid assumenda
                            consequatur dignissimos eius eum expedita explicabo harum magnam neque odio possimus
                            praesentium quasi saepe suscipit tempora unde ut voluptates?
                        </div>
                        <div class="card-footer">
                            <button>Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="icon"><i class="fa fa-sitemap"></i></div>
                    <h2>Дочерние предприятия</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-sm card-blue">
                        <div class="card-header">
                            <div class="card-title">
                                Название карточки
                            </div>
                            <div class="card-avatar">
                                <img src="/img/D6C5CSdHWEs.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquid assumenda
                            consequatur dignissimos eius eum expedita explicabo harum magnam neque odio possimus
                            praesentium quasi saepe suscipit tempora unde ut voluptates?
                        </div>
                        <div class="card-footer">
                            <button>Подробнее</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-sm card-red">
                        <div class="card-header">
                            <div class="card-title">
                                Название карточки
                            </div>
                            <div class="card-avatar">
                                <img src="/img/D6C5CSdHWEs.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquid assumenda
                            consequatur dignissimos eius eum expedita explicabo harum magnam neque odio possimus
                            praesentium quasi saepe suscipit tempora unde ut voluptates?
                        </div>
                        <div class="card-footer">
                            <button>Подробнее</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-sm card-green">
                        <div class="card-header">
                            <div class="card-title">
                                Название карточки
                            </div>
                            <div class="card-avatar">
                                <img src="/img/D6C5CSdHWEs.jpg" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, aliquid assumenda
                            consequatur dignissimos eius eum expedita explicabo harum magnam neque odio possimus
                            praesentium quasi saepe suscipit tempora unde ut voluptates?
                        </div>
                        <div class="card-footer">
                            <button>Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <h2>Партнеры</h2>
                    <div class="">
                        <?= Text::widget(['key' => 'about']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                    <h2>Новости</h2>
                    <div class="">
                        <?= Text::widget(['key' => 'about']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <h2>Институтам</h2>
                    <div class="">
                        <?= Text::widget(['key' => 'about']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

