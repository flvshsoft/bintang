<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPiutang extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'piutang_usaha',
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
        $this->forge->dropColumn('piutang_usaha', 'kode_supplier');
    }
}