<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterWeek extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'week',
            [
                'id_branch' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'after' => 'status_closing',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('week', 'id_branch');
    }
}
