<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200312_133419_create_table_vacancy
 */
class m200312_133419_create_table_vacancy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'requeriments' => $this->text(),
            'salary_range' => $this->double(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vacancy');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200312_133419_create_table_vacancy cannot be reverted.\n";

        return false;
    }
    */
}
