<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $adminImg ?>/img/avatar.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $user->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
                    ['label' => 'Текстовые блоки', 'icon' => 'fa fa-file-text-o', 'url' => ['/admin/widget-text']],
                ]],
                ['label' => 'Пользователи', 'icon' => 'fa fa-user', 'url' => ['/admin/user']],
                ['label' => 'Система', 'icon' => 'fa fa-cogs', 'url' => '#', 'items' => [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                ]],
            ],
        ]) ?>

    </section>

</aside>
