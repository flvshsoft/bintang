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
        $data['model'] = $this->mdWeek
            ->join('user', 'user.id_user=week.id_user', 'left')
            ->where('week.id_branch', Session('userData')['id_branch'])
            ->where('week.status_closing', 0)
            ->findAll();
        return view('admin_kas_kecil/laporan/form_closing', $data);
    }

    public function form_closing_mingguan()
    {
        $data['judul'] = 'Bintang Distributor';
        $week = $this->request->getPost('week');
        $year = $this->request->getPost('year');
        $data['judul1'] = "LAPORAN CLOSING MINGGUAN KE-$week $year";
        $id_branch = SESSION('userData')['id_branch'];

        // Nota Putih
        // $data['nota_putih'] = $this->mdSales
        //     ->join('partner', 'partner.id_partner=sales.id_partner')
        //     ->where('sales.id_branch', $id_branch)
        //     ->findAll();
        $data['nota_putih'] = $this->mdNotaPutihSalesmanSave
            ->join('partner', 'partner.id_partner=nota_putih_salesman_save.id_partner')
            // ->join('sales', 'sales.id_sales=nota_putih_salesman_save.id_sales')
            ->where('nota_putih_salesman_save.minggu_nota_putih', $week)
            ->where('nota_putih_salesman_save.id_branch', $id_branch)
            // ->where('YEAR(nota.created_at)', $year)
            // ->where('nota.status !=', 'Lunas')
            // ->orderBY('partner.nama_lengkap', 'ASC')
            ->groupBy('partner.id_partner')
            ->findAll();

        // print_r($data);
        // exit;

        // Nota
        $data['kontan_nota'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            ->where('sales.week', $week)
            ->where('YEAR(nota.created_at)', $year)
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
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            // ->where('type_piutang', 'Usaha')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->orderBY('tgl_piutang', 'ASC')
            ->groupBy('supplier.id_supplier')
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

    public function form_closing_bulanan()
    {
        $data['judul'] = 'Bintang Distributor';
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');
        $data['judul1'] = "LAPORAN CLOSING BULAN $month $year";
        $id_branch = SESSION('userData')['id_branch'];

        // Nota Putih
        $data['nota_putih'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            ->where('nota.status !=', 'Lunas')
            ->groupBy('partner.id_partner')
            ->findAll();

        // Nota
        $data['kontan_nota'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            ->where('YEAR(nota.created_at)', $year)
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
        $html = view('admin_kas_kecil/laporan/form_closing/bulanan', $data, []);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output($data['judul1'], 'I'); // opens in browser
    }

    public function form_closing_tahunan()
    {
        $data['judul'] = 'Bintang Distributor';
        $data['judul1'] = 'CLOSING';
        $data['judul'] = 'Bintang Distributor';
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');
        $data['judul1'] = "LAPORAN CLOSING BULAN $month $year";
        $id_branch = SESSION('userData')['id_branch'];

        // Nota Putih
        $data['nota_putih'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            ->where('nota.status !=', 'Lunas')
            ->groupBy('partner.id_partner')
            ->findAll();

        // Nota
        $data['kontan_nota'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            ->where('YEAR(nota.created_at)', $year)
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
        $html = view('admin_kas_kecil/laporan/form_closing/tahunan', $data, []);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output($data['judul1'], 'I'); // opens in browser
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

    public function closing_mingguan()
    {
        $week = $this->request->getPost('week');
        $year = $this->request->getPost('year');
        $data['week'] = $week;
        $data['year'] = $year;
        $data['judul'] = "Closing Mingguan KE-$week";
        $data['judul1'] = "LAPORAN CLOSING MINGGUAN KE-$week $year";
        $id_branch = SESSION('userData')['id_branch'];

        // Nota Putih
        $data['nota_putih'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            // ->where('nota.status !=', 'Lunas')
            // ->where('total_beli !=', 0)
            ->findAll();

        // Kontan Nota
        $data['kontan_nota'] = $this->mdNota
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->join('partner', 'partner.id_partner=sales.id_partner')
            ->join('area', 'area.id_area=sales.id_area')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            //  ->where('sales.week', $week)
            // ->where('total_beli !=', 0)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            ->orderBY('id_nota', 'DESC')
            // ->groupBY('partner.id_partner', 'DESC')
            ->findAll();

        //piutang internal
        $data['piutang_internal'] = $this->mdPiutangUsaha
            ->where('type_piutang', 'Internal')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('branch', 'branch.id_branch=piutang_usaha.id_cabang')
            ->findAll();
        $jumlah_piutang_internal = 0;
        foreach ($data['piutang_internal'] as $key => $value) {
            $value['jumlah_piutang'];
            $jumlah_piutang_internal += $value['jumlah_piutang'];
        }
        $data['jumlah_piutang_internal'] = $jumlah_piutang_internal;

        //piutang karyawan
        $data['piutang_karyawan'] = $this->mdPiutangUsaha
            ->where('type_piutang', 'Karyawan')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('branch', 'branch.id_branch=piutang_usaha.id_branch')
            ->findAll();
        $jumlah_piutang_karyawan = 0;
        foreach ($data['piutang_karyawan'] as $key => $value) {
            $value['jumlah_piutang'];
            $jumlah_piutang_karyawan += $value['jumlah_piutang'];
        }
        $data['jumlah_piutang_karyawan'] = $jumlah_piutang_karyawan;

        //hutang usaha
        $data['hutang_usaha'] = $this->mdPiutangUsaha
            ->groupBy('supplier.id_supplier')
            ->where('type_piutang', 'Usaha')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->findAll();

        $total_piutang_usaha = 0;
        $jumlah_piutang_usaha = 0;
        foreach ($data['hutang_usaha'] as $key => $value) {
            $value['jumlah_piutang'];
            $jumlah_piutang_usaha += $value['jumlah_piutang'];
        }
        $data['jumlah_piutang_usaha'] = $jumlah_piutang_usaha;
        $total_piutang_usaha += $jumlah_piutang_usaha;

        //stock barang
        $data['product'] = $this->mdProduct
            ->select('product.*, barang_harga.harga_aktif, SUM(satuan_penjualan) AS qty, nota_detail.harga_nota, nota_detail.satuan_penjualan')
            ->join('nota_detail', 'nota_detail.id_product= product.id_product')
            ->join('nota', 'nota.id_nota = nota_detail.id_nota')
            ->join('barang_harga', 'barang_harga.id_product= product.id_product')
            ->where('product.id_branch', $id_branch)
            ->where('barang_harga.id_jenis_harga', 2)
            ->groupBy('product.id_product')
            ->findAll();

        //stock salesman
        $data['salesman_'] = $this->mdProduct
            // ->select('product.*, barang_harga.harga_aktif, nota.payment_method, SUM(satuan_penjualan) AS qty')
            ->select('product.*, barang_harga.harga_aktif, 
              SUM(CASE WHEN nota.payment_method = "CASH" THEN nota_detail.satuan_penjualan ELSE 0 END) AS qty_cash,
              SUM(CASE WHEN nota.payment_method = "KREDIT" THEN nota_detail.satuan_penjualan ELSE 0 END) AS qty_kredit')
            ->join('nota_detail', 'nota_detail.id_product = product.id_product')
            ->join('nota', 'nota.id_nota = nota_detail.id_nota')
            ->join('barang_harga', 'barang_harga.id_product = product.id_product')
            ->where('product.id_branch', $id_branch)
            ->where('barang_harga.id_jenis_harga', 2)
            ->groupBy('product.id_product, barang_harga.harga_aktif')
            ->findAll();

        //pengeluaran kantor
        $data['pengeluaran_kantor'] = $this->mdPengeluaranKantor
            ->where('pengeluaran_kantor.id_branch', $id_branch)
            ->findAll();

        $biaya_pengeluaran_kantor = 0;
        foreach ($data['pengeluaran_kantor'] as $key => $value) {
            $biaya_pengeluaran_kantor += $value['biaya_pengeluaran_kantor'];
        }
        $data['biaya_pengeluaran_kantor'] = $biaya_pengeluaran_kantor;

        //pengeluaran sales
        $data['pengeluaran_sales'] = $this->mdPengeluaranDetailSales
            ->where('pengeluaran_detail_sales.id_branch', $id_branch)
            ->findAll();

        $nominal = 0;
        foreach ($data['pengeluaran_sales'] as $key => $value) {
            $nominal += $value['nominal'];
        }
        $data['nominal'] = $nominal;

        $total_bop = $nominal + $biaya_pengeluaran_kantor;
        $data['total_bop'] = $total_bop;

        $data['bank'] = $this->mdBank
            ->orderBY('nama_bank', 'ASC')
            ->where('id_branch', $id_branch)
            ->findAll();

        $total_saldo_bank = 0;
        $saldo_bank = 0;
        foreach ($data['bank'] as $key => $value) {
            $saldo_bank += $value['saldo'];
        }
        $data['saldo_bank'] = $saldo_bank;
        $total_saldo_bank += $saldo_bank;

        $data['ho_bop'] = $this->mdMutasiBank
            ->orderBY('id_mutasi_bank', 'DESC')
            ->where('mutasi_bank.id_branch', $id_branch)
            ->where('type_mutasi_bank', 'MUTASI HO BOP')
            ->findAll();
        $biaya_ho_bop = 0;
        foreach ($data['ho_bop'] as $key => $value) {
            $biaya_ho_bop += $value['biaya_mutasi_bank'];
        }
        $data['biaya_ho_bop'] = $biaya_ho_bop;

        $data['ho_deviden'] = $this->mdMutasiBank
            ->orderBY('id_mutasi_bank', 'DESC')
            ->where('id_branch', $id_branch)
            ->where('type_mutasi_bank', 'MUTASI HO DEVIDEN')
            ->findAll();
        $biaya_ho_deviden = 0;
        foreach ($data['ho_deviden'] as $key => $value) {
            $biaya_ho_deviden += $value['biaya_mutasi_bank'];
        }
        $data['biaya_ho_deviden'] = $biaya_ho_deviden;

        $data['kas_pengembangan'] = $this->mdMutasiBank
            ->orderBY('id_mutasi_bank', 'DESC')
            ->where('id_branch', $id_branch)
            ->where('type_mutasi_bank', 'MUTASI KAS PENGEMBANGAN')
            ->findAll();
        $biaya_kas_pengembangan = 0;
        foreach ($data['kas_pengembangan'] as $key => $value) {
            $biaya_kas_pengembangan += $value['biaya_mutasi_bank'];
        }
        $data['biaya_kas_pengembangan'] = $biaya_kas_pengembangan;


        return view('admin_kas_kecil/laporan/closing', $data);
    }

    public function closing_mingguan_save()
    {
        $week = $this->request->getPost('week');
        $year = $this->request->getPost('year');
        $data['judul'] = "Closing Mingguan KE-$week";
        $data['judul1'] = "LAPORAN CLOSING MINGGUAN KE-$week $year";
        $id_branch = SESSION('userData')['id_branch'];

        $data['nota_putih'] = $this->mdNota
            ->select('*, partner.id_partner as id_partner')
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            ->where('nota.status !=', 'Lunas')
            // ->groupBy('partner.id_partner')
            ->findAll();

        // Nota Putih
        $temp = [];
        foreach ($data['nota_putih'] as $key => $value) {
            $temp[$value['id_partner']][] = $value['total_beli'] - $value['pay'];
            // $data_save = [
            //     'id_nota' => $value['id_nota'],
            //     'status_closing' => 1,
            // ];
            // print_r($data_save);
            // $this->mdNota->save($data_save);
        }
        foreach ($temp as $key => $value) {
            $data_save = [
                'id_branch' => SESSION('userData')['id_branch'],
                'id_partner' => $key,
                'id_user' => SESSION('userData')['id_user'],
                'minggu_nota_putih' => $week,
                'total_beli' => array_sum($value),
            ];
            $this->mdNotaPutihSalesmanSave->save($data_save);
        }

        $data['kontan_nota'] = $this->mdNota
            ->join('partner', 'partner.id_partner=nota.id_partner')
            ->join('customer', 'customer.id_customer=nota.id_customer')
            ->join('sales', 'sales.id_sales=nota.id_sales')
            ->orderBY('id_nota', 'DESC')
            // ->where('sales.week', $week)
            // ->where('YEAR(nota.created_at)', $year)
            ->where('nota.id_branch', $id_branch)
            // ->where('nota.status !=', 'Lunas')
            // ->where('total_beli !=', 0)
            ->findAll();
        $grand_total_kontan = 0;
        $grand_total_tertagih = 0;
        $total_kontan_per_salesman = [];
        $total_tertagih_per_salesman = [];
        $grand_saldo = 0;
        foreach ($data['kontan_nota'] as $value) {
            $id_partner = $value['id_partner'];
            if ($value['payment_method'] == 'CASH') {
                if (!isset($total_kontan_per_salesman[$id_partner])) {
                    $total_kontan_per_salesman[$id_partner] = 0;
                }
                $total_kontan_per_salesman[$id_partner] += $value['pay'];
            } else if ($value['payment_method'] == 'KREDIT') {
                if (!isset($total_tertagih_per_salesman[$id_partner])) {
                    $total_tertagih_per_salesman[$id_partner] = 0;
                }
                // $total_tertagih_per_salesman[$id_partner] += ($value['total_beli'] - $value['pay']);
                $total_tertagih_per_salesman[$id_partner] +=  $value['pay'];
            }
        }

        foreach ($total_kontan_per_salesman as $id_partner => $total_kontan) {
            $total_tertagih = isset($total_tertagih_per_salesman[$id_partner]) ? $total_tertagih_per_salesman[$id_partner] : 0;
            $grand_total_kontan += $total_kontan;
            $grand_total_tertagih += $total_tertagih;
            $saldo =  $grand_total_kontan + $grand_total_tertagih;
            $grand_saldo += $grand_total_kontan + $grand_total_tertagih;
            $data_save1 = [
                'id_branch' => SESSION('userData')['id_branch'],
                'id_partner' => $id_partner,
                'id_user' => SESSION('userData')['id_user'],
                'week_kontan' => $week,
                'total_tertagih' => $total_tertagih,
                'total_kontan' => $total_kontan,
            ];
            $this->mdClosingNotaKontan->save($data_save1);
        }
        $data['grand_saldo'] = $grand_saldo;

        $data['piutang_karyawan'] = $this->mdPiutangUsaha
            ->where('type_piutang', 'Karyawan')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('branch', 'branch.id_branch=piutang_usaha.id_branch')
            ->findAll();
        foreach ($data['piutang_karyawan'] as $key => $value) {
            $data_save1 = [
                'id_branch' => SESSION('userData')['id_branch'],
                'id_user' => SESSION('userData')['id_user'],
                'week_piutang_karyawan' => $week,
                'nama_karyawan' => $value['nama_penghutang'],
                'total_piutang_karyawan' => $value['jumlah_piutang'],
            ];
            $this->mdClosingPiutangKaryawan->save($data_save1);
        }
        $data['hutang_usaha'] = $this->mdPiutangUsaha
            ->groupBy('supplier.id_supplier')
            ->where('type_piutang', 'Usaha')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('supplier', 'supplier.id_supplier=piutang_usaha.id_supplier')
            ->findAll();

        $total_piutang_usaha = 0;
        $jumlah_piutang_usaha = 0;
        foreach ($data['hutang_usaha'] as $key => $value) {
            $jumlah_piutang_usaha += $value['jumlah_piutang'];
            $data_save2 = [
                'id_branch' => SESSION('userData')['id_branch'],
                'id_user' => SESSION('userData')['id_user'],
                'week_piutang_supplier' => $week,
                'id_supplier' => $value['id_supplier'],
                'total_piutang_supplier' => $value['jumlah_piutang'],
            ];
            $this->mdClosingPiutangSupplier->save($data_save2);
        }
        $data['jumlah_piutang_usaha'] = $jumlah_piutang_usaha;
        $total_piutang_usaha += $jumlah_piutang_usaha;
        $data['piutang_internal'] = $this->mdPiutangUsaha
            ->where('type_piutang', 'Internal')
            ->where('piutang_usaha.id_branch', $id_branch)
            ->join('branch', 'branch.id_branch=piutang_usaha.id_cabang')
            ->findAll();
        $total_piutang_internal = 0;
        foreach ($data['piutang_internal'] as $key => $value) {
            $total_piutang_internal += $value['jumlah_piutang'];
            $data_save3 = [
                'id_branch' => SESSION('userData')['id_branch'],
                'id_user' => SESSION('userData')['id_user'],
                'week_piutang_internal' => $week,
                'id_cabang' => $value['id_cabang'],
                'total_piutang_internal' => $value['jumlah_piutang'],
            ];
            $this->mdClosingPiutangInternal->save($data_save3);
        }

        //stock barang
        $data['product'] = $this->mdProduct
            ->select('product.*, barang_harga.harga_aktif, SUM(satuan_penjualan) AS qty, nota_detail.harga_nota, nota_detail.satuan_penjualan')
            ->join('nota_detail', 'nota_detail.id_product= product.id_product')
            ->join('nota', 'nota.id_nota = nota_detail.id_nota')
            ->join('barang_harga', 'barang_harga.id_product= product.id_product')
            ->where('product.id_branch', $id_branch)
            ->where('barang_harga.id_jenis_harga', 2)
            ->groupBy('product.id_product')
            ->findAll();
        $total_jumlah = 0;
        $all_total_jual = 0;
        $total_modal = 0;
        foreach ($data['product'] as $key => $value) {
            $harga_aktif = $value['harga_aktif'];
            $harga_beli = $value['harga_beli'];
            $qty = $value['qty'];
            $modal = $qty * $harga_beli;
            $total_jumlah += $qty;
            $total_modal += $modal;
            $total_jual = $qty * $harga_aktif;
            $all_total_jual += $total_jual;
            $data_save4 = [
                'id_product' => $value['id_product'],
                'satuan_product' => $value['satuan_product'],
                'jumlah_stock_product' => $value['stock_product'],
                'jumlah_penjualan_product' => $qty,
                'modal' => $modal,
                'harga_jual' => $harga_aktif,
                'total_jual' => $total_jual,
                'id_branch' => SESSION('userData')['id_branch'],
                'week_stock_product' => $week,
                'id_user' => SESSION('userData')['id_user'],
            ];
            $this->mdClosingStockProduct->save($data_save4);
        }

        //stock salesman
        $data['salesman_'] = $this->mdProduct
            ->select('product.*, barang_harga.harga_aktif, 
             SUM(CASE WHEN nota.payment_method = "CASH" THEN nota_detail.satuan_penjualan ELSE 0 END) AS qty_cash,
             SUM(CASE WHEN nota.payment_method = "KREDIT" THEN nota_detail.satuan_penjualan ELSE 0 END) AS qty_kredit')
            ->join('nota_detail', 'nota_detail.id_product = product.id_product')
            ->join('nota', 'nota.id_nota = nota_detail.id_nota')
            ->join('barang_harga', 'barang_harga.id_product = product.id_product')
            ->where('product.id_branch', $id_branch)
            ->where('barang_harga.id_jenis_harga', 2)
            ->groupBy('product.id_product, barang_harga.harga_aktif')
            ->findAll();
        $total_qty_kredit = 0;
        $total_qty_cash = 0;
        $total_kredit = 0;
        $total_cash = 0;
        $all_subtotal = 0;
        foreach ($data['salesman_'] as $key => $value) {
            $total_qty_kredit += $value['qty_kredit'];
            $total_qty_cash += $value['qty_cash'];
            $harga_kredit = $value['qty_kredit'] * $value['harga_aktif'];
            $harga_cash =  $value['qty_cash'] * $value['harga_aktif'];
            $subtotal_cash_kredit = $harga_cash + $harga_kredit;
            $total_kredit += $harga_kredit;
            $total_cash += $harga_cash;
            $all_subtotal += $subtotal_cash_kredit;
            $data_save7 = [
                'id_branch' => SESSION('userData')['id_branch'],
                'week_salesman_product' => $week,
                'id_product' => $value['id_product'],
                'satuan_product' => $value['satuan_product'],
                'jumlah_kredit' => $value['qty_kredit'],
                'total_kredit' => $harga_kredit,
                'jumlah_cash' => $value['qty_cash'],
                'total_cash' => $harga_cash,
                'total_cash_kredit' => $subtotal_cash_kredit,
                'id_user' => SESSION('userData')['id_user'],
            ];
            $this->mdClosingSalesmanProduct->save($data_save7);
        }
        //pengeluaran kantor
        $data['pengeluaran_kantor'] = $this->mdPengeluaranKantor
            ->where('pengeluaran_kantor.id_branch', $id_branch)
            ->findAll();

        $biaya_pengeluaran_kantor = 0;
        foreach ($data['pengeluaran_kantor'] as $key => $value) {
            $biaya_pengeluaran_kantor += $value['biaya_pengeluaran_kantor'];
        }
        $data['biaya_pengeluaran_kantor'] = $biaya_pengeluaran_kantor;

        //pengeluaran sales
        $data['pengeluaran_sales'] = $this->mdPengeluaranDetailSales
            ->where('pengeluaran_detail_sales.id_branch', $id_branch)
            ->findAll();

        $nominal = 0;
        foreach ($data['pengeluaran_sales'] as $key => $value) {
            $nominal += $value['nominal'];
        }
        $data['nominal'] = $nominal;

        $total_bop = $nominal + $biaya_pengeluaran_kantor;
        $data['total_bop'] = $total_bop;

        $data_save8 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_pengeluaran_kantor' => $week,
            'remark' => 'Biaya Operasional',
            'id_user' => SESSION('userData')['id_user'],
            'total_pengeluaran_kantor' => $nominal,
        ];
        $this->mdClosingPengeluaranKantor->save($data_save8);

        $data_save9 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_pengeluaran_kantor' => $week,
            'remark' => 'Biaya Kantor',
            'id_user' => SESSION('userData')['id_user'],
            'total_pengeluaran_kantor' => $biaya_pengeluaran_kantor,
        ];
        $this->mdClosingPengeluaranKantor->save($data_save9);

        $data_save10 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_summary_deviasi' => $week,
            'keterangan' => 'Nota Putih',
            'id_user' => SESSION('userData')['id_user'],
            'before_deviasi_modal' => $grand_saldo,
            'before_deviasi_jual' => $grand_saldo,
            'after_deviasi_modal' => $grand_saldo - ($grand_saldo / 10),
            'after_deviasi_jual' => $grand_saldo -  ($grand_saldo / 10),
        ];
        $this->mdClosingSummaryDeviasi->save($data_save10);

        $data_save11 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_summary_deviasi' => $week,
            'keterangan' => 'Piutang Internal',
            'id_user' => SESSION('userData')['id_user'],
            'before_deviasi_modal' => $total_piutang_internal,
            'before_deviasi_jual' => $total_piutang_internal,
            'after_deviasi_modal' => $total_piutang_internal,
            'after_deviasi_jual' => $total_piutang_internal,
        ];
        $this->mdClosingSummaryDeviasi->save($data_save11);

        $data['bank'] = $this->mdBank
            ->orderBY('nama_bank', 'ASC')
            ->where('id_branch', $id_branch)
            ->findAll();

        $total_saldo_bank = 0;
        $saldo_bank = 0;
        foreach ($data['bank'] as $key => $value) {
            $saldo_bank += $value['saldo'];
            $data_saveBank =
                [
                    'id_branch' => SESSION('userData')['id_branch'],
                    'week_neraca' => $week,
                    'keterangan' => 'Neraca',
                    'id_user' => SESSION('userData')['id_user'],
                    'id_bank' => $value['id_bank'],
                    'saldo' => $value['saldo'],
                ];
            $this->mdClosingNeraca->save($data_saveBank);
        }
        $data['saldo_bank'] = $saldo_bank;
        $total_saldo_bank += $saldo_bank;

        $data_save12 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_summary_deviasi' => $week,
            'keterangan' => 'Neraca',
            'id_user' => SESSION('userData')['id_user'],
            'before_deviasi_modal' => $total_saldo_bank,
            'before_deviasi_jual' => $total_saldo_bank,
            'after_deviasi_modal' => $total_saldo_bank,
            'after_deviasi_jual' => $total_saldo_bank,
        ];
        $this->mdClosingSummaryDeviasi->save($data_save12);

        $data_save13 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_summary_deviasi' => $week,
            'keterangan' => 'Modal | Jual',
            'id_user' => SESSION('userData')['id_user'],
            'before_deviasi_modal' => $total_modal,
            'before_deviasi_jual' => $all_total_jual,
            'after_deviasi_modal' => $total_modal,
            'after_deviasi_jual' => $all_total_jual,
        ];
        $this->mdClosingSummaryDeviasi->save($data_save13);

        $data_save14 = [
            'id_branch' => SESSION('userData')['id_branch'],
            'week_summary_deviasi' => $week,
            'keterangan' => 'Hutang Usaha',
            'id_user' => SESSION('userData')['id_user'],
            'before_deviasi_modal' => $total_piutang_usaha,
            'before_deviasi_jual' => $total_piutang_usaha,
            'after_deviasi_modal' => $total_piutang_usaha,
            'after_deviasi_jual' => $total_piutang_usaha,
        ];
        $this->mdClosingSummaryDeviasi->save($data_save14);

        $data['ho_bop'] = $this->mdMutasiBank
            ->orderBY('id_mutasi_bank', 'DESC')
            ->where('mutasi_bank.id_branch', $id_branch)
            ->where('type_mutasi_bank', 'MUTASI HO BOP')
            ->findAll();
        foreach ($data['ho_bop'] as $key => $value) {
            $data_save15 =
                [
                    'id_branch' => SESSION('userData')['id_branch'],
                    'week_mutasi_ho' => $week,
                    'keterangan' => $value['remark_mutasi_bank'],
                    'type_mutasi' => $value['type_mutasi_bank'],
                    'id_user' => SESSION('userData')['id_user'],
                    'id_bank' => $value['id_bank'],
                    'bank_tujuan' => $value['bank_tujuan'],
                    'saldo' => $value['biaya_mutasi_bank'],
                ];
            $this->mdClosingMutasiHO->save($data_save15);
        }

        $data['ho_deviden'] = $this->mdMutasiBank
            ->orderBY('id_mutasi_bank', 'DESC')
            ->where('id_branch', $id_branch)
            ->where('type_mutasi_bank', 'MUTASI HO DEVIDEN')
            ->findAll();
        foreach ($data['ho_deviden'] as $key => $value) {
            $data_save15 =
                [
                    'id_branch' => SESSION('userData')['id_branch'],
                    'week_mutasi_ho' => $week,
                    'keterangan' => $value['remark_mutasi_bank'],
                    'type_mutasi' => $value['type_mutasi_bank'],
                    'id_user' => SESSION('userData')['id_user'],
                    'id_bank' => $value['id_bank'],
                    'bank_tujuan' => $value['bank_tujuan'],
                    'saldo' => $value['biaya_mutasi_bank'],
                ];
            $this->mdClosingMutasiHO->save($data_save15);
        }

        $data['kas_pengembangan'] = $this->mdMutasiBank
            ->orderBY('id_mutasi_bank', 'DESC')
            ->where('id_branch', $id_branch)
            ->where('type_mutasi_bank', 'MUTASI KAS PENGEMBANGAN')
            ->findAll();
        foreach ($data['kas_pengembangan'] as $key => $value) {
            $data_save15 =
                [
                    'id_branch' => SESSION('userData')['id_branch'],
                    'week_mutasi_ho' => $week,
                    'keterangan' => $value['remark_mutasi_bank'],
                    'type_mutasi' => $value['type_mutasi_bank'],
                    'id_user' => SESSION('userData')['id_user'],
                    'id_bank' => $value['id_bank'],
                    'bank_tujuan' => $value['bank_tujuan'],
                    'saldo' => $value['biaya_mutasi_bank'],
                ];
            $this->mdClosingMutasiHO->save($data_save15);
        }


        // //week
        $where_conditions = [
            'nama_week' => $week,
            'tahun_week' => $year,
        ];
        // print_r($where_conditions);
        $mdWeek = $this->mdWeek->where($where_conditions)->find();

        if (isset($mdWeek[0])) {
            $data_save_week = [
                'id_week' => $mdWeek[0]['id_week'],
                'status_closing' => '1',
            ];
            $this->mdWeek->save($data_save_week);
        }
        // print_r($mdWeek);

        return redirect()->to(base_url('/akk/laporan/form_closing'));
    }
}
