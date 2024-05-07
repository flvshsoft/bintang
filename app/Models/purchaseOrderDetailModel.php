<?php

namespace App\Models;

use CodeIgniter\Model;

class purchaseOrderDetailModel extends Model
{
    protected $table = 'purchase_order_detail';
    protected $primaryKey = 'id_purchase_order_detail';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_purchase_order', 'id_product', 'jumlah_product', 'harga_beli', 'minggu', ''];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';
}