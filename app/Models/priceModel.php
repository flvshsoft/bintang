<?php

namespace App\Models;

use CodeIgniter\Model;

class priceModel extends Model
{
    protected $table = 'price';
    protected $primaryKey = 'id_price';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['keterangan_price', 'id_branch', 'tanggal_aktif', 'created_by'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}