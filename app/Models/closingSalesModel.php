<?php

namespace App\Models;

use CodeIgniter\Model;

class closingSalesModel extends Model
{
    protected $table = 'closing_sales';
    protected $primaryKey = 'id_cs';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_nota',  'id_sales', 'id_branch', 'week', 'kredit', 'cash'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
