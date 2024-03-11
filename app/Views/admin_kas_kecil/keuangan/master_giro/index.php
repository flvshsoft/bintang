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
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $judul1 ?>
                    </li>
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
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> No Tagihan </th>
                                        <th style="font-size: 11px;"> Customer </th>
                                        <th style="font-size: 11px;"> From Payment </th>
                                        <th style="font-size: 11px;"> To Payment </th>
                                        <th style="font-size: 11px;"> Total Receipt</th>
                                        <th style="font-size: 11px;"> Tanggal </th>
                                        <th style="font-size: 11px;"> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            1
                                        </td>
                                        <td style="font-size: 11px;">
                                            103558
                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">
                                            GIRO
                                        </td>
                                        <td style="font-size: 11px;">
                                            <select class="form-control">
                                                <option></option>
                                                <option>BANK BRI</option>
                                                <option>BANK MANDIRI</option>
                                                <option>BANK MANDIRI 2</option>
                                                <option>BRANKAS</option>
                                                <option>BRANKAS KAS KECIL DI HEAD OFFICE</option>
                                                <option>KAS </option>
                                                <option>KAS KECIL</option>
                                            </select>
                                        </td>
                                        <td style="font-size: 11px;">
                                            14,000,000
                                        </td>
                                        <td style="font-size: 11px;">
                                            2022-01-24 00:00:00
                                        </td>
                                        <td style="font-size: 11px;">
                                            <button type="text" class="btn btn-primary btn-xs" name="btn_s">P</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            2
                                        </td>
                                        <td style="font-size: 11px;">
                                            103559
                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">
                                            GIRO
                                        </td>
                                        <td style="font-size: 11px;">
                                            <select class="form-control">
                                                <option></option>
                                                <option>BANK BRI</option>
                                                <option>BANK MANDIRI</option>
                                                <option>BANK MANDIRI 2</option>
                                                <option>BRANKAS</option>
                                                <option>BRANKAS KAS KECIL DI HEAD OFFICE</option>
                                                <option>KAS </option>
                                                <option>KAS KECIL</option>
                                            </select>
                                        </td>
                                        <td style="font-size: 11px;">
                                            65,000,000
                                        </td>
                                        <td style="font-size: 11px;">
                                            2022-01-24 00:00:00
                                        </td>
                                        <td style="font-size: 11px;">
                                            <button type="text" class="btn btn-primary btn-xs" name="btn_s">P</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">
                                            3
                                        </td>
                                        <td style="font-size: 11px;">
                                            103560
                                        </td>
                                        <td style="font-size: 11px;">

                                        </td>
                                        <td style="font-size: 11px;">
                                            GIRO
                                        </td>
                                        <td style="font-size: 11px;">
                                            <select class="form-control">
                                                <option></option>
                                                <option>BANK BRI</option>
                                                <option>BANK MANDIRI</option>
                                                <option>BANK MANDIRI 2</option>
                                                <option>BRANKAS</option>
                                                <option>BRANKAS KAS KECIL DI HEAD OFFICE</option>
                                                <option>KAS </option>
                                                <option>KAS KECIL</option>
                                            </select>
                                        </td>
                                        <td style="font-size: 11px;">
                                            15,000,000
                                        </td>
                                        <td style="font-size: 11px;">
                                            2022-01-24 00:00:00
                                        </td>
                                        <td style="font-size: 11px;">
                                            <button type="text" class="btn btn-primary btn-xs" name="btn_s">P</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!--table-->
        </div>
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