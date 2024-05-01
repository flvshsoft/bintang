<?php

namespace App\Models;

use CodeIgniter\Model;

class purchaseOrderModel extends Model
{
    protected $table = 'purchase_order';
    protected $primaryKey = 'id_purchase_order';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['keterangan_purchase_order', 'id_branch', 'id_user', 'id_supplier', 'minggu_purchase_order', 'status_purchase_order'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}