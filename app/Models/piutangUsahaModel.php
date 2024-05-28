<?php

namespace App\Models;

use CodeIgniter\Model;

class piutangUsahaModel extends Model
{
    protected $table = 'piutang_usaha';
    protected $primaryKey = 'id_piutang_usaha';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_user', 'id_cabang', 'minggu-ke', 'id_purchase_order_detail', 'jenis', 'id_purchase_order', 'id_supplier', 'nama_penghutang', 'tgl_piutang', 'id_branch', 'jumlah_piutang', 'type_piutang', 'status', 'kode_supplier'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getLastIdPiutangUsaha()
    {
        $lastIdPiutangUsaha = $this->db->table('piutang_usaha')
            ->selectMax('id_piutang_usaha')
            ->get()
            ->getRow();
        return $lastIdPiutangUsaha->id_piutang_usaha + 1 ?? 0;
    }
}