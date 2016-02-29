<?php

/* @var $this yii\web\View */
use app\modules\admin\widgets\InfoBox;
use yii\widgets\ListView;

/* @var $searchModel app\modules\admin\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
    <div class="row">
        <div class="col-md-3">
            <?= InfoBox::widget([
                'counterName' => 'user',
                'controllerPath' => '/admin/user',
                'title' => 'Пользователей',
                'icon' => 'fa fa-user',
                'iconColor' => 'green'
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= InfoBox::widget([
                'counterName' => 'article',
                'controllerPath' => '/admin/article',
                'title' => 'Статей',
                'icon' => 'fa fa-file-text',
                'iconColor' => 'red'
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= InfoBox::widget([
                'counterName' => 'page',
                'controllerPath' => '/admin/page',
                'title' => 'Статичных материалов',
                'icon' => 'fa fa-file-text',
                'iconColor' => 'blue'
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= InfoBox::widget([
                'counterName' => 'text',
                'controllerPath' => '/admin/widget-text',
                'title' => 'Текстовых блоков',
                'icon' => 'fa fa-file-text-o',
                'iconColor' => 'olive'
            ]) ?>
        </div>
    </div>
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
                    <ul class="list-group">
                        <li class="list-group-item">Версия фреймворка <code><?= Yii::getVersion() ?></code></li>
                        <li class="list-group-item">Версия PHP <code><?= phpversion() ?></code></li>
                        <li class="list-group-item">Размер диска
                            <code><?= round(disk_total_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?>
                                Gb</code></li>
                        <li class="list-group-item">Свободное место на диске
                            <code><?= round(disk_free_space(Yii::$app->basePath) / 1024 / 1024 / 1024) ?> Gb</code></li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Последние системные сообщения</h3>
                    <div class="box-tools pull-right">
                        <span class="label label-primary"> <i class="fa fa-tasks"></i> </span>
                    </div><!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_message',
                            'itemOptions' => [
                                'tag' => false
                            ],
                            'layout' => '{items}'
                        ]) ?>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
