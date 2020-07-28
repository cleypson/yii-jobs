<?php

use yii\db\Migration;

/**
 * Class m200402_132444_create_junction_table_profile_tag
 */
class m200402_132444_create_junction_table_profile_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // create table junction profile_tag
        $this->createTable('profile_tag', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer(),
            'profile_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // create index for column tag_id
        $this->createIndex(
            'idx-profile_tag-tag_id',
            'profile_tag',
            'tag_id'
        );

        // add foreign key for table `tag`
        $this->addForeignKey(
            'fk-profile_tag-tag_id',
            'profile_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );

        // create index for column profile_id
        $this->createIndex(
            'idx-profile_tag-profile_id',
            'profile_tag',
            'profile_id'
        );

        // add foreign key for table `profile`
        $this->addForeignKey(
            'fk-profile_tag-profile_id',
            'profile_tag',
            'profile_id',
            'profile',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-profile_tag-tag_id',
            'profile_tag'
        );
        $this->dropForeignKey(
            'fk-profile_tag-profile_id',
            'profile_tag'
        );
        $this->dropIndex(
            'idx-profile_tag-profile_id',
            'profile_tag'
        );
        $this->dropIndex(
            'idx-profile_tag-tag_id',
            'profile_tag'
        );
        $this->dropTable('profile_tag');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200402_132444_create_junction_table_profile_tag cannot be reverted.\n";

        return false;
    }
    */
}
