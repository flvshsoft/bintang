<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPODETAIL extends Migration
{
    public function up()
    {
        //  ALTER TABLE `purchase_order_detail`
        // ADD COLUMN `created_at` DATETIME NULL AFTER `id_branch`,
        // ADD COLUMN `updated_at` DATETIME NULL AFTER `created_at`,
        // ADD COLUMN `deleted_at` DATETIME NULL AFTER `updated_at`;
        $this->forge->addColumn(
            'purchase_order_detail',
            [
                'jumlah_masuk' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'constraint' => 11,
                    'after' => 'jumlah_product',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('purchase_order_detail', 'created_at');
        $this->forge->dropColumn('purchase_order_detail', 'updated_at');
        $this->forge->dropColumn('purchase_order_detail', 'deleted_at');
    }
}
