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
                'id_cabang' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'after' => 'id_supplier',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('piutang_usaha', 'id_cabang');
    }
}
