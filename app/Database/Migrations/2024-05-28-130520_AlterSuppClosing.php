<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterSuppClosing extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'closing_piutang_supplier',
            [
                'kode_supplier' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'after' => 'id_supplier',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('closing_piutang_supplier', 'kode_supplier');
    }
}