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

<div class="wrap">
    <div class="header-wrapper">
        <div class="header">
            <div class="certificates">
                <a href="/uploads/files/esr-iso.pdf" data-toggle="modal" data-target="#modalDocument"
                   data-title="ЕвроСтандартРегистр" class="esr"></a>
                <a href="/uploads/files/esr-iso.pdf" data-toggle="modal" data-target="#modalDocument"
                   data-title="ЕвроСтандартРегистр" class="rst"></a>
            </div>
            <div class="title">
                <div class="ooo">Общество с ограниченной ответственностью</div>
                <div class="name">НПП "Специальные технологии"</div>
            </div>
            <div class="phones">
                <div><i class="fa fa-phone" aria-hidden="true"></i> <?= Settings::getValue('phoneHeader1') ?></div>
                <div><i class="fa fa-envelope" aria-hidden="true"></i> <?= Settings::getValue('adminEmail') ?></div>
            </div>
        </div>
        <div class="menu">
            <button class="bars"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?= Menu::widget(['key' => 'main']) ?>
        </div>
    </div>
    <?= $content ?>
</div>

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
                    <li><a href="/">О предприятии</a></li>
                    <li><a href="/production">Продукция</a></li>
                    <li><a href="/news">Новости</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-time">
                    <p>Работаем в будние дни</p>
                    <p>с 9:00 до 18:00 (MSK)</p>
                </div>
                <div class="footer-phone">
                    <p><?= Settings::getValue('phoneHeader1') ?></p>
                </div>
                <div class="footer-email">
                    <p>
                        <a href="mailto:<?= Settings::getValue('adminEmail') ?>"><?= Settings::getValue('adminEmail') ?></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">&copy; <?= Yii::$app->name . ' ' . Settings::getValue('foundationYear') . ' - ' . date('Y') ?></p>
                <p class="text-center"><a href="http://plumy.ru" class="plum" target="_blank"
                                          title="Разработка и сопровождение сайтов">Разработка сайта</a></p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
