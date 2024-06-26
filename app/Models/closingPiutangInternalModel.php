<?php

namespace App\Models;

use CodeIgniter\Model;

class closingPiutangInternalModel extends Model
{
    protected $table = 'closing_piutang_internal';
    protected $primaryKey = 'id_closing_piutang_internal';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['week_piutang_internal', 'id_branch', 'id_cabang', 'id_user', 'total_piutang_internal'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
