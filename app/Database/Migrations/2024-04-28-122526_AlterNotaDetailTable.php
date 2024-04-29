<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterNotaDetailTable extends Migration
{
    public function up()
    {
        // ALTER TABLE `nota_detail`
        // ADD COLUMN `harga_nota` INT NULL AFTER `id_jenis_harga`;
        $this->forge->addColumn('nota_detail', [
            'harga_nota' => [
                'type' => 'INT', // Adjust the data type as per your requirement
                'null' => true, // Set to true if the field can be NULL
                // Add other field attributes as needed
                'after' => 'id_jenis_harga', // Specify the field to come after
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('nota_detail', 'harga_nota');
    }
}
