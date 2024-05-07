<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablePiutangUsaha extends Migration
{
    public function up()
    {
        $this->forge->addColumn('piutang_usaha', [
            'id_purchase_order_detail' => [
                'type' => 'INT', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                // Add other field attributes as needed
                'after' => 'id_branch', // Specify the field to come after
            ],
            'id_purchase_order' => [
                'type' => 'INT', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                // Add other field attributes as needed
                'after' => 'id_user', // Specify the field to come after
            ],
            'jenis' => [
                'type' => 'VARCHAR', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                // 'after' => 'id_purchase_order', // Specify the field to come after
                'constraint' => 111,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('piutang_usaha', 'id_purchase_order_detail');
        $this->forge->dropColumn('piutang_usaha', 'id_purchase_order');
        $this->forge->dropColumn('piutang_usaha', 'type');
    }
}