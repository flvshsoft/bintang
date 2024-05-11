<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameWeek extends Migration
{
    public function up()
    {
        // Rename the column
        $this->forge->modifyColumn('week', [
            'status_aktif' => [
                'name' => 'status_week',
                'type' => 'INT',
                'constraint' => 1, // adjust according to your column type
            ]
        ]);
    }

    public function down()
    {
        // Revert the column name back to its original nam
    }
}
