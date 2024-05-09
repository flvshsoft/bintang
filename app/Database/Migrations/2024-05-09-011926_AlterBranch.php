<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterBranch extends Migration
{
    public function up()
    {
        //  ALTER TABLE `supplier`
        // ADD COLUMN `created_at` DATETIME NULL AFTER `id_branch`,
        // ADD COLUMN `updated_at` DATETIME NULL AFTER `created_at`,
        // ADD COLUMN `deleted_at` DATETIME NULL AFTER `updated_at`;
        $this->forge->addColumn(
            'branch',
            [
                'created_at' => [
                    'type' => 'DATETIME', // Use DATETIME type
                    'null' => true,
                ],
                // 'updated_at' => [
                //     'type' => 'DATETIME', // Use DATETIME type
                //     'null' => true,
                //     // 'after' => 'created_at',
                // ],
                'deleted_at' => [
                    'type' => 'DATETIME', // Use DATETIME type
                    'null' => true,
                    //  'after' => 'updated_at',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('branch', 'created_at');
        $this->forge->dropColumn('branch', 'updated_at');
        $this->forge->dropColumn('branch', 'deleted_at');
    }
}