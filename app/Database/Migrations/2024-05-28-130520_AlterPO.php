<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPO extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'purchase_order',
            [
                'kode_supplier' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'after' => 'id_supplier',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('purchase_order', 'kode_supplier');
    }
}