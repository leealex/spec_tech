<?php

/* @var $this yii\web\View */

use yii\base\Controller;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <?= \app\modules\admin\widgets\Menu::widget(['key' => 'main']) ?>

        <?php

        var_dump(Yii::$app->user->can('editUsers'));
        var_dump(Yii::$app->user->can('editSettings'));
        var_dump(Yii::$app->authManager->getPermissions());

        $data = new \yii\data\ArrayDataProvider();
        $data->allModels = Yii::$app->authManager->getPermissions();



        echo \yii\grid\GridView::widget([
            'dataProvider' => $data,
            'columns' => [
                'description',
                [
                    'label' => 'Admin',
                    'value' => function ($model) {
                        $p = Yii::$app->authManager->getPermissionsByRole('administrator');
                        return \yii\bootstrap\Html::checkbox('aPermission', key_exists($model->name, $p));
                    },
                    'format' => 'raw'
                ],
                [
                    'label' => 'Manager',
                    'value' => function ($model) {
                        $p = Yii::$app->authManager->getPermissionsByRole('manager');
                        return \yii\bootstrap\Html::checkbox('mPermission', key_exists($model->name, $p));
                    },
                    'format' => 'raw'
                ],
                [
                    'label' => 'User',
                    'value' => function ($model) {
                        $p = Yii::$app->authManager->getPermissionsByRole('user');
                        return \yii\bootstrap\Html::checkbox('uPermission', key_exists($model->name, $p));
                    },
                    'format' => 'raw'
                ]

            ]
        ]);

        ?>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="/admin">Log into admin cp</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>
                </p>
            </div>
        </div>

    </div>
</div>
