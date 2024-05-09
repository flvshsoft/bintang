<?php

namespace App\Models;

use CodeIgniter\Model;

class closingSalesBarangModel extends Model
{
    protected $table = 'closing_sales_barang';
    protected $primaryKey = 'id_csb';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch', 'id_product', 'id_sales', 'id_nota', 'week', 'payment_method', 'harga', 'qty'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}