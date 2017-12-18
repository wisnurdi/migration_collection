<?php

use yii\db\Migration;

/**
 * Class m171128_012749_create_table_biodata
 */
class m171128_012749_create_table_profil extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profil}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->unique(),
            'fullname' => $this->string()->notNull(),
            'birthdate' => $this->dateTime(),
            'sex' => $this->smallInteger(1)->notNull()->comment('1 Laki, 2 Perempuan'),
            'nip' => $this->string(18),
            'niplama' => $this->string(9),
            'picurl' => $this->string(),
            'phone' => $this->string(),
            'bio' => $this->text(),
            'wa' => $this->string(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('1 aktif, 2 tidak aktif'),
        ], $tableOptions);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-pro-user_id',
            '{{%profil}}',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-pro-user_id',
            '{{%profil}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-pro-user_id',
            '{{%profil%}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-pro-user_id',
            '{{%profil%}}'
        );

        $this->dropTable('{{%profil}}');
    }
}
