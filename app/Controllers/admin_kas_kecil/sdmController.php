<?php

namespace App\Controllers\admin_kas_kecil;

//require FCPATH.'vendor/autoload.php';

use CodeIgniter\Session\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class sdmController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        return view('admin_kas_kecil/sdm/index', $data);
    }

    public function master_cuti(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'WAITING LIST APPROVAL CUTI';
        return view('admin_kas_kecil/sdm/master_cuti/index', $data);
    }

    public function master_riwayat_cuti(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LOG CUTI KARYAWAN';
        return view('admin_kas_kecil/sdm/master_cuti/master_riwayat_cuti/index', $data);
    }

    public function master_izin(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'WAITING LIST APPROVAL WORK OFF PERMISSION';
        return view('admin_kas_kecil/sdm/master_izin/index', $data);
    }

    public function master_riwayat_izin(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LOG IZIN KARYAWAN';
        return view('admin_kas_kecil/sdm/master_izin/master_riwayat_izin/index', $data);
    }

    public function karyawan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'MASTER DATA KARYAWAN';
        $data['model'] = $this->mdKaryawan
            //->join('user', 'user.id_user=karyawan.id_user')
            ->where('karyawan.id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/sdm/master_employee/index', $data);
    }

    public function karyawan_tambah(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INFORMATION EMPLOYEE';
        return view('admin_kas_kecil/sdm/master_employee/tambah', $data);
    }

    public function karyawan_input()
    {
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nik' => $this->request->getPost('nik'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
            'no_hp' => $this->request->getPost('no_hp'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'domisili' => $this->request->getPost('domisili'),
            'jk' => $this->request->getPost('jk'),
            'status' => $this->request->getPost('status'),
            'gol_darah' => $this->request->getPost('gol_darah'),
            'agama' => $this->request->getPost('agama'),
            'posisi' => $this->request->getPost('posisi'),
            'jabatan' => $this->request->getPost('jabatan'),
            'tamatan' => $this->request->getPost('tamatan'),
            'instansi' => $this->request->getPost('instansi'),
            'jurusan' => $this->request->getPost('jurusan'),
            'tgl_kerja' => $this->request->getPost('tgl_kerja'),
            'lama_kerja' => $this->request->getPost('lama_kerja'),
            'saldo_cuti' => $this->request->getPost('saldo_cuti'),
            'status_kawin' => $this->request->getPost('status_kawin'),
            'status_pekerjaan' => $this->request->getPost('status_pekerjaan'),
            'salary' => $this->request->getPost('salary'),
            'tunjangan' => $this->request->getPost('tunjangan'),
            'tgl_selesai_kerja' => $this->request->getPost('tgl_selesai_kerja'),
            'nilai_terakhir' => $this->request->getPost('nilai_terakhir'),
            'tgl_sekolah' => $this->request->getPost('tgl_sekolah'),
            'tgl_selesai_sekolah' => $this->request->getPost('tgl_selesai_sekolah'),
            'schedule_set' => $this->request->getPost('schedule_set'),
        ];
        // print_r($data);
        // exit;
        $this->mdKaryawan->insert($data);
        return redirect()->to(base_url('/akk/karyawan'));
    }

    public function hapus($id_karyawan)
    {
        $delete = $this->mdKaryawan->delete($id_karyawan);
        if ($delete) {
            return redirect()->to(base_url('/akk/karyawan'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }

    public function karyawan_edit($id_karyawan)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Data Karyawan';
        $data['model'] = $this->mdKaryawan
            ->where('id_karyawan', $id_karyawan)
            ->find()[0];
        return view('admin_kas_kecil/sdm/master_employee/edit', $data);
    }

    public function karyawan_update()
    {
        $id_karyawan = $this->request->getPost('id_karyawan');
        $data = [
            'id_karyawan' => $id_karyawan,
            'nip' => $this->request->getPost('nip'),
            'nik' => $this->request->getPost('nik'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'id_branch' => Session('userData')['id_branch'],
            'id_user' => Session('userData')['id_user'],
            'no_hp' => $this->request->getPost('no_hp'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'domisili' => $this->request->getPost('domisili'),
            'jk' => $this->request->getPost('jk'),
            'status' => $this->request->getPost('status'),
            'gol_darah' => $this->request->getPost('gol_darah'),
            'agama' => $this->request->getPost('agama'),
            'posisi' => $this->request->getPost('posisi'),
            'jabatan' => $this->request->getPost('jabatan'),
            'tamatan' => $this->request->getPost('tamatan'),
            'instansi' => $this->request->getPost('instansi'),
            'jurusan' => $this->request->getPost('jurusan'),
            'tgl_kerja' => $this->request->getPost('tgl_kerja'),
            'lama_kerja' => $this->request->getPost('lama_kerja'),
            'saldo_cuti' => $this->request->getPost('saldo_cuti'),
            'status_kawin' => $this->request->getPost('status_kawin'),
            'status_pekerjaan' => $this->request->getPost('status_pekerjaan'),
            'salary' => $this->request->getPost('salary'),
            'tunjangan' => $this->request->getPost('tunjangan'),
            'tgl_selesai_kerja' => $this->request->getPost('tgl_selesai_kerja'),
            'nilai_terakhir' => $this->request->getPost('nilai_terakhir'),
            'tgl_sekolah' => $this->request->getPost('tgl_sekolah'),
            'tgl_selesai_sekolah' => $this->request->getPost('tgl_selesai_sekolah'),
            'schedule_set' => $this->request->getPost('schedule_set'),
        ];
        $this->mdKaryawan->save($data);
        return redirect()->to(base_url('/akk/karyawan'));
    }

    public function edit_general(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INFORMATION EMPLOYEE';
        return view('admin_kas_kecil/sdm/master_employee/edit', $data);
    }

    public function report_data_karyawan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INFORMATION EMPLOYEE';
        return view('admin_kas_kecil/sdm/master_employee/pdf', $data);
    }

    public function export_data_karyawan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'INFORMATION EMPLOYEE';
        $dataKaryawan = [
            ['Nama', 'Jabatan', 'Gaji'],
            ['John Doe', 'Manager', '5000'],
            ['Jane Doe', 'Staff', '3000'],
            // ... tambahkan data karyawan lainnya
        ];

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Ambil active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Masukkan data ke dalam sheet
        $sheet->fromArray($dataKaryawan, null, 'A1');

        // Buat objek writer
        $writer = new Xlsx($spreadsheet);

        // Set nama file
        $filename = 'export_data_karyawan.xlsx';

        // Set header untuk download file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Tulis file Excel ke output buffer
        $writer->save('php://output');

        exit();
    }
    public function master_absen_gaji(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'REKAP DATA ABSENSI KARYAWAN';
        return view('admin_kas_kecil/sdm/master_absen_gaji/index', $data);
    }

    public function master_perbaikan_absen(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'PERBAIKAN ABSEN';
        return view('admin_kas_kecil/sdm/master_absen_gaji/master_perbaikan_absen/index', $data);
    }

    public function form_absensi(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'CETAK ABSENSI KARYAWAN';
        return view('admin_kas_kecil/sdm/master_absen_gaji/cetak_absensi/index', $data);
    }

    public function master_absen(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'DATA LOG ABSENSI KARYAWAN';
        return view('admin_kas_kecil/sdm/master_absen/index', $data);
    }
}