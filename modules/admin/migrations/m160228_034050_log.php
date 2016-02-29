<?php

use yii\base\InvalidConfigException;
use yii\db\Migration;
use yii\log\DbTarget;

class m160228_034050_log extends Migration
{
    /**
     * @var DbTarget[]
     */
    private $dbTargets = [];

    /**
     * @throws InvalidConfigException
     * @return DbTarget[]
     */
    protected function getDbTargets()
    {
        if ($this->dbTargets === []) {
            $log = Yii::$app->getLog();

            foreach ($log->targets as $target) {
                if ($target instanceof DbTarget) {
                    $this->dbTargets[] = $target;
                }
            }

            if ($this->dbTargets === []) {
                throw new InvalidConfigException('You should configure "log" component to use one or more database targets before executing this migration.');
            }
        }
        return $this->dbTargets;
    }

    public function up()
    {
        $targets = $this->getDbTargets();
        foreach ($targets as $target) {
            $this->db = $target->db;

            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable($target->logTable, [
                'id' => $this->bigPrimaryKey(),
                'level' => $this->integer(),
                'category' => $this->string(),
                'log_time' => $this->double(),
                'prefix' => $this->text(),
                'message' => $this->text(),
                'read' => $this->boolean()->defaultValue(false),
            ], $tableOptions);

            $this->createIndex('idx_log_level', $target->logTable, 'level');
            $this->createIndex('idx_log_category', $target->logTable, 'category');
        }
    }

    public function down()
    {
        $targets = $this->getDbTargets();
        foreach ($targets as $target) {
            $this->db = $target->db;

            $this->dropTable($target->logTable);
        }
    }
}
