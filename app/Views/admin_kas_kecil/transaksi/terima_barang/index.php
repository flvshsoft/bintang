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
                                                <b>
                                                    PO-<?= $value['id_purchase_order'] ?></b>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['keterangan_purchase_order'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['status_purchase_order'] == 'Belum diterima' ? '<span class="text-danger">' . $value['status_purchase_order'] . '</span>' : '<span class="text-success">' . $value['status_purchase_order'] . '</span>' ?>
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
                                                <a href="<?= base_url('/akk/transaksi/terima_barang/detail/' . $value['id_purchase_order']) ?>" class="btn btn-info btn-xs">
                                                    <i class="mdi mdi-view-day text-default icon-md"></i>
                                                </a>

                                                <!-- <a
                                                href="<?= base_url('/akk/transaksi/terima_barang/print/' . $value['id_purchase_order']) ?>">
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

        <!-- back -->
        <div class="row">
            <div class="col-12">
                <div class="col-1 ms-auto me-5">
                    <a href="<?= base_url('/akk/transaksi') ?>" class="btn btn-success">Simpan</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>