<?php

use yii\db\Migration;

/**
 * Class m171128_045958_surat_tugas_pegawai
 */
class m171128_045958_surat_tugas_pegawai extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%surtug_pegawai}}', [
            'id' => $this->primaryKey(),
            'surtug_id' => $this->integer(),
            'petugas' => $this->integer()->comment('Pegawai yang diberi tugas'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('1: pegawai, 2: anggota'),
            'created_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%surtug_pegawai}}');
    }
    
    
}
