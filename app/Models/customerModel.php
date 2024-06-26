<?php

namespace App\Models;

use CodeIgniter\Model;

class customerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_area', 'nama_customer',  'no_hp_customer', 'alamat_customer', 'id_branch', 'foto_toko', 'nama_owner',  'no_hp_owner', 'alamat_owner', 'payment_metode', 'kab_kota', 'id_area', 'data_lengkap', 'id_jenis_harga'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}