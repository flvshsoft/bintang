<?php

namespace App\Models;

use CodeIgniter\Model;

class stockAkhirModel extends Model
{
    protected $table = 'stock_akhir';
    protected $primaryKey = 'id_stock_akhir';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_sales_do', 'id_product', 'jumlah_stock_kembali', 'satuan', 'created_by'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';

    // public function getLastIdNotaDetail()
    // {
    //     $lastIdNotaDetail = $this->db->table('nota_detail')
    //         ->selectMax('id_nota_detail')
    //         ->get()
    //         ->getRow();
    //     return $lastIdNotaDetail->id_nota_detail ?? 0;
    // }
}
