<?php

namespace App\Models;

use CodeIgniter\Model;

class assetModel extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'id_asset';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nama_asset', 'id_user', 'id_branch', 'jenis_asset', 'tahun_pembelian', 'no_plat', 'no_mesin', 'no_rangka', 'satuan', 'tgl_berakhir_kir', 'tgl_berakhir_pajak_stnk', 'tgl_service', 'tgl_berakhir_plat', 'pic', 'lokasi'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}