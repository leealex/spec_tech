<?php

use yii\db\Migration;

class m160228_034106_settings extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        }
        $this->createTable('{{%settings}}', [
            'key' => $this->string(128)->notNull(),
            'value' => $this->text()->notNull(),
            'comment' => $this->text(),
            'editable' => $this->boolean()->defaultValue(true),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()
        ], $tableOptions);
        $this->addPrimaryKey('pk_key_settings', '{{%settings}}', 'key');
        $this->createIndex('idx_key_settings', '{{%settings}}', 'key', true);
        $time = time();
        $this->batchInsert('{{%settings}}', ['key', 'value', 'comment', 'editable', 'created_at', 'updated_at'], [
            ['siteName', 'Yii', 'Название сайта', false, $time, $time],
            ['adminEmail', 'admin@example.com', 'Email администратора сайта', false, $time, $time],
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%settings}}');

    }
}
