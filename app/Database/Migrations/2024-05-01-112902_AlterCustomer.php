<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterCustomer extends Migration
{
    public function up()
    {
        // ALTER TABLE `mutasi_bank`
        // ADD COLUMN `bank_tujuan` INT NULL AFTER `id_bank`;
        $this->forge->addColumn('customer', [
            'foto_toko' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true, // Set to true if the field can be NULL
                'after' => 'no_hp_customer', // Specify the field to come after
            ],
            'nama_owner' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'foto_toko', // Specify the field to come after
            ],
            'no_hp_owner' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'nama_owner', // Specify the field to come after
            ],
            'alamat_owner' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'no_hp_owner', // Specify the field to come after
            ],
            'payment_metode' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'alamat_owner', // Specify the field to come after
            ],
            'kab_kota' => [ // You should avoid using special characters like '/'
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'payment_metode', // Specify the field to come after
            ],
            'id_area' => [ // You should avoid using special characters like '/'
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'after' => 'kab_kota', // Specify the field to come after
            ],
            'data_lengkap' => [
                'type' => 'INT',
                'constraint' => 1, // Adjust the constraint as needed
                'null' => true,
                'after' => 'id_area', // Specify the field to come after
            ],
            'id_jenis_harga' => [
                'type' => 'INT', // Adjust the data type as needed
                'constraint' => 11, // Adjust the constraint as needed
                'null' => true,
                'after' => 'data_lengkap', // Specify the field to come after
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('customer', 'foto_toko');
        $this->forge->dropColumn('customer', 'nama_owner');
        $this->forge->dropColumn('customer', 'no_hp_owner');
        $this->forge->dropColumn('customer', 'alamat_owner');
        $this->forge->dropColumn('customer', 'payment_metode');
        $this->forge->dropColumn('customer', 'kab_kota');
        $this->forge->dropColumn('customer', 'id_area');
        $this->forge->dropColumn('customer', 'data_lengkap');
        $this->forge->dropColumn('customer', 'id_jenis_harga');
    }
}
