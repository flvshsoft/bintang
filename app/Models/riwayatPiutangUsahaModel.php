<?php

namespace App\Models;

use CodeIgniter\Model;

class riwayatPiutangUsahaModel extends Model
{
    protected $table = 'piutang_usaha_riwayat';
    protected $primaryKey = 'id_piutang_usaha_riwayat';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_piutang_usaha', 'id_branch', 'id_user', 'id_supplier', 'id_bank', 'ket_riwayat', 'total', '', ''];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
