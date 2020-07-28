<?php

use yii\db\Migration;

/**
 * Class m200402_131527_create_junction_table_vacancy_tag
 */
class m200402_131527_create_junction_table_vacancy_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // create table junction vacancy_tag
        $this->createTable('vacancy_tag', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer(),
            'vacancy_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // create index for column tag_id
        $this->createIndex(
            'idx-vacancy_tag-tag_id',
            'vacancy_tag',
            'tag_id'
        );

        // add foreign key for table `tag`
        $this->addForeignKey(
            'fk-vacancy_tag-tag_id',
            'vacancy_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );

        // create index for column vacancy_id
        $this->createIndex(
            'idx-vacancy_tag-vacancy_id',
            'vacancy_tag',
            'vacancy_id'
        );

        // add foreign key for table `vacancy`
        $this->addForeignKey(
            'fk-vacancy_tag-vacancy_id',
            'vacancy_tag',
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
        $this->dropForeignKey(
            'fk-vacancy_tag-tag_id',
            'vacancy_tag');
        $this->dropForeignKey(
            'fk-vacancy_tag-vacancy_id',
            'vacancy_tag');
        $this->dropIndex(
            'idx-vacancy_tag-vacancy_id',
            'vacancy_tag');
        $this->dropIndex(
            'idx-vacancy_tag-tag_id',
            'vacancy_tag');
        $this->dropTable('vacancy_tag');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200402_131527_create_junction_table_vacancy_tag cannot be reverted.\n";

        return false;
    }
    */
}