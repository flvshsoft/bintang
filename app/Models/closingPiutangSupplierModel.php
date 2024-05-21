<?php

namespace App\Models;

use CodeIgniter\Model;

class closingPiutangSupplierModel extends Model
{
    protected $table = 'closing_piutang_supplier';
    protected $primaryKey = 'id_closing_piutang_supplier';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['week_piutang_supplier', 'id_branch', 'id_supplier', 'id_user', 'total_piutang_supplier'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}