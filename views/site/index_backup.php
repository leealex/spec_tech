<?php

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\Feedback */

use app\modules\admin\models\Article;
use app\modules\admin\models\GraphItem;
use app\modules\admin\models\Partner;
use app\modules\admin\models\Settings;
use app\modules\admin\widgets\Text;
use app\widgets\Slick;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>
    <div class="site-index">
        <section class="intro">
            <div class="container">
                <div class="about-us">
                    <h2 class="wow bounceInLeft">Чем занимаемся</h2>
                    <div class="subtitle wow bounceInLeft" data-wow-delay="0.1s">
                        Осуществляем изготовление и поставки продукции для нужд предприятий нефтегазовой отрасли
                    </div>
                    <div class="years wow flipInX" data-wow-delay="0.8s">
                        <div class="number"><?= date('Y') - Settings::getValue('foundationYear') ?></div>
                        лет
                    </div>
                    <div class="years-desc wow bounceInLeft" data-wow-delay="0.2s">
                        Успешной работы
                    </div>
                </div>
                <div class="laptop wow bounceInRight">
                    <div class="shine"></div>
                    <div class="overlay"></div>
                    <?= Slick::widget([
                        'items' => [
                            '<img src="/img/slide01.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide02.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide03.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide04.jpg" alt="ООО НПП Спецтех" class="img-responsive">'
                        ],
                        'numberToShow' => 1,
                        'numberToScroll' => 1,
                        'autoPlay' => true,
                    ]) ?>
                </div>
            </div>
            <div class="section-footer-wrapper">
                <div class="section-footer"></div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon chat wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">О нашей компании</h2>
                        <div class="column-2 wow fadeInUp">
                            <?= Text::widget(['key' => 'about']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 wow bounceInUp graph" data-wow-offset="200">
                        <?= Slick::widget([
                            'items' => GraphItem::renderItems(),
                            'numberToShow' => 3,
                            'numberToScroll' => 3,
                        ]) ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon factory wow bounceInLeft"></div>
                        <h2 class="wow bounceInLeft">Оборудование</h2>
                        <div class="wow bounceInRight" data-wow-offset="100">
                            <?= Text::widget(['key' => 'equipment']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wow bounceInUp" data-wow-offset="200">
                            <?= Slick::widget([
                                'items' => Article::slideEquipment(),
                                'numberToShow' => 3,
                                'numberToScroll' => 1,
                                'autoPlay' => true,
                                'centerMode' => true,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="icon branches wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">Предприятия холдинга</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="wow bounceInLeft">
                            <?= Slick::widget([
                                'items' => Article::slideBranches(),
                                'numberToShow' => 3,
                                'numberToScroll' => 1,
                                'autoPlay' => true,
                                'centerMode' => true,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon people wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">Партнеры</h2>
                        <div class="partners wow bounceInUp" data-wow-offset="200">
                            <?= Slick::widget([
                                'items' => Partner::getSlides(),
                                'numberToShow' => 5,
                                'numberToScroll' => 1,
                                'variableWidth' => true,
                                'autoPlay' => true,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon news wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">Новости</h2>
                        <div class="wow bounceInUp" data-wow-offset="200">
                            <?= Slick::widget([
                                'items' => Article::slideNews(),
                                'numberToShow' => 1,
                                'numberToScroll' => 1,
                                'autoPlay' => true,
                            ]) ?>
                            <a href="/site/news" class="read-all grey">Посмотреть все новости</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="icon book wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">Проектным институтам, организациям, потребителям</h2>

                        <?php
                        Pjax::begin();
                        $form = ActiveForm::begin(['options' => ['class' => 'institutes wow fadeInDown', 'data' => ['pjax' => true]]]);
                        ?>

                        <?= $form->field($model, 'title')->textInput(['placeholder' => $model->getAttributeLabel('title')])->label(false) ?>
                        <?= $form->field($model, 'user')->textInput(['placeholder' => $model->getAttributeLabel('user')])->label(false) ?>
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')])->label(false) ?>
                        <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')])->label(false) ?>
                        <?= $form->field($model, 'body')->textarea(['placeholder' => $model->getAttributeLabel('body'), 'rows' => 5])->label(false) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Отправить сообщение', ['class' => 'read-all blue']) ?>
                        </div>

                        <?php
                        ActiveForm::end();
                        Pjax::end();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php Modal::begin([
    'id' => 'modalCard',
    'header' => Html::tag('span'),
    'size' => Modal::SIZE_LARGE
]);
Modal::end() ?>