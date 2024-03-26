<?php

namespace App\Models;

use CodeIgniter\Model;

class pengeluaran_kantorModel extends Model
{
    protected $table = 'pengeluaran_kantor';
    protected $primaryKey = 'id_pengeluaran_kantor';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['keterangan_pengeluaran_kantor', 'tgl_pengeluaran_kantor', 'created_by', 'approved_by', 'approved_date', 'id_branch', 'week_pengeluaran_kantor', 'biaya_pengeluaran_kantor', 'remark_pengeluaran_kantor'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
