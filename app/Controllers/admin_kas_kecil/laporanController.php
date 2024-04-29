<?php

namespace App\Controllers\admin_kas_kecil;

class laporanController extends BaseController
{
    public function index(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'Bintang Distributor';
        return view('admin_kas_kecil/laporan/index', $data);
    }

    public function form_cost_ratio(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'COST & RATIO';
        return view('admin_kas_kecil/laporan/form_cost_ratio', $data);
    }

    public function form_report_assets(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'REPORT ASSETS';
        return view('admin_kas_kecil/laporan/form_report_assets', $data);
    }

    public function form_closing(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'CLOSING';
        return view('admin_kas_kecil/laporan/form_closing', $data);
    }

    public function form_closing_mingguan()
    {
        $data['judul'] = 'Bintang Distributor';
        $week = $this->request->getPost('week');
        $year = $this->request->getPost('year');
        $data['judul1'] = "LAPORAN CLOSING MINGGUAN KE-$week $year";
        $id_branch = SESSION('userData')['id_branch'];

        $data['nota_putih'] = $this->mdSales
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->where('sales.id_branch', $id_branch)
            ->findAll();

        $data['kontan_nota'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            ->findAll();

        $data['bank'] = $this->mdBank
            ->orderBY('nama_bank', 'ASC')
            ->where('id_branch', $id_branch)
            ->findAll();

        $data['piutang'] = $this->mdPiutangUsaha
            ->orderBY('tgl_piutang', 'ASC')
            //->groupBy('piutang_usaha.id_branch')
            ->where('type_piutang', 'Karyawan')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('branch', 'branch.id_branch=piutang_usaha.id_branch')
            ->findAll();
        $jumlah_piutang_ = 0;
        foreach ($data['piutang'] as $key => $value) {
            $value['jumlah_piutang'];
            $jumlah_piutang_ += $value['jumlah_piutang'];
        }
        $data['jumlah_piutang_'] = $jumlah_piutang_;


        $data['piutang_karyawan'] = $this->mdPiutangUsaha
            ->orderBY('tgl_piutang', 'ASC')
            //->groupBy('piutang_usaha.id_branch')
            ->where('type_piutang', 'Karyawan')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('branch', 'branch.id_branch=piutang_usaha.id_branch')
            ->findAll();
        $jumlah_piutang_karyawan = 0;
        foreach ($data['piutang'] as $key => $value) {
            $value['jumlah_piutang'];
            $jumlah_piutang_karyawan += $value['jumlah_piutang'];
        }
        $data['jumlah_piutang_karyawan'] = $jumlah_piutang_karyawan;


        $data['hutang_usaha'] = $this->mdPiutangUsaha
            ->orderBY('tgl_piutang', 'ASC')
            ->groupBy('supplier.id_supplier')
            ->where('type_piutang', 'Usaha')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->findAll();
        $jumlah_piutang_usaha = 0;
        foreach ($data['hutang_usaha'] as $key => $value) {
            $value['jumlah_piutang'];
            $jumlah_piutang_usaha += $value['jumlah_piutang'];
        }
        $data['jumlah_piutang_usaha'] = $jumlah_piutang_usaha;



        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin_kas_kecil/laporan/form_closing/mingguan', $data, []);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output($data['judul1'], 'I'); // opens in browser
    }

    public function form_closing_bulanan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'CLOSING';
        return view('admin_kas_kecil/laporan/form_closing/bulanan', $data);
    }

    public function form_closing_tahunan(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'CLOSING';
        return view('admin_kas_kecil/laporan/form_closing/tahunan', $data);
    }

    public function deposit(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LAPORAN KAS KECIL';
        return view('admin_kas_kecil/laporan/deposit', $data);
    }

    public function form_kas_kecil(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LAPORAN KAS KECIL';
        return view('admin_kas_kecil/laporan/form_kas_kecil', $data);
    }

    public function form_tertagih(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LAPORAN NOTA TERTAGIH';
        return view('admin_kas_kecil/laporan/form_tertagih', $data);
    }

    public function form_cetak_labarugi(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'CETAK  BUKTI PELUNASAN PIUTANG USAHA';
        return view('admin_kas_kecil/laporan/form_cetak_labarugi', $data);
    }

    public function form_sisa(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LAPORAN TAGIHAN PIUTANG USAHA';
        $data['area'] = $this->mdArea
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('id_nama_area', 'ASC')
            ->findAll();
        $data['partner'] = $this->mdPartner
            ->where('id_branch', Session('userData')['id_branch'])
            ->orderBy('nama_lengkap', 'ASC')
            ->findAll();
        return view('admin_kas_kecil/laporan/form_sisa', $data);
    }

    public function form_report_sales(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LAPORAN OMSET PENJUALAN';
        return view('admin_kas_kecil/laporan/form_report_sales', $data);
    }
    public function form_print_pengeluaran(): string
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'LAPORAN PENGELUARAN';
        return view('admin_kas_kecil/laporan/form_print_pengeluaran', $data);
    }
}
