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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan') ?>">KEUANGAN</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/data_kas') ?>">DATA KAS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul1 ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class=" table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th class="text-center" style="font-size: 11px;"><b> NAMA BANK</b> </th>
                                        <th class="text-center" style="font-size: 11px;"><b> SALDO AKHIR</b> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_saldo = 0;
                                    foreach ($model as $value) {
                                        $saldo = $value['saldo'];
                                        $total_saldo += $saldo;
                                    ?>
                                    <tr>
                                        <td style=" font-size: 11px;">
                                            <?= $value['nama_bank'] ?>
                                        </td>
                                        <td style="font-size: 11px;">
                                            <a style="text-decoration: none;"
                                                href="<?= base_url('/akk/master_bank/update/' . $value['id_bank']) ?>">
                                                <?= 'Rp. ' . number_format($value['saldo'], 0, ',', '.') ?>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php }; ?>
                                    <tr class="table-primary">
                                        <td class="text-center" style=" font-size: 11px;">
                                            <b>TOTAL SALDO</b>
                                        </td>
                                        <td class="text-center" style="font-size: 11px;">
                                            <b>
                                                <?= 'Rp. ' . number_format($total_saldo, 0, ',', '.') ?>
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group text-center mb-0">
                            <a href="<?= base_url('/akk/keuangan/data_kas') ?>" class="btn btn-warning btn-xs"><i
                                    class="mdi mdi-backburger icon-sm"></i></a>
                            <!-- <button type="submit" class="btn btn-warning btn-xs"><i
                                    class="mdi mdi-content-save-all icon-sm"></i></button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Saldo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="forms-sample" action="<?= base_url('/akk/master_bank/edit') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Saldo</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" value="<?= $value['id_bank'] ?>" name="id_bank"
                                </div>
                            <input type="text" class="form-control" value="<?= $value['saldo'] ?>" name="saldo" </div>
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

<style>
.menu-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.menu-item a {
    display: flex;
    align-items: start;
    text-decoration: none;
    color: black;
}

.menu-item i {
    margin-right: 10px;
}
</style>

<?= $this->endSection() ?>