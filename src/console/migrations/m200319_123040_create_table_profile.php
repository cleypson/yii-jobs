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
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'github_link' => $this->string(),
            'linkedin_link' => $this->string(),
            'resume_link' => $this->string(),
            'portfolio_link' => $this->string(),
            'phonenumber' => $this->string(),
            'note' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
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
        $this->dropForeignKey('fk-profile-user_id', 'profile');
        $this->dropIndex('idx-profile_id', 'profile');
        $this->dropTable('profile');
        return true;
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
