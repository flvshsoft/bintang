<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterNotaClosing extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'nota',
            [
                'status_closing' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'after' => 'status',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('nota', 'status_closing');
    }
}
