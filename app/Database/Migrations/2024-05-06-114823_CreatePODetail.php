<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePODetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_purchase_order_detail' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_purchase' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'id_product' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'bulan_week' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tahun_week' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_aktif' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_closing' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id_purchase_order_detail');
        $this->forge->createTable('purchase_order_detail');
    }

    public function down()
    {
        $this->forge->dropTable('purchase_order_detail');
    }
}