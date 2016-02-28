<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $user \app\modules\admin\models\User */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">P</span><span class="logo-lg">Plum CMS</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <?= Yii::$app->params['logCount'] > 0 ? '<span class="label label-danger">' .
                            Yii::$app->params['logCount'] . '</span>' : '' ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= Yii::$app->params['logCount'] ?> Новых сообщений</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php foreach (Yii::$app->params['logData'] as $item) { ?>
                                    <li><!-- Task item -->
                                        <a href="<?= Url::to(['/admin/log/view', 'id' => $item->id]) ?>">
                                            <?= $item->level === 1 ?
                                                '<span class="label label-danger pull-right">Error</span> ' :
                                                '<span class="label label-info pull-right">Info</span> ' ?>
                                            <?= $item->category ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="<?= Url::to(['/admin/log']) ?>">Посмотреть все сообщения</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $adminImg ?>/img/avatar.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= $user->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $adminImg ?>/img/avatar.png" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= $user->username ?>
                                <small>Зарегистрирован <?= date('d.m.Y', $user->created_at) ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat disabled">Профиль</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выход',
                                    ['/admin/dashboard/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
