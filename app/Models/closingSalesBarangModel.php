<?php

namespace App\Models;

use CodeIgniter\Model;

class closingSalesBarangModel extends Model
{
    protected $table = 'closing_sales_barang';
    protected $primaryKey = 'id_csb';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_nota',  'id_product', 'id_branch', 'week', 'qty', 'harga'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
