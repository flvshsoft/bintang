<?php

namespace App\Models;

use CodeIgniter\Model;

class kasModel extends Model
{
    protected $table = 'kas_bank';
    protected $primaryKey = 'id_kas';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_sales', 'id_branch', 'id_konsumen', 'id_bank', 'id_user', 'metode_bayar', 'ket', 'uang_kas', 'minggu', 'pergantian_minggu'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
