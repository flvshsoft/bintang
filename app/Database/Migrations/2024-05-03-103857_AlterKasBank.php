<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterKasBank extends Migration
{
    public function up()
    {
        $this->forge->addColumn('kas_bank', [
            'id_branch' => [
                'type' => 'INT', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                // Add other field attributes as needed
                'after' => 'uang_kas', // Specify the field to come after
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('kas_bank', 'id_branch');
    }
}
