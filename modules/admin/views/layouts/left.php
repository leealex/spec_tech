<?php
/**
 * @var $user \app\modules\admin\models\User
 * @var $adminImg string
 */
use yii\helpers\Html;

$counter = Yii::$app->params['countersHtml'];
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
                ['label' => 'Главная', 'icon' => 'fa fa-home', 'url' => ['/admin/dashboard']],
                ['label' => 'Разделы сайта' . $counter['menu'], 'encode' => false, 'icon' => 'fa fa-sitemap', 'url' => ['/admin/widget-menu']],
                ['label' => 'Материалы', 'icon' => 'fa fa-file-text', 'url' => '#', 'items' => [
                    ['label' => 'Категории' . $counter['category'], 'encode' => false, 'icon' => 'fa fa-list', 'url' => ['/admin/article-category']],
                    ['label' => 'Страницы' . $counter['page'], 'encode' => false, 'icon' => 'fa fa-file-text', 'url' => ['/admin/page']],
                    ['label' => 'Статьи' . $counter['article'], 'encode' => false, 'icon' => 'fa fa-file-text', 'url' => ['/admin/article']],
                    ['label' => 'Менеджер файлов' . $counter['file'], 'encode' => false, 'icon' => 'fa fa-file-image-o', 'url' => ['/admin/file-manager']],
                    ['label' => 'Текстовые блоки' . $counter['text'], 'encode' => false, 'icon' => 'fa fa-file-text-o', 'url' => ['/admin/widget-text']],
                    ['label' => 'Инфографика', 'encode' => false, 'icon' => 'fa fa-pie-chart', 'url' => ['/admin/graph-item']],
                    ['label' => 'Партнеры', 'encode' => false, 'icon' => 'fa fa-users', 'url' => ['/admin/partner']],
                ]],
                ['label' => 'Пользователи', 'icon' => 'fa fa-users', 'url' => '#', 'items' => [
                    ['label' => 'Список' . $counter['user'], 'encode' => false, 'icon' => 'fa fa-list', 'url' => ['/admin/user/index']],
                    ['label' => 'Права', 'encode' => false, 'icon' => 'fa fa-unlock', 'url' => ['/admin/user/permission']],
                ]],
                ['label' => 'Настройки' . $counter['settings'], 'encode' => false, 'icon' => 'fa fa-wrench', 'url' => ['/admin/settings']],
                ['label' => 'Система', 'icon' => 'fa fa-cogs', 'url' => '#', 'items' => [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    ['label' => 'Журнал событий' . $counter['log'], 'encode' => false, 'icon' => 'fa fa-tasks', 'url' => ['/admin/log'],],
                ]]
            ]
        ]) ?>
    </section>
</aside>
