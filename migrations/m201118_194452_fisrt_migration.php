<?php

use yii\db\Migration;

/**
 * Class m201118_194452_fisrt_migration
 */
class m201118_194452_fisrt_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
       
    $this->createTable('user', [
        'id' => $this->primaryKey(),
        'name' => $this->STRING(255)->notNull(),
        'status' => $this->boolean(),
        'create_at'=>$this->integer()
    ]);
      
    // $this->addColumn('user', 'email', $this->string(200)->notNull());


    $this->insert('user', [
        'id'=>'1',
        'name' => 'test',
        'status'=>'1',
        'create_at'=>'2020-11-21 03:50:21',
        'email'=>'test@example.com',
    ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }

   /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "m201118_194452_fisrt_migration cannot be reverted.\n";
        
        return false;
    }

    public function down()
    {
        echo "m201118_194452_fisrt_migration cannot be reverted.\n";

        return false;
    }
    */
}
