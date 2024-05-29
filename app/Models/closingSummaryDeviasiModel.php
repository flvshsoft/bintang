<?php

namespace App\Models;

use CodeIgniter\Model;

class closingSummaryDeviasiModel extends Model
{
    protected $table = 'closing_summary_deviasi';
    protected $primaryKey = 'id_closing_summary_deviasi';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'week_summary_deviasi', 'keterangan', 'id_user', 'before_deviasi_modal', 'before_deviasi_jual', 'after_deviasi_modal', 'after_deviasi_jual'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
