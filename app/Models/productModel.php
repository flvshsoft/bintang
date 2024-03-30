<?php

namespace App\Models;

use CodeIgniter\Model;

class productModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nama_product', 'id_branch',  'id_supplier', 'satuan_product', 'stock_product', 'area', 'defect', 'sample'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
