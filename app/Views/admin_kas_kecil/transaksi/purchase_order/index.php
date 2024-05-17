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
                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> TRANSAKSI</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <a class="btn btn-success btn-xs"
                                    href="<?= base_url('/akk/transaksi/purchase_order/tambah') ?>">
                                    <i class="mdi mdi-database-plus icon-sm"></i> Tambah PO
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style=" font-size: 11px;"> No PO </th>
                                        <th style=" font-size: 11px;"> Keterangan </th>
                                        <th style=" font-size: 11px;"> Status </th>
                                        <th style=" font-size: 11px;"> Supplier </th>
                                        <th style=" font-size: 11px;"> User </th>
                                        <th style=" font-size: 11px;"> Tgl PO </th>
                                        <th style=" font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) {
                                        $dateString = $value['created_at'];
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d F Y H:i:s');
                                    ?>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <?= $no ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <a style="text-decoration: none;"
                                                href="<?= base_url('/akk/transaksi/purchase_order/edit/' . $value['id_purchase_order']) ?>"><b>
                                                    PO-<?= $value['id_purchase_order'] ?></b>
                                            </a>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['keterangan_purchase_order'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['status_purchase_order'] == 'Belum diterima' ? '<span class="text-danger">' . $value['status_purchase_order'] . '</span>' : $value['status_purchase_order'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['nama_supplier'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $value['nama_user'] ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <?= $formattedDate ?>
                                        </td>
                                        <td style=" font-size: 11px;">
                                            <a href="<?= base_url('/akk/transaksi/purchase_order/detail/' . $value['id_purchase_order']) ?>"
                                                class="btn btn-info btn-xs">
                                                <i class="mdi mdi-view-day text-default icon-md"></i>
                                            </a>
                                            <?php if($value['status_purchase_order']=='Belum diterima'){?>
                                            <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                                                href="<?= base_url('/akk/transaksi/purchase_order/hapus/' . $value['id_purchase_order']) ?>"
                                                class="btn btn-danger btn-xs">
                                                <i class="mdi mdi-delete icon-md"></i>
                                            </a>
                                            <?php }?>
                                            <!-- <a
                                                href="<?= base_url('/akk/transaksi/purchase_order/print/' . $value['id_purchase_order']) ?>">
                                                <i class="mdi mdi-file-pdf icon-md"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php $no++;
                                    } ?>
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