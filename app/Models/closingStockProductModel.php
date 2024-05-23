<?php

namespace App\Models;

use CodeIgniter\Model;

class closingStockProductModel extends Model
{
    protected $table = 'closing_stock_product';
    protected $primaryKey = 'id_closing_stock_product';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'id_product', 'jumlah_stock_product', 'jumlah_penjualan_product', 'modal', 'harga_jual', 'total_jual', 'week_stock_product', 'id_user', 'satuan_product'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
