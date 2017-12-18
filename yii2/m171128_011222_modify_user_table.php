<?php

use yii\db\Migration;

/**
 * Class m171128_011222_modify_user_table
 */
class m171128_011222_modify_user_table extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%user}}', 'last_login', $this->integer()->after('status'));

    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'last_login');
    }
    
}
