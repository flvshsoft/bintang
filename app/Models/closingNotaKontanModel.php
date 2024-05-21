<?php

namespace App\Models;

use CodeIgniter\Model;

class closingNotaKontanModel extends Model
{
    protected $table = 'closing_nota_kontan';
    protected $primaryKey = 'id_closing_nota_kontan';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['week_kontan', 'id_branch', 'id_partner', 'id_user', 'total_tertagih', 'total_kontan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}