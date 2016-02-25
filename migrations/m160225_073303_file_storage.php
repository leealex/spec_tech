<?php

use yii\db\Migration;

class m160225_073303_file_storage extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%file_storage}}', [
            'id' => $this->primaryKey(),
            'base_url' => $this->string(1024)->notNull(),
            'path' => $this->string(1024)->notNull(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer()->notNull()
        ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('{{%file_storage}}');
    }
}
