<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterWeeek extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'week',
            [
                'status_aktif' => [
                    'type' => 'INT',
                    'null' => true,
                    'after' => 'status_closing',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('week', 'status_aktif');
    }
}
