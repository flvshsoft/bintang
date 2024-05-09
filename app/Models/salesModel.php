<?php

namespace App\Models;

use CodeIgniter\Model;

class salesModel extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id_sales';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_asset', 'id_branch', 'id_area', 'id_partner', 'km', 'keterangan', 'tgl_do', 'week'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}