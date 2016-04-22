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

<?php Modal::begin([
    'id' => 'modalProduction1',
    'header' => Html::tag('span', 'ТУ 1469-003-67983609-2012'),
    'size' => Modal::SIZE_LARGE
]); ?>
<div class="embed-responsive embed-responsive-4by3 test">
    <embed src="/uploads/files/1.pdf" class="embed-responsive-item">
</div>
<?php Modal::end() ?>

<?php Modal::begin([
    'id' => 'modalProduction2',
    'header' => Html::tag('span', 'ТУ 1469-001-67983609-2011'),
    'size' => Modal::SIZE_LARGE
]); ?>
<p class="buttons">
    <button class="btn btn-sm btn-default" data-file="/uploads/files/2.pdf">Заглушки</button>
    <button class="btn btn-sm btn-default" data-file="/uploads/files/3.pdf">Переходы</button>
    <button class="btn btn-sm btn-default" data-file="/uploads/files/4.pdf">ПШС</button>
    <button class="btn btn-sm btn-default" data-file="/uploads/files/5.pdf">ТШ</button>
    <button class="btn btn-sm btn-default" data-file="/uploads/files/6.pdf">ТШС</button>
    <button class="btn btn-sm btn-default" data-file="/uploads/files/7.pdf">ЭПШС</button>
</p>
<div class="embed-responsive embed-responsive-4by3 pdf-wrapper">
    <embed src="/uploads/files/2.pdf" class="embed-responsive-item">
</div>
<?php Modal::end() ?>
