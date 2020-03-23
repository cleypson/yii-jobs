<?php

use yii\db\cubrid\Schema;
use yii\db\ForeignKeyConstraint;
use yii\db\Migration;

/**
 * Class m200319_123040_create_table_profile
 */
class m200319_123040_create_table_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profile', [
            'id' => 'pk',
            'user_id' => Schema::TYPE_INTEGER,
            'first_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,
            'github_link' => Schema::TYPE_STRING,
            'linkedin_link' => Schema::TYPE_STRING,
            'resume_link' => Schema::TYPE_STRING,
            'portfolio_link' => Schema::TYPE_STRING,
            'phonenumber' => Schema::TYPE_STRING,
            'note' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-profile-user_id',
            'profile',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // create index for column user_id
        $this->createIndex(
            'idx-profile_id',
            'profile',
            'user_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200319_123040_create_table_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200319_123040_create_table_profile cannot be reverted.\n";

        return false;
    }
    */
}
