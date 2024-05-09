<?php

namespace App\Models;

use CodeIgniter\Model;

class pricedetailModel extends Model
{
    protected $table = 'price_detail';
    protected $primaryKey = 'id_price_detail';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_price', 'id_branch', 'id_barang', 'id_jenis_harga', 'harga', 'id_product'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}