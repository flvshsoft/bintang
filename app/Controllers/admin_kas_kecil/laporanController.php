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
            // ->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        $data['partner'] = $this->mdPartner
            //->where('id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/laporan/form_sisa', $data);
    }

    public function cetak_form_sisa()
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'REPORT TAGIHAN';
        $dt1 = $this->request->getPost("tgl_mulai");
        $dt2 =  $this->request->getPost("tgl_berakhir");
        $id_area =  $this->request->getPost("id_area");
        $id_partner = $this->request->getPost("id_partner");
        $data['model'] = $this->mdSales
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            // ->where('id_branch', Session('userData')['id_branch'])
            ->orderBY('id_nota', 'DESC')
            // ->where('nota.created_at >=', $dt1)
            // ->where('nota.created_at <=', $dt2)
            ->where('sales.id_area', $id_area)
            ->where('nota.id_partner', $id_partner)
            ->findAll();

        $data['info'] = $this->mdSales
            ->join('area', 'area.id_area=sales.id_area')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('nota', 'nota.id_sales=sales.id_sales')
            ->orderBY('id_nota', 'DESC')
            //  ->where('id_branch', Session('userData')['id_branch'])
            // ->where('nota.created_at >=', $dt1)
            // ->where('nota.created_at <=', $dt2)
            ->where('sales.id_area', $id_area)
            ->where('nota.id_partner', $id_partner)
            ->find();

        if (!empty($data['info'])) {
            $data['info'] = $data['info'][0];
        } else {
            $data['info'];
            return redirect()->to(base_url('/akk/laporan/form_sisa#kosong'));
            exit;
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin_kas_kecil/laporan/form_sisa/cetak_area', $data, []);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output($data['judul1'], 'I'); // opens in browser


        // print_r($data['model']);
        // exit;
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
