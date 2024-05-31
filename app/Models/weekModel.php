<?php

namespace App\Models;

use CodeIgniter\Model;

class weekModel extends Model
{
    protected $table = 'week';
    protected $primaryKey = 'id_week';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_user', 'id_branch', 'nama_week', 'bulan_week', 'bulan', 'tahun_week', 'status_week', 'status_closing', 'status_aktif'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
