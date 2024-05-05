<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?= $judul ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> Transaski </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/purchase_order') ?>"> PO </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="#">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Cabang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?= $model['nama_supplier'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Minggu PO </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?= $model['minggu_purchase_order'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Keterangan PO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?= $model['keterangan_purchase_order'] ?>" required name="keterangan_purchase_order" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status PO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?= $model['status_purchase_order'] ?>" required name="status_purchase_order" readonly>
                                    <input type="hidden" class="form-control form-control-sm" value="<?= $model['id_purchase_order'] ?>" required name="id_purchase_order">
                                </div>
                            </div>

                        </form>
                        <form method="POST" action="<?= base_url('/akk/transaksi/tagihan_baru/nota/detail') ?>">
                            <div class="table-responsive">
                                <table class="table table-striped" width="100%" height="78%" cellspacing="0">
                                    <thead class="table table-primary">
                                        <tr>
                                            <th style=" font-size: 11px;"> No </th>
                                            <!-- <th style=" font-size: 11px;"> ID NOTA </th> -->
                                            <th style=" font-size: 11px;"> NAMA BARANG </th>
                                            <th style=" font-size: 11px;"> TYPE HARGA </th>
                                            <th style=" font-size: 11px;"> JUMLAH </th>
                                            <th style=" font-size: 11px;"> DISKON </th>
                                            <th style=" font-size: 11px;"> TOTAL</th>
                                            <th style=" font-size: 11px;"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style=" font-size: 11px;">
                                                <?= $no ?? 1 ?>
                                            </td>
                                            <!-- <td style=" font-size: 11px;">
                                                <? //= $lastIdNotaDetail + 1 ?? 1 
                                                ?>
                                            </td> -->
                                            <td style=" font-size: 11px;">
                                                <select class="form-control" name="id_sales_detail">
                                                    <option value="id_sales_detail"> Pilih Produk</option>
                                                    <?php //foreach ($sales_detail as $value) { 
                                                    ?>

                                                    <?php //} 
                                                    ?>
                                                </select>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <? //$nota['remark_jenis_harga'] 
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="x" class="form-control form-control-sm" placeholder="0">
                                                <input type="text" name="satuan_penjualan" class="form-control form-control-sm" value="0">
                                            </td>

                                            <td style=" font-size: 11px;">
                                                <input type="text" name="diskon_penjualan" class="form-control" value="0">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <button type="submit" class="btn btn-primary btn-xs"><i class="mdi mdi-content-save-all icon-xs"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
function tgl_indo($tanggal)
{
    $hari = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );

    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    // $pecahkan = explode('-', $tanggal);
    // $nama_hari = date('w', strtotime($tanggal));
    // $nama_hari = $hari[$nama_hari];
    // return $nama_hari . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

    $pecahkan = explode(' ', $tanggal);
    $tanggal = $pecahkan[0];
    $waktu = isset($pecahkan[1]) ? $pecahkan[1] : null;

    $pecahkanTanggal = explode('-', $tanggal);
    $nama_hari = date('w', strtotime($tanggal));
    $nama_hari = $hari[$nama_hari];

    $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int)$pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];

    if ($waktu !== null) {
        $result .= ' ' . $waktu;
    }

    return $result;
}
?>
<?= $this->endSection() ?>