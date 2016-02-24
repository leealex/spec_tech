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
            'parent_id' => $this->integer()->notNull(),
            'key' => $this->string(32)->notNull(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'options' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)
        ], $tableOptions);
        $this->addForeignKey('fk_item_menu', '{{%widget_menu_item}}', 'parent_id', '{{%widget_menu}}', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_article_attachment_article', '{{%article_attachment}}');
        $this->dropTable('{{%widget_menu_item}}');
        $this->dropTable('{{%widget_menu}}');
    }
}
