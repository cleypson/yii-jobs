<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m200312_133430_alter_table_user
 */
class m200312_133430_alter_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'first_name', Schema::TYPE_STRING);
        $this->addColumn('user', 'last_name', Schema::TYPE_STRING);
        $this->addColumn('user', 'github_link', Schema::TYPE_STRING);
        $this->addColumn('user', 'linkedin_link', Schema::TYPE_STRING);
        $this->addColumn('user', 'resume_link', Schema::TYPE_STRING);
        $this->addColumn('user', 'portfolio_link', Schema::TYPE_STRING);
        $this->addColumn('user', 'phonenumber', Schema::TYPE_STRING);
        $this->addColumn('user', 'note', Schema::TYPE_TEXT);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200312_133430_alter_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200312_133430_alter_table_user cannot be reverted.\n";

        return false;
    }
    */
}
