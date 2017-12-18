<?php

use yii\db\Migration;

/**
 * Class m171128_042811_surat_tugas
 */
class m171128_042811_surat_tugas extends Migration
{   
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%surtug}}', [
            'id' => $this->primaryKey(),
            'tanggal' =>$this->dateTime(),
            'nomor' =>$this->string()->notNull(),
            'ttd' => $this->integer()->comment('Pejabat penanda tangan'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('1: diajukan, 2: ditandatangani, 9: dibatalkan'),
            'tujuan' => $this->string()->comment('Tujuan tugas'),
            'tgl_mulai' => $this->dateTime(),
            'tgl_selesai' => $this->dateTime(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
        $this->addCommentOnTable('{{%surtug}}', ('Tabel surat tugas'));
    }

    public function down()
    {
        $this->dropTable('{{%surtug}}');
    }
    
}
