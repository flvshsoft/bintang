<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterAsset extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'asset',
            [
                'tgl_service' => [
                    'type' => 'DATETIME', // Use DATETIME type
                    'null' => true,
                    'after' => 'lokasi_unit',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('asset', 'tgl_service');
    }
}
