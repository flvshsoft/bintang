<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingStockProduct extends Migration
{
    public function up()
    {
        // $this->forge->addField([
        //     'id_closing_stock_product' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'unsigned' => true,
        //         'auto_increment' => true,
        //     ],
        //     'id_branch' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'null' => true,
        //     ],
        //     'id_product' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //         'null' => true,
        //     ],
        //     'satuan_product' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => 111,
        //         'null' => true,
        //     ],
        //     'jumlah_stock_product' => [
        //         'type' => 'INT',
        //         'constraint' => 255,
        //         'null' => true,
        //     ],
        //     'jumlah_penjualan_product' => [
        //         'type' => 'INT',
        //         'constraint' => 255,
        //         'null' => true,
        //     ],
        //     'modal' => [
        //         'type' => 'INT',
        //         'constraint' => 255,
        //         'null' => true,
        //     ],
        //     'harga_jual' => [
        //         'type' => 'INT',
        //         'constraint' => 255,
        //         'null' => true,
        //     ],
        //     'total_jual' => [
        //         'type' => 'INT',
        //         'constraint' => 255,
        //         'null' => true,
        //     ],
        //     'week_stock_product' => [
        //         'type' => 'INT',
        //         'constraint' => 50,
        //         'null' => true,
        //     ],
        //     'id_user' => [
        //         'type' => 'INT',
        //         'constraint' => 11,
        //     ],
        //     'created_at' => [
        //         'type' => 'DATETIME',
        //     ],
        //     'updated_at' => [
        //         'type' => 'DATETIME',
        //     ],
        //     'deleted_at' => [
        //         'type' => 'DATETIME',
        //     ],
        // ]);

        // $this->forge->addPrimaryKey('id_closing_stock_product');
        // $this->forge->createTable('closing_stock_product');
    }

    public function down()
    {
      //  $this->forge->dropTable('closing_stock_product');
    }
}