<?php
/**
 * @var $user \app\modules\admin\models\User
 * @var $adminImg string
 */

?>
<aside class="main-sidebar">
  <section class="sidebar">
      <?= dmstr\widgets\Menu::widget([
          'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
          'items' => [
              ['label' => 'Главная', 'icon' => 'home', 'url' => ['/admin/dashboard']],
              ['label' => 'Разделы сайта', 'icon' => 'sitemap', 'url' => ['/admin/widget-menu']],
              ['label' => 'Контент', 'icon' => 'file-text', 'url' => '#', 'items' => [
                  ['label' => 'Категории', 'icon' => 'list', 'url' => ['article-category/index'],
                      'active' => $this->context->id === 'article-category'],
                  ['label' => 'Статьи', 'icon' => 'file-text', 'url' => ['article/index'],
                      'active' => $this->context->id === 'article'],
                  ['label' => 'Новости', 'icon' => 'file-text', 'url' => ['news/index'],
                      'active' => $this->context->id === 'news'],
                  ['label' => 'Текстовые блоки', 'icon' => 'file-text-o', 'url' => ['text-block/index'],
                      'active' => $this->context->id === 'text-block'],
                  ['label' => 'Инфографика', 'icon' => 'pie-chart', 'url' => ['graph-item/index'],
                      'active' => $this->context->id === 'graph-item'],
                  ['label' => 'Партнеры', 'icon' => 'users', 'url' => ['partner/index'],
                      'active' => $this->context->id === 'partner'],
              ]],
              ['label' => 'Менеджер файлов', 'icon' => 'file-image-o', 'url' => ['/admin/file-manager']],
              ['label' => 'Пользователи', 'icon' => 'users', 'url' => '#', 'items' => [
                  ['label' => 'Список', 'icon' => 'list', 'url' => ['/admin/user/index']],
                  ['label' => 'Права', 'icon' => 'unlock', 'url' => ['/admin/user/permission']],
              ]],
              ['label' => 'Настройки', 'icon' => 'wrench', 'url' => ['/admin/settings']],
              ['label' => 'Система', 'icon' => 'cogs', 'url' => '#', 'items' => [
                  ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                  ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                  ['label' => 'Журнал событий', 'icon' => 'tasks', 'url' => ['/admin/log']],
                  ['label' => 'CLI Commands', 'icon' => 'terminal', 'url' => ['/admin/cli']],
              ]]
          ]
      ]) ?>
  </section>
</aside>
