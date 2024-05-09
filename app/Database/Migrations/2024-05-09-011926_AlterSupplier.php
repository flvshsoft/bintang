<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterSupplier extends Migration
{
    public function up()
    {
        //  ALTER TABLE `supplier`
        // ADD COLUMN `created_at` DATETIME NULL AFTER `id_branch`,
        // ADD COLUMN `updated_at` DATETIME NULL AFTER `created_at`,
        // ADD COLUMN `deleted_at` DATETIME NULL AFTER `updated_at`;
        $this->forge->addColumn(
            'supplier',
            [
                'created_at' => [
                    'type' => 'DATETIME', // Use DATETIME type
                    'null' => true,
                    'after' => 'id_branch',
                ],
                'updated_at' => [
                    'type' => 'DATETIME', // Use DATETIME type
                    'null' => true,
                    'after' => 'created_at',
                ],
                'deleted_at' => [
                    'type' => 'DATETIME', // Use DATETIME type
                    'null' => true,
                    'after' => 'updated_at',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('supplier', 'created_at');
        $this->forge->dropColumn('supplier', 'updated_at');
        $this->forge->dropColumn('supplier', 'deleted_at');
    }
}
