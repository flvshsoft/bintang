<?php

namespace App\Models;

use CodeIgniter\Model;

class supplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'kode_supplier';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_supplier', 'nama_supplier',  'no_hp_supplier', 'alamat_supplier', 'id_branch', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
