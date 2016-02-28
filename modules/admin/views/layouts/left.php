<?php
/**
 * @var $user \app\modules\admin\models\User
 * @var $adminImg string
 */
use yii\helpers\Html;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $adminImg ?>/img/avatar.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $user->username ?></p>
                <p><?= Html::a('Выход', ['/admin/dashboard/logout'], ['data-method' => 'post']) ?></p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => [
                ['label' => 'Меню', 'options' => ['class' => 'header']],
                ['label' => 'Главная', 'icon' => 'fa fa-home', 'url' => ['/admin/dashboard']],
                ['label' => 'Разделы сайта', 'icon' => 'fa fa-sitemap', 'url' => ['/admin/widget-menu']],
                ['label' => 'Материалы', 'icon' => 'fa fa-file-text', 'url' => '#', 'items' => [
                    ['label' => 'Категории', 'icon' => 'fa fa-list', 'url' => ['/admin/article-category']],
                    ['label' => 'Статичные', 'icon' => 'fa fa-file-text', 'url' => ['/admin/page']],
                    ['label' => 'Статьи', 'icon' => 'fa fa-file-text', 'url' => ['/admin/article']],
                    ['label' => 'Менеджер файлов', 'icon' => 'fa fa-file-image-o', 'url' => ['/admin/file-manager']],
                    ['label' => 'Текстовые блоки', 'icon' => 'fa fa-file-text-o', 'url' => ['/admin/widget-text']],
                ]],
                ['label' => 'Пользователи', 'icon' => 'fa fa-user', 'url' => ['/admin/user']],
                ['label' => 'Настройки', 'icon' => 'fa fa-wrench', 'url' => ['/admin/settings']],
                ['label' => 'Система', 'icon' => 'fa fa-cogs', 'url' => '#', 'items' => [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    ['label' => 'Журнал событий', 'icon' => 'fa fa-tasks', 'url' => ['/admin/log'],],
                ]]
            ],
        ]) ?>

    </section>

</aside>
