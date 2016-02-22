<?php

use yii\db\Migration;

class m160222_061746_user extends Migration
{
    public function up()
    {
        if ($this->tableExists('user')) {
            throw new \yii\base\ErrorException('The table already exists.');
        }
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'authKey' => $this->string(32)->notNull(),
            'accessToken' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $time = time();
        $this->insert('user', [
            'username' => 'admin',
            'password' => Yii::$app->security->generatePasswordHash('admin'),
            'email' => 'admin@admin.com',
            'authKey' => '',
            'accessToken' => '',
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

    public function tableExists($tableName)
    {
        return in_array($tableName, Yii::$app->db->schema->tableNames);
    }
}
