<?php

use yii\db\Migration;

/**
 * Class m171218_083108_create_table_province
 */
class m171218_083108_create_table_province extends Migration
{
   
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%provinces}}', [
            'id' => $this->string(2),
            'name' => $this->string()->notNull(),
            'PRIMARY KEY(id)',
        ], $tableOptions);

        $this->batchInsert('{{%provinces}}',['id', 'name'], [
            ['11', 'ACEH'],
            ['12', 'SUMATERA UTARA'],
            ['13', 'SUMATERA BARAT'],
            ['14', 'RIAU'],
            ['15', 'JAMBI'],
            ['16', 'SUMATERA SELATAN'],
            ['17', 'BENGKULU'],
            ['18', 'LAMPUNG'],
            ['19', 'KEPULAUAN BANGKA BELITUNG'],
            ['21', 'KEPULAUAN RIAU'],
            ['31', 'DKI JAKARTA'],
            ['32', 'JAWA BARAT'],
            ['33', 'JAWA TENGAH'],
            ['34', 'DI YOGYAKARTA'],
            ['35', 'JAWA TIMUR'],
            ['36', 'BANTEN'],
            ['51', 'BALI'],
            ['52', 'NUSA TENGGARA BARAT'],
            ['53', 'NUSA TENGGARA TIMUR'],
            ['61', 'KALIMANTAN BARAT'],
            ['62', 'KALIMANTAN TENGAH'],
            ['63', 'KALIMANTAN SELATAN'],
            ['64', 'KALIMANTAN TIMUR'],
            ['65', 'KALIMANTAN UTARA'],
            ['71', 'SULAWESI UTARA'],
            ['72', 'SULAWESI TENGAH'],
            ['73', 'SULAWESI SELATAN'],
            ['74', 'SULAWESI TENGGARA'],
            ['75', 'GORONTALO'],
            ['76', 'SULAWESI BARAT'],
            ['81', 'MALUKU'],
            ['82', 'MALUKU UTARA'],
            ['91', 'PAPUA BARAT'],
            ['94', 'PAPUA'],
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%provinces}}');
    }
    
}
