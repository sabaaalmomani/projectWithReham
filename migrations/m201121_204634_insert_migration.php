<?php

use yii\db\Migration;

/**
 * Class m201121_204634_insert_migration
 */
class m201121_204634_insert_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    $this->insert('user',[
        'id'=>'2',
        'name'=>'test2',
        'status'=>'1',
        'create_at'=>'2020-11-21 03:50:21',
        'email'=>'test2@example.com'
    ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201121_204634_insert_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201121_204634_insert_migration cannot be reverted.\n";

        return false;
    }
    */
}
