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
            'items' => [
                ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/dashboard']],
                ['label' => 'Разделы сайта' . $counter['menu'], 'encode' => false, 'icon' => 'sitemap', 'url' => ['/admin/widget-menu']],
                ['label' => 'Материалы', 'icon' => 'file-text', 'url' => '#', 'items' => [
                    ['label' => 'Категории' . $counter['category'], 'encode' => false, 'icon' => 'list', 'url' => ['/admin/article-category']],
                    ['label' => 'Страницы' . $counter['page'], 'encode' => false, 'icon' => 'file-text', 'url' => ['/admin/page']],
                    ['label' => 'Статьи и Новости' . $counter['article'], 'encode' => false, 'icon' => 'file-text', 'url' => ['/admin/article']],
                    ['label' => 'Текстовые блоки' . $counter['text'], 'encode' => false, 'icon' => 'file-text-o', 'url' => ['/admin/widget-text']],
                    ['label' => 'Инфографика', 'encode' => false, 'icon' => 'pie-chart', 'url' => ['/admin/graph-item']],
                    ['label' => 'Партнеры', 'encode' => false, 'icon' => 'users', 'url' => ['/admin/partner']],
                ]],
                ['label' => 'Менеджер файлов' . $counter['file'], 'encode' => false, 'icon' => 'file-image-o', 'url' => ['/admin/file-manager']],
                ['label' => 'Пользователи', 'icon' => 'users', 'url' => '#', 'items' => [
                    ['label' => 'Список' . $counter['user'], 'encode' => false, 'icon' => 'list', 'url' => ['/admin/user/index']],
                    ['label' => 'Права', 'encode' => false, 'icon' => 'unlock', 'url' => ['/admin/user/permission']],
                ]],
                ['label' => 'Настройки' . $counter['settings'], 'encode' => false, 'icon' => 'wrench', 'url' => ['/admin/settings']],
                ['label' => 'Система', 'icon' => 'cogs', 'url' => '#', 'items' => [
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Журнал событий' . $counter['log'], 'encode' => false, 'icon' => 'tasks', 'url' => ['/admin/log']],
                    ['label' => 'CLI Commands', 'encode' => false, 'icon' => 'terminal', 'url' => ['/admin/cli']],
                ]]
            ]
        ]) ?>
    </section>
</aside>
