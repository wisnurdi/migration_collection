<?php

use yii\db\Migration;

/**
 * Class m171215_075847_table_auth
 */
class m171215_075847_table_auth extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('auth', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'source' => $this->string()->notNull(),
            'source_id' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk-auth-user_id-user-id', 'auth', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('auth');
    }
    
}
