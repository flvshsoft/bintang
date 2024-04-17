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
            //->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->where('sales.id_branch', $id_branch)
            //->orderBY('id_nota', 'DESC')
            ->findAll();

        $data['kontan_nota'] = $this->mdNota
            //  ->join('area', 'area.id_area=sales.id_area')
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->orderBY('id_nota', 'DESC')
            ->where('nota.id_branch', $id_branch)
            ->findAll();

        $data['bank'] = $this->mdBank
            ->orderBY('nama_bank', 'ASC')
            ->where('id_branch', $id_branch)
            ->findAll();
        // if (!empty($data['info'])) {
        //     $data['info'] = $data['info'][0];
        // } else {
        //     $data['info'];
        //     return redirect()->to(base_url('/akk/laporan/form_closing/mingguan#kosong'));
        //     exit;
        // }

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
