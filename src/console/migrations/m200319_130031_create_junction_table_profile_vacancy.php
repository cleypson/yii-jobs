<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

/**
 * Class m200319_130031_create_junction_table_profile_vacancy
 */
class m200319_130031_create_junction_table_profile_vacancy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // create table junction profile_vacancy
        $this->createTable('profile_vacancy', [
            'profile_id' => Schema::TYPE_INTEGER,
            'vacancy_id' => Schema::TYPE_INTEGER,
            'created_at' => $this->dateTime(),
            'PRIMARY KEY(profile_id, vacancy_id)',
        ]);

        // create index for column profile_id
        $this->createIndex(
            'idx-profile_vacancy-profile_id',
            'profile_vacancy',
            'profile_id'
        );

        // add foreign key for table `profile`
        $this->addForeignKey(
            'fk-profile_vacancy-profile_id',
            'profile_vacancy',
            'profile_id',
            'profile',
            'id',
            'CASCADE'
        );

        // create index for column vacancy_id
        $this->createIndex(
            'idx-profile_vacancy-vacancy_id',
            'profile_vacancy',
            'vacancy_id'
        );

        // add foreign key for table `vacancy`
        $this->addForeignKey(
            'fk-profile_vacancy-vacancy_id',
            'profile_vacancy',
            'vacancy_id',
            'vacancy',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200319_130031_create_junction_table_profile_vacancy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200319_130031_create_junction_table_profile_vacancy cannot be reverted.\n";

        return false;
    }
    */
}
