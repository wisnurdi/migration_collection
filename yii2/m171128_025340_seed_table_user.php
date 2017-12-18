<?php

use yii\db\Migration;


/**
 * Class m171128_025340_seed_table_user
 */
class m171128_025340_seed_table_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->batchInsert('{{%user}}', ['username', 'email', 'password_hash', 'auth_key', 'created_at'],[
            [
                'admin',
                'admin@example.com',
                Yii::$app->security->generatePasswordHash('admin'),
                Yii::$app->security->generateRandomString(),
                time(),
            ],
            [
                'demo',
                'demo@example.com',
                Yii::$app->security->generatePasswordHash('demo'),
                Yii::$app->security->generateRandomString(),
                time(),
            ],

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('{{%user%}}', ['username' => 'admin']);
        $this->delete('{{%user%}}', ['username' => 'demo']);

    }
}
