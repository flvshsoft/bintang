<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterMutasiBank extends Migration
{
    public function up()
    {
        // ALTER TABLE `mutasi_bank`
        // ADD COLUMN `bank_tujuan` INT NULL AFTER `id_bank`;
        $this->forge->addColumn('mutasi_bank', [
            'bank_tujuan' => [
                'type' => 'INT', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                // Add other field attributes as needed
                'after' => 'id_bank', // Specify the field to come after
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('mutasi_bank', 'bank_tujuan');
    }
}
