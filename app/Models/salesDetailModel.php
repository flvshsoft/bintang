<?php

namespace App\Models;

use CodeIgniter\Model;

class salesDetailModel extends Model
{
    protected $table = 'sales_detail';
    protected $primaryKey = 'id_sales_detail';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_sales', 'id_branch', 'id_product', 'satuan_sales_detail',  'jumlah_sales', 'id_price_detail'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
