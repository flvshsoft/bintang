<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPiutang1 extends Migration
{
    public function up()
    {
        $this->forge->addColumn(
            'piutang_usaha',
            [
                'jumlah_cicilan' => [
                    'type' => 'INT', // Use DATETIME type
                    'null' => true,
                    'after' => 'jumlah_piutang',
                ],
            ]
        );
    }

    public function down()
    {
        $this->forge->dropColumn('piutang_usaha', 'jumlah_cicilan');
    }
}