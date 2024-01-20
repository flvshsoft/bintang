<?php

namespace App\Models;

use CodeIgniter\Model;

class stockModel extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'id_stock';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_product',  'jumlah_stock', 'tanggal_masuk'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
