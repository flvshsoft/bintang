<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?= $judul1 ?>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> Beranda </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> Transaksi</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/stock_akhir') ?>"> Stock Akhir</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-bodyx p-4">
                                    <h4 class="font-weight-normal mb-1"> Salesman : <?= $info['nama_lengkap'] ?>
                                    </h4>
                                    <h2 class="mb-1">Area : <?= $info['nama_area'] ?> </h2>
                                    <h6 class="card-text">No DO : <?= $info['id_sales'] ?> </h6>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Kode Barang </th>
                                        <th style="font-size: 11px;"> Barang </th>
                                        <th style="font-size: 11px;"> Stock Gudang Sales</th>
                                        <th style="font-size: 11px;"> Jumlah Stock Kembali </th>
                                        <th style="font-size: 11px;"> Satuan </th>
                                        <th style="font-size: 11px;"> # </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($model as $key => $value) : ?>
                                        <tr>
                                            <td style="font-size: 11px;">
                                                <?= ++$key ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" value="<?= $value['id_product'] ?>">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" value="<?= $value['nama_product'] ?>">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" value="<?= 0 //number_format($sales_detail_basic[$value['id_sales_detail']]['satuan_sales_detail']) 
                                                                                                        ?>">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" value="<?= $value['jumlah_stock_kembali'] ?>">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" value="<?= $value['satuan'] ?>">
                                            </td>
                                            <td style="font-size: 11px;">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <form action="<?= base_url('/akk/transaksi/stock_akhir/edit') ?>" method="post">
                                            <input type="hidden" name="id_sales_do" class="form-control" value="<?= $id_sales_do ?>">

                                            <td style="font-size: 11px;">#</td>
                                            <td style="font-size: 11px;">
                                                <select class="form-control form-control-sm" name="id_product" required>
                                                    <option value=""> Pilih Produk</option>
                                                    <?php foreach ($sales_detail as $value) { ?>
                                                        <option value="<?= $value['id_sales_detail'] ?>,<?= $value['id_product'] ?>">
                                                            <?= $value['id_sales_detail'] ?>
                                                            -
                                                            <?= $value['id_product'] ?>
                                                            -
                                                            <?= $value['nama_product'] ?>
                                                            -
                                                            <?= $value['jumlah_sales'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" id="">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" id="">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" name="jumlah_stock_kembali" class="form-control" value="0">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <select name="satuan" class="form-control form-control-sm" required>
                                                    <option value="">Pilih Subinventory</option>
                                                    <option>Defect</option>
                                                    <option>Gudang</option>
                                                    <option>Sample</option>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <button type="text" class="btn btn-primary btn-xs" name="btn_s">Ok</button>
                                            </td>
                                        </form>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>