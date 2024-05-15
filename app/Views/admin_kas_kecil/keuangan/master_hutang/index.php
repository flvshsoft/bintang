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
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata("kurang_saldo")) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata("kurang_saldo") ?>
                        </div>
                        <?php } ?>
                        <?php if (session()->getFlashdata("berhasil")) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata("berhasil") ?>
                        </div>
                        <?php } ?>
                        <?php if (session()->getFlashdata("saldo_kosong")) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata("saldo_kosong") ?>
                        </div>
                        <?php } ?>
                        <div class="form-group col-12">
                            <a href="<?= base_url('/akk/keuangan/master_hutang/pelunasan') ?>">
                                <button type="button" class="btn btn-dark btn-xs"><i
                                        class="mdi mdi-history icon-sm"></i>Riwayat Pelunasan Hutang</button>
                            </a>
                            <a href="<?= base_url('/akk/keuangan/master_hutang/pot') ?>">
                                <button type="button" class="btn btn-warning btn-xs"><i
                                        class="mdi mdi-history icon-sm"></i>Riwatat Pot Hutang</button>
                            </a>
                            <a href="<?= base_url('/akk/keuangan/master_hutang/tambah') ?>">
                                <button type="button" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-database-plus icon-sm"></i>Input Hutang</button>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
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
                                        <!-- <th style="font-size: 11px;"> Diskon | Retur | Bayar | Cicil </th> -->
                                        <th style="font-size: 11px;"> Bayar | Cicil </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($model as $value) {
                                        $dateString = $value['created_at'];
                                        // $total = $value['jumlah_piutang'] - $value['jumlah_cicilan'];
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d F Y H:i:s');
                                    ?>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            <a href="<?= base_url('/akk/keuangan/master_hutang/hapus/' . $value['id_piutang_usaha']) ?>"
                                                onclick="return confirm('Apakah Anda yakin Menghapus Data Piutang Usaha ?')"
                                                style="text-decoration: none;"><b>
                                                    <?= $no ?></b>
                                            </a>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <a href="<?= base_url('/akk/keuangan/master_hutang/edit/' . $value['id_piutang_usaha']) ?>"
                                                style="text-decoration: none;"><b>
                                                    <?= $value['id_piutang_usaha'] ?></b>
                                            </a>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_supplier'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['id_purchase_order'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= 'Rp ' . number_format($value['jumlah_piutang'], 0, '.', '.') ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $formattedDate ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['minggu-ke'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <?= $value['nama_user'] ?>
                                            <input type="hidden" value="<?= $value['id_piutang_usaha'] ?>"
                                                name="id_piutang_usaha">
                                            <input type="hidden" value="<?= $value['jenis'] ?>" name="jenis">
                                        </td>
                                        <td class="warning" align="center" width="10px">
                                            <!-- <b><a href="<? #= base_url('/akk/keuangan/master_hutang/') 
                                                                    ?>" style="text-decoration:none" data-toggle="tooltip"
                                                    class="tip-top" data-original-title="Discount Hutang Usaha"><i
                                                        class="mdi mdi-ticket-percent text-default icon-md"></i></a></b>
                                            <b><a href="<? #= base_url('/akk/keuangan/master_hutang/') 
                                                        ?>" style="text-decoration:none" data-toggle="tooltip"
                                                    class="tip-top" data-original-title="Retur Hutang"><i
                                                        class="mdi mdi-file-send text-default icon-md"></i></a></b> -->
                                            <b><a data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal<?= $value['id_piutang_usaha'] ?>"
                                                    style="text-decoration:none" data-toggle="tooltip" class="tip-top"
                                                    data-original-title="Bayar Lunas"><i
                                                        class="mdi mdi-check-circle text-default icon-md"></i></a></b>
                                            <b> <a
                                                    href="<?= base_url('/akk/keuangan/master_hutang/cicilan/' . $value['id_piutang_usaha']) ?>"><i
                                                        class="mdi mdi-cash-100 icon-md"></i></a></b>
                                        </td>
                                    </tr>

                                    <!-- Bayar Lunas  -->
                                    <div class="modal fade" id="exampleModal<?= $value['id_piutang_usaha'] ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" name="id_piutang_usaha">Bayar Disini
                                                        <?= $value['id_piutang_usaha'] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form class="forms-sample" action="<?= base_url('/akk/keuangan/master_hutang/pelunasan')
                                                                                        ?>" method="POST">
                                                    <input type="hidden" value="<?= $value['id_piutang_usaha'] ?>"
                                                        name="id_piutang_usaha">
                                                    <input type="hidden" value="<?= $value['jenis'] ?>" name="jenis">
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="exampleInputEmail2"
                                                                class="col-sm-3 col-form-label">Bank</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="id_bank">
                                                                    <option>Pilih Bank</option>
                                                                    <?php foreach ($bank as $value) { ?>
                                                                    <option value="<?= $value['id_bank'] ?>">
                                                                        <?= $value['nama_bank'] ?>
                                                                    </option>
                                                                    <?php }; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Bayar Lunas  -->

                                    <?php
                                        $no++;
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