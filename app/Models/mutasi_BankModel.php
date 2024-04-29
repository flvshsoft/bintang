<?php

namespace App\Models;

use CodeIgniter\Model;

class mutasi_BankModel extends Model
{
    protected $table = 'mutasi_bank';
    protected $primaryKey = 'id_mutasi_bank';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_bank', 'bank_tujuan', 'tgl_mutasi_bank', 'user', 'approved_by', 'type_mutasi_bank', 'week_mutasi_bank', 'biaya_mutasi_bank', 'remark_mutasi_bank', 'id_branch'];
    //protected $allowedFields =  ['id_bank', 'id_user', 'keterangan_mutasi', 'jumlah_uang', 'minggu_ke', 'type_mutasi'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
