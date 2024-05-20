<?php

namespace App\Models;

use CodeIgniter\Model;

class closingPiutangKaryawanModel extends Model
{
    protected $table = 'closing_piutang_karyawan';
    protected $primaryKey = 'id_closing_piutang_karyawan';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['week_piutang_karyawan', 'id_branch', 'nama_karyawan', 'id_user', 'total_piutang_karyawan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}