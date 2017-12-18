<?php

use yii\db\Migration;

/**
 * Class m171128_033801_create_table_gol_pns
 */
class m171128_033801_create_table_gol_pns extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gol_pns}}', [
            'id' => $this->primaryKey(2),
            'gol' => $this->string(5)->notNull()->unique(),
            'pangkat' => $this->string(32)->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%gol_pns}}',['id', 'gol', 'pangkat'], [
            ['11', 'I/a', 'Juru Muda'],
            ['12', 'I/b', 'Juru Muda Tingkat I'],
            ['13', 'I/c', 'Juru'],
            ['14', 'I/d', 'Juru Tingkat I'],
            ['21', 'II/a', 'Pengatur Muda'],
            ['22', 'II/b', 'Pengatur Muda Tingkat I'],
            ['23', 'II/c', 'Pengatur'],
            ['24', 'II/d', 'Pengatur Tingkat I'],
            ['31', 'III/a', 'Penata Muda'],
            ['32', 'III/b', 'Penata Muda Tingkat I'],
            ['33', 'III/c', 'Penata'],
            ['34', 'III/d', 'Penata Tingkat I'],
            ['41', 'IV/a', 'Pembina'],
            ['42', 'IV/b', 'Pembina Tingkat I'],
            ['43', 'IV/c', 'Pembina Utama Muda'],
            ['44', 'IV/d', 'Pembina Utama Madya'],
            ['45', 'IV/e', 'Pembina Utama'],
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%gol_pns}}');
    }
    
}
