<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableProduct extends Migration
{
    public function up()
    {
        $this->forge->addColumn('product', [
            'harga_beli' => [
                'type' => 'INT', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                'after' => 'stock_product', // Specify the field to come after
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('product', 'harga_beli');
    }
}