<?php

namespace App\Models;

use CodeIgniter\Model;

class notaPutihSaveModel extends Model
{
    protected $table = 'nota_putih_save';
    protected $primaryKey = 'id_save_nota_putih';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'id_nota', 'id_user', 'id_sales', 'id_area', 'id_partner', 'minggu_nota_putih', 'total_beli', 'total_bayar'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
