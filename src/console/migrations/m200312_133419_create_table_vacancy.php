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
            'id' => 'pk',
            'title' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'requeriments' => Schema::TYPE_TEXT,
            'salary_range' => Schema::TYPE_DOUBLE,
            'status' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200312_133419_create_table_vacancy cannot be reverted.\n";

        return false;
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
