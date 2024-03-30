<?php

namespace App\Models;

use CodeIgniter\Model;

class supplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nama_supplier',  'no_hp_supplier', 'alamat_supplier'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
