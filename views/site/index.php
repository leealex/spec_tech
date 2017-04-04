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
            <div class="crest-l"></div>
            <div class="crest-r"></div>
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
                    <?= Slick::widget([
                        'items' => [
                            '<img src="/img/slide01.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide02.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide03.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide04.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide05.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide06.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide07.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide08.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide09.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide10.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide11.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                            '<img src="/img/slide12.jpg" alt="ООО НПП Спецтех" class="img-responsive">',
                        ],
                        'numberToShow' => 1,
                        'numberToScroll' => 1,
                        'autoPlay' => true,
                    ]) ?>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="icon news wow bounceInLeft"></div>
                        <h2 class="wow bounceInLeft">Новости</h2>
                        <table class="table table-condensed wow bounceInRight">
                            <?php foreach ($news as $new) { ?>
                                <tr>
                                    <td><?= date('d.m.Y', $new->created_at) ?></td>
                                    <td><?= Html::a($new->title, ['site/news', '#' => 'article-' . $new->id]) ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <p class="text-right wow bounceInLeft">
                            <?= Html::a('<i class="fa fa-archive" aria-hidden="true"></i> Архив новостей', ['site/news']) ?>
                        </p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="icon chat wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">О нашей компании</h2>
                        <div class="text-justify wow fadeInUp">
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
                    <div class="col-md-12">
                        <div class="icon branches wow fadeInDown"></div>
                        <h2 class="wow fadeInDown">Предприятия холдинга</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1">
                        <div class="wow bounceInLeft">
                            <?= Slick::widget([
                                'items' => Article::slideBranches(),
                                'numberToShow' => 1,
                                'numberToScroll' => 1,
                                'variableWidth' => true,
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
                        <div class="partners">
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
                        <h2 class="wow fadeInDown">История</h2>
                        <div>
                            <?= Slick::widget([
                                'items' => Article::slideHistory(),
                                'numberToShow' => 1,
                                'numberToScroll' => 1,
                                'autoPlay' => true,
                            ]) ?>
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