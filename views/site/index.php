<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\models\Feedback
 * @var $news Article[]
 */

use app\modules\admin\models\Article;
use app\modules\admin\models\Partner;
use app\modules\admin\models\Settings;
use app\modules\admin\widgets\Text;
use app\widgets\Slick;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$path = Yii::getAlias('@app/web/uploads/slider');
$slides = \yii\helpers\FileHelper::findFiles($path);
array_walk($slides, function (&$item) use ($path) {
    $item = str_replace($path, '/uploads/slider', $item);
});
shuffle($slides);

?>
  <div class="site-index">

    <div id="carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <?php foreach ($slides as $i => $slide) { ?>
            <li data-target="#carousel" data-slide-to="<?= $i ?>"<?= $i === 0 ? ' class="active"' : '' ?>></li>
          <?php } ?>
      </ol>
      <div class="carousel-inner" role="listbox">
          <?php foreach ($slides as $i => $slide) { ?>
            <div class="item<?= $i === 0 ? ' active' : '' ?>"><img src="<?= $slide ?>" alt="<?= $this->title ?>"></div>
          <?php } ?>
      </div>

      <div class="carousel-overlay"></div>

      <div class="carousel-text">
        <p class="subtitle">Общество с Ограниченной Ответственностью</p>
        <span class="title">НПП "СПЕЦТЕХ"</span>
        <p class="description">Осуществляем изготовление<br>
          и поставки продукции для нужд<br>
          предприятий нефтегазовой отрасли</p>
        <p></p>
        <div class="years">
            <?= date('Y') - Settings::getValue('foundationYear') ?> лет успешной работы
        </div>
      </div>
    </div>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="icon wow bounceInLeft"><?= FA::i('sitemap') ?></div>
            <h2 class="wow fadeInDown">Предприятия-партнеры</h2>
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
                    'autoPlay' => false,
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
          <div class="col-md-10 col-md-offset-1">
            <div class="icon wow bounceInLeft"><?= FA::i('users') ?></div>
            <h2 class="wow fadeInDown">Наши клиенты</h2>
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="icon wow bounceInLeft"><?= FA::i('envelope-o') ?></div>
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