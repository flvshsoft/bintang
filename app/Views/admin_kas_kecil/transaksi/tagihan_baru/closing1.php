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
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/tagihan_baru') ?>"> TAGIHAN
                            BARU
                        </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/tagihan_baru/nota/' .  $nota['id_sales']) ?>">
                            NOTA
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('/akk/transaksi/tagihan_baru/nota/detail') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-0 pt-4">
                                        <label class="col-12 col-form-label">MINGGU KE - <?= $nota['week'] ?></label>
                                        <!-- <div class="col-sm-1">
                                            <input type="text" name="weeks" class="form-control form-control-sm"
                                                value="<?= $nota['weeks'] ?>">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <a class="text-black text-decoration-none">
                                        <!-- <div class="preview-thumbnail">
                                            <img src="<?= base_url() ?>/public/assets/images/faces/face4.jpg" alt="image" class="profile-pic rounded">
                                        </div> -->
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="preview-subject ellipsis mb-0 font-weight-normal">
                                                NO DO : <?= $nota['id_sales'] ?>
                                                <input type="hidden" name="id_sales" class="form-control" value="<?= $nota['id_sales'] ?>">
                                                <input type="hidden" name="id_partner" class="form-control" value="<?= $nota['id_partner'] ?>">
                                            </h6>
                                            <p class="text-gray mb-0"> Area : <?= $nota['nama_area'] ?> </p>
                                            <input type="hidden" name="id_area" class="form-control" value="<?= $nota['id_area'] ?>">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <!-- metode faktur -->
                                <div class="col-md-8 justify-content-center">
                                    <!-- <div class="col-md-12"> -->
                                    <div class="row form-group mb-0">
                                        <label class="col-5 col-form-label">Metode Bayar :
                                            <?= $nota['payment_method'] ?></label>
                                        <!-- <div class="col-3">
                                                <input type="text" name="payment_method"
                                                    class="form-control form-control-sm"
                                                    value="<?= $nota['payment_method'] ?>">
                                            </div> -->
                                    </div>
                                    <!-- </div> -->
                                    <div class="form-group d-flex mt-0">
                                        <label class="col-sm-9 col-form-label">FAKTUR NO :
                                            <?= $nota['no_nota'] ?>
                                        </label>
                                        <!-- <div class="col-sm-3 justify-content-start">
                                            <input type="text" name="id_nota" class="form-control form-control-sm"
                                                value="<?= $nota['id_nota'] ?>">
                                        </div> -->
                                    </div>
                                </div>
                                <!-- Tgl Toko -->
                                <div class="col-md-4">
                                    <!-- <div class="col-md-12 mb-0"> -->
                                    <div class="form-group d-flex mb-0">
                                        <label class="col-9 col-form-label">
                                            TANGGAL : <?= tgl_indo($nota['tgl_bayar']) ?></label>
                                    </div>
                                    <!-- </div> -->
                                    <div class="col-md-12">
                                        <div class="form-group d-flex mb-0">
                                            <label class="col-5 col-form-label">TOKO</label>
                                            <div class="col-7">
                                                <select class="form-control select2" name="id_customer">
                                                    <option value="<?= $nota['id_customer'] ?>">
                                                        <?= $nota['id_customer'] ?> - <?= $nota['nama_customer'] ?>
                                                    </option>
                                                    <?php foreach ($customer as $value) { ?>
                                                        <option name="id_customer" value="<?= $value['id_customer'] ?>">
                                                            <?= $value['id_customer'] ?>
                                                            -
                                                            <?= $value['nama_customer'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-right mb-2">
                                            <div class="col-md-12">
                                                <button class="btn btn-gradient-warning btn-rounded btn-fw btn-sm float-end ms-auto">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                    <?php $no = 1;
                                    $total = 0;
                                    foreach ($model as $value) {
                                        $harga_aktif = $mdBarangHarga[$value['id_nota_detail']]['harga_aktif'];
                                        $harga =  $harga_aktif * $value['satuan_penjualan'] - $value['diskon_penjualan'];
                                        $total += $harga;
                                    ?>
                                        <tr>
                                            <td style=" font-size: 11px;">
                                                <?= $no ?>
                                            </td>
                                            <!-- <td style=" font-size: 11px;">
                                                <b>
                                                    <a style="text-decoration:none"
                                                        href="<?= base_url('/akk/form_customer/' . $value['id_nota_detail']) ?>"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <?= $value['id_nota_detail'] ?>
                                                    </a>
                                                </b>
                                            </td> -->
                                            <td style=" font-size: 11px;">
                                                <?= $value['nama_product'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= 'Rp. ' . number_format($harga_aktif, 0, ',', '.') ?> -
                                                <?= $value['remark_jenis_harga'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['satuan_penjualan'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= 'Rp. ' . number_format($value['diskon_penjualan'], 0, ',', '.') ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= 'Rp. ' . number_format($harga, 0, ',', '.') ?>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')" href="<?= base_url('/akk/transaksi/tagihan_baru/nota/detail/hapus/' . $value['id_nota'] . '/' . $value['id_nota_detail']) . '/' . $harga ?>">
                                                    <i class="mdi mdi-delete-circle text-default icon-md"></i> </a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                    <form method="POST" action="<?= base_url('/akk/transaksi/tagihan_baru/nota/detail') ?>">
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
                                                    <?php foreach ($sales_detail as $value) { ?>
                                                        <option value="<?= $value['id_sales_detail'] ?>">
                                                            <?= $value['id_product'] ?>
                                                            -
                                                            <?= $value['nama_product'] ?>
                                                            -
                                                            <?= $value['jumlah_sales'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <select class="form-control" name="id_jenis_harga">
                                                    <option value=""> Pilih Jenis Harga</option>
                                                    <?php foreach ($jenis_harga as $value) { ?>
                                                        <option value="<?= $value['id_jenis_harga'] ?>">
                                                            <?= $value['remark_jenis_harga'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="x" class="form-control form-control-sm" placeholder="0">
                                                <input type="text" name="satuan_penjualan" class="form-control form-control-sm" value="0">
                                                <input type="hidden" name="id_nota" class="form-control form-control-sm" value="<?= $nota['id_nota'] ?>">
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
                                    </form>
                                </tbody>
                                <tfoot class="table-info">
                                    <tr>
                                        <td style=" font-size: 11px;" colspan="5">
                                            <b>Total </b>
                                        </td>
                                        <td style=" font-size: 11px;" colspan="6">
                                            <?php
                                            // $totalBeli = isset($value['total_beli']) ? $value['total_beli'] : 0;
                                            //$formattedTotal = 'Rp. ' . number_format($totalBeli, 0, ',', '.');
                                            ?>
                                            <b>
                                                <?= 'Rp. ' . number_format($total, 0, ',', '.') ?>
                                            </b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><br>
                        <div class="row justify-content-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 row">
            <a href="<?= base_url('/akk/transaksi/tagihan_baru/nota/' .  $nota['id_sales']) ?>" class="btn btn-gradient-danger btn-sm btn-fw float-end w-auto ms-auto">
                Input Nota Baru
            </a>
        </div><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($cek_nota as $value) { ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header">
                            <small class="text-muted"><?= tgl_indo($value['created_at']) ?></small>
                        </div>
                        <div class="card-bodyx" style="padding:5%">
                            <h5 class="card-title text-center">Konsumen : <?= $value['nama_customer'] ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Area : <?= $value['nama_area'] ?> </li>
                            <li class="list-group-item">Salesman : <?= $value['nama_lengkap'] ?></li>
                            <li class="list-group-item">No Invoice : <?= $value['id_nota'] ?></li>
                        </ul>
                        <div class="" style="padding:5%">
                            <a href="<?= base_url('/akk/transaksi/tagihan_baru/nota/detail/' . $value['id_nota']) ?>" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm btn-rounded">Cek
                                Detail Nota</a>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pembelian Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="forms-sample" action="<?= base_url('/akk/transaksi/tagihan_baru/nota/detail/edit') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Item - Barang</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" value="<? //= $detail['id_nota_detail'] 
                                                                                ?>" name="id_nota_detail">
                            <select class="form-control" name="id_sales_detail">
                                <option value="id_sales_detail">
                                    <? //= $detail['id_product'] 
                                    ?>
                                    -
                                    <? //= $detail['nama_product'] 
                                    ?>
                                    -
                                    <? //= $detail['satuan_sales_detail'] 
                                    ?>
                                </option>
                                <?php foreach ($sales_detail as $value) { ?>
                                    <option value="<?= $value['id_sales_detail'] ?>">
                                        <?= $value['id_product'] ?>
                                        -
                                        <?= $value['nama_product'] ?>
                                        -
                                        <?= $value['satuan_sales_detail'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="rrr<? //= $detail['satuan_penjualan'] 
                                                                                ?>" name="satuan_penjualan">
                            <input type="hidden" class="form-control" value="<? //= $detail['id_nota'] 
                                                                                ?>" name="id_nota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Diskon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<? //= $detail['diskon_penjualan'] 
                                                                            ?>" name="diskon_penjualan">
                            <input type="hidden" class="form-control" value="<? //= $harga_b 
                                                                                ?>" name="harga_b">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
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

    if (is_array($pecahkanTanggal)) {
        // echo 'te';
        // print_r((int)$pecahkanTanggal[1]);
        // exit;
        $result = $nama_hari . ', ' . $pecahkanTanggal[2] . '/' . (int)$pecahkanTanggal[1] . '/' . $pecahkanTanggal[0];
        // $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[3] . ' ' . $pecahkanTanggal[0];
        // $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[((int)$pecahkanTanggal[1])] . ' ' . $pecahkanTanggal[0];
    } else {
        $result = '';
    }

    if ($waktu !== null) {
        $result .= ' ' . $waktu;
    }

    return $result;
}
?>

<?= $this->endSection() ?>