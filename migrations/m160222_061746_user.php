<?php

use app\modules\admin\models\User;
use yii\db\Migration;

class m160222_061746_user extends Migration
{
    public function up()
    {
        if ($this->tableExists('user')) {
            throw new \yii\base\ErrorException('The table already exists.');
        }
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(40)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(User::STATUS_ACTIVE),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at' => $this->integer(),
        ], $tableOptions);
        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'avatar_path' => $this->string(),
            'avatar_base_url' => $this->string(),
            'locale' => $this->string(32)->notNull(),
            'gender' => $this->smallInteger(1)
        ], $tableOptions);
        $this->addForeignKey('fk_user', '{{%user_profile}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $time = time();
        $this->insert('user', [
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'email' => 'admin@admin.com',
            'auth_key' => '',
            'access_token' => '',
            'created_at' => $time,
            'updated_at' => $time,
        ]);
    }

    public function down()
    {
        $this->dropForeignKey('fk_user', '{{%user_profile}}');
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user}}');
    }

    public function tableExists($tableName)
    {
        return in_array($tableName, Yii::$app->db->schema->tableNames);
    }
}
