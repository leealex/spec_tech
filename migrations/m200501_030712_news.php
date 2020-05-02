<?php

use yii\db\Migration;

/**
 * Class m200501_030712_news
 */
class m200501_030712_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'slug' => $this->string(),
            'status' => $this->boolean(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $options);

        $this->createTable('{{%text_block}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'status' => $this->boolean(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200501_030712_news cannot be reverted.\n";

        return false;
    }
}
