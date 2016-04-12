<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\modules\admin\models\Settings;
use app\modules\admin\widgets\Menu;
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
    <div class="header">
        <a class="logo" href="/" title="<?= Html::encode(Yii::$app->name) ?>"></a>
        <?= Menu::widget(['key' => 'main']) ?>
        <div class="phones">
            <div><?= Settings::getValue('phoneHeader1') ?></div>
            <div><?= Settings::getValue('phoneHeader2') ?></div>
        </div>
    </div>
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name . ' ' . Settings::getValue('foundationYear') . ' - ' . date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
