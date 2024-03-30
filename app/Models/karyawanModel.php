<?php

namespace App\Models;

use CodeIgniter\Model;

class karyawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nip', 'nama_karyawan', 'nik', 'no_hp', 'tempat_lahir', 'tanggal_lahir', 'domisili', 'jk', 'status', 'gol_darah', 'agama', 'posisi', 'jabatan', 'tamatan', 'instansi', 'jurusan', 'tgl_kerja', 'lama_kerja', 'id_branch', 'saldo_cuti', 'id_user', 'status_kawin', 'status_pekerjaan', 'salary', 'tunjangan', 'tgl_selesai_kerja', 'nilai_terakhir', 'tgl_sekolah', 'tgl_selesai_sekolah', 'schedule_set'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
