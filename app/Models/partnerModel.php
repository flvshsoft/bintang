<?php

namespace App\Models;

use CodeIgniter\Model;

class partnerModel extends Model
{
    protected $table = 'partner';
    protected $primaryKey = 'id_partner';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nama_lengkap', 'id_branch', 'no_hp', 'alamat', 'set_karyawan', 'nik'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
