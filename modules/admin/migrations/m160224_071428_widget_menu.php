<?php

use yii\db\Migration;

class m160224_071428_widget_menu extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%widget_menu}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(32)->notNull(),
            'title' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)
        ], $tableOptions);
        $this->createTable('{{%widget_menu_item}}', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->notNull(),
            'key' => $this->string(32)->notNull(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'options' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)
        ], $tableOptions);
        $this->addForeignKey('fk_item_menu', '{{%widget_menu_item}}', 'menu_id', '{{%widget_menu}}', 'id', 'cascade', 'cascade');

        $this->insert('{{%widget_menu}}', ['key' => 'main', 'title' => 'Главное меню', 'status' => 1]);
        $this->batchInsert('{{%widget_menu_item}}', ['menu_id', 'parent_id', 'key', 'title', 'url', 'options', 'status'], [
            [1, 0, 'home', 'Главная', '/', '{"class":"my-class", "data":"value"}', 1],
            [1, 0, 'home', 'О нас', '/about', '{"class":"my-class", "data":"value"}', 1],
            [1, 0, 'home', 'Контакты', '/contacts', '{"class":"my-class", "data":"value"}', 1],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_item_menu', '{{%widget_menu_item}}');
        $this->dropTable('{{%widget_menu_item}}');
        $this->dropTable('{{%widget_menu}}');
    }
}
