<?php

namespace App\Models;

use CodeIgniter\Model;

class branchModel extends Model
{
    protected $table = 'branch';
    protected $primaryKey = 'id_branch';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nama_branch',  'cabang'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}