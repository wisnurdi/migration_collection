<?php

use yii\db\Migration;

/**
 * Class m171128_041426_surat
 */
class m171128_041426_surat extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%surat}}', [
            'id' => $this->primaryKey(),
            'tanggal' =>$this->dateTime(),
            'nomor' =>$this->string()->notNull(),
            'lampiran' => $this->string(),
            'hal' => $this->string(),
            'kepada' => $this->string(100),
            'ttd' => $this->string(100)->comment('Nama penanda tangan'),
            'dari' => $this->string(100)->comment('Jabatan pengirim surat'),
            'jenis' => $this->smallInteger(1)->notNull()->comment('1:surat masuk, 2: surat keluar'),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('1: dibuat, 2: disetujui'),
            'penerima' => $this->string(100),
            'created_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%surat}}');
    }
    
}
