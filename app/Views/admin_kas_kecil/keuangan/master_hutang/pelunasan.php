<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan') ?>">DATA KEUANGAN</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/master_hutang') ?>">HUTANG</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> Transc Code </th>
                                        <th style="font-size: 11px;"> No Faktur </th>
                                        <th style="font-size: 11px;"> Kas & Bank </th>
                                        <th style="font-size: 11px;"> Biaya </th>
                                        <!-- <th style="font-size: 11px;"> Type Biaya </th> -->
                                        <th style="font-size: 11px;"> Week </th>
                                        <th style="font-size: 11px;"> Remark</th>
                                        <th style="font-size: 11px;"> Approved By </th>
                                        <th style="font-size: 11px;"> Date </th>
                                        <th style="font-size: 11px;"> User </th>
                                        <th style="font-size: 11px;"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($model as $value) {
                                        $dateString = $value['created_at'];
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d F Y H:i:s');
                                    ?>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <b>
                                                <?= $value['id_piutang_usaha_riwayat'] ?></b>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <b>
                                                <?= $value['id_piutang_usaha'] ?></b>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_bank'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp ' . number_format($value['total'], 0, '.', '.') ?>
                                        </td>
                                        <!-- <td style="font-size: 11px;">
                                                <? //= $value['id_purchase_order'] 
                                                ?>
                                            </td> -->
                                        <td style="font-size: 11px;">
                                            <?= $value['minggu-ke'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['ket_riwayat'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_user'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $formattedDate ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_user'] ?>
                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                    </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> No Faktur </th>
                                        <th style="font-size: 11px;"> Supplier </th>
                                        <th style="font-size: 11px;"> No PO </th>
                                        <th style="font-size: 11px;"> Total Penerimaan </th>
                                        <th style="font-size: 11px;"> Tanggal </th>
                                        <th style="font-size: 11px;"> Minggu</th>
                                        <th style="font-size: 11px;"> User </th>
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
                                                <b>
                                                    <?//= $no ?></b>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <b>
                                                    <?//= $value['id_piutang_usaha'] ?></b>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?//= $value['nama_supplier'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?//= $value['id_purchase_order'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?//= 'Rp ' . number_format($value['jumlah_piutang'], 0, '.', '.') ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?//= $formattedDate ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?//= $value['minggu-ke'] ?>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?//= $value['nama_user'] ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<?= $this->endSection() ?>