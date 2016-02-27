<?php

/* @var $this yii\web\View */
use app\modules\admin\models\Article;
use app\modules\admin\models\Page;
use app\modules\admin\models\User;
use app\modules\admin\models\WidgetText;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $searchModel app\modules\admin\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Информация о системе</h3>
                    <div class="box-tools pull-right">
                        <span class="label label-primary"> <i class="fa fa-info-circle"></i> </span>
                    </div><!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <p>Версия фреймворка <code><?= Yii::getVersion() ?></code></p>
                    <p>Версия PHP <code><?= phpversion() ?></code></p>
                    <p>Размер диска <code><?= round(disk_total_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?> Gb</code></p>
                    <p>Свободное место на диске <code><?= round(disk_free_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?> Gb</code></p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <?= Html::a('<span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>', Url::to('/admin/user')) ?>
                <div class="info-box-content">
                    <span class="info-box-text">Пользователей</span>
                    <span class="info-box-number"><?= Html::a(User::find()->count(), Url::to('/admin/user')) ?></span>
                    <?= Html::a('Добавить', Url::to('/admin/user/create'), ['class' => 'btn btn-primary pull-right']) ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <?= Html::a('<span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>', Url::to('/admin/article')) ?>
                <div class="info-box-content">
                    <span class="info-box-text">Статей</span>
                    <span class="info-box-number"><?= Html::a(Article::find()->count(), Url::to('/admin/article')) ?></span>
                    <?= Html::a('Добавить', Url::to('/admin/article/create'), ['class' => 'btn btn-primary pull-right']) ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <?= Html::a('<span class="info-box-icon bg-blue"><i class="fa fa-file-text"></i></span>', Url::to('/admin/page')) ?>
                <div class="info-box-content">
                    <span class="info-box-text">Статичных материалов</span>
                    <span class="info-box-number"><?= Html::a(Page::find()->count(), Url::to('/admin/page')) ?></span>
                    <?= Html::a('Добавить', Url::to('/admin/page/create'), ['class' => 'btn btn-primary pull-right']) ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <?= Html::a('<span class="info-box-icon bg-olive"><i class="fa fa-file-text-o"></i></span>', Url::to('/admin/widget-text')) ?>
                <div class="info-box-content">
                    <span class="info-box-text">Текстовых блоков</span>
                    <span class="info-box-number"><?= Html::a(WidgetText::find()->count(), Url::to('/admin/widget-text')) ?></span>
                    <?= Html::a('Добавить', Url::to('/admin/widget-text/create'), ['class' => 'btn btn-primary pull-right']) ?>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
</div>
