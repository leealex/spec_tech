<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\modules\admin\models\Settings;
use app\modules\admin\widgets\Menu;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
  <div class="certificates">
    <a href="/uploads/files/esr-iso.pdf" data-toggle="modal" data-target="#modalDocument"
       data-title="ЕвроСтандартРегистр" class="esr"></a>
    <a href="/uploads/files/igc.pdf" data-toggle="modal" data-target="#modalDocument"
       data-title="Сертификат соответствия" class="igc"></a>
    <a href="/uploads/files/tuv.pdf" data-toggle="modal" data-target="#modalDocument"
       data-title="Сертификат соответствия" class="tuv"></a>
  </div>
  <div class="title">
    <div class="ooo">Общество с ограниченной ответственностью</div>
    <div class="name">НПП "Спецтех"</div>
  </div>
  <div class="phones">
    <div><i class="fa fa-phone" aria-hidden="true"></i> <?= Settings::getValue('phoneHeader1') ?></div>
    <div><i class="fa fa-envelope" aria-hidden="true"></i> <?= Settings::getValue('adminEmail') ?></div>
  </div>
</div>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Главная</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
             aria-expanded="false">О компании <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/page/o-kompanii">О компании</a></li>
            <li><a href="/news">Новости</a></li>
            <li><a href="/page/istoria">История</a></li>
            <li><a href="/page/rukovodstvo">Руководство</a></li>
            <li><a href="/page/korporativnaa-kultura">Корпоративная культура</a></li>
            <li><a href="/page/foto">Фото</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
             aria-expanded="false">Наши услуги <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/page/">Услуга 1</a></li>
            <li><a href="/page/">Услуга 2</a></li>
          </ul>
        </li>
        <li><a href="/page/tehniceskie-uslovia">Технические условия</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
             aria-expanded="false">Качество <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/page/sistema-kacestva">Система качества</a></li>
            <li><a href="/page/kontrol-kacestva">Контроль качества</a></li>
          </ul>
        </li>
        <li><a href="/page/opyt-raboty">Опыт работы</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
             aria-expanded="false">Контакты <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/page/kontakty">Контакты</a></li>
            <li><a href="/page/nasi-rekvizity">Наши реквизиты</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?= $content ?>


<?php
Modal::begin([
    'id' => 'modalDocument',
    'header' => Html::tag('span'),
    'size' => Modal::SIZE_LARGE
]);
Modal::end();
?>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="footer-logo"></div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <ul class="nav text-center">
          <li><a href="/">О партнерстве</a></li>
          <li><a href="/production">Продукция</a></li>
          <li><a href="/news">Новости</a></li>
          <li><a href="/contacts">Контакты</a></li>
          <li><a href="/testimonials">Отзывы</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div>
          <div class="pull-left"><i class="fa fa-clock-o"></i></div>
          <div class="footer-contacts">
            <p>Работаем в будние дни</p>
            <p>с 9:00 до 18:00 (MSK)</p>
          </div>
        </div>
        <div>
          <div class="pull-left"><i class="fa fa-phone"></i></div>
          <div class="footer-contacts">
            <p><?= Settings::getValue('phoneHeader1') ?></p>
          </div>
        </div>
        <div>
          <div class="pull-left"><i class="fa fa-envelope-o"></i></div>
          <div class="footer-contacts">
            <p>
              <a href="mailto:<?= Settings::getValue('adminEmail') ?>"><?= Settings::getValue('adminEmail') ?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">
          &copy; <?= Yii::$app->name . ' ' . Settings::getValue('foundationYear') . ' - ' . date('Y') ?></p>
        <p class="text-center"><a href="http://plumy.ru" class="plum" target="_blank"
                                  title="Разработка и сопровождение сайтов"></a></p>
      </div>
    </div>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
