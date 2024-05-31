<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterKasBank extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'kas_bank',
            [
                'id_partner' => [
                    'type' => 'INT',
                    'null' => true,
                    'after' => 'id_sales',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('kas_bank', 'id_partner');
    }
}
