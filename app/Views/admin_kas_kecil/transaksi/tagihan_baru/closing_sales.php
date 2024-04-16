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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/tagihan_baru') ?>"> NOTA
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('/akk/transaksi/tagihan_baru/nota') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-0">
                                        <label class="col-12 col-form-label">MINGGU KE - <?= $model['week'] ?></label>
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <a class="text-black text-decoration-none">
                                        <!-- <div class="preview-thumbnail">
                                            <img src="<?= base_url() ?>/public/assets/images/faces/face4.jpg" alt="image" class="profile-pic rounded">
                                        </div> -->

                                    </a>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-7 justify-content-center">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <h6 class="preview-subject ellipsis mb-0 font-weight-normal">
                                                NO DO : <?= $model['id_sales'] ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mt-4">
                                        <p class="text-gray mb-0"> Area : <?= $model['nama_area'] ?> </p>
                                    </div>
                                    <div class="form-group d-flex mt-4">
                                        <p class="text-gray mb-0"> Salesman : <?= $model['nama_lengkap'] ?> </p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-md-12 mb-0">
                                        <div class="form-group d-flex">
                                            <label class="col-5 col-form-label">TANGGAL</label>
                                            <div class="col-7">
                                                <input type="date" name="tgl_bayar" class="form-control" value="<?= date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!-- tabel -->
                        <div class="table-responsive">
                            <table class="table table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style=" font-size: 11px;"> NO </th>
                                        <th style=" font-size: 11px;"> NO TAGIHAN </th>
                                        <th style=" font-size: 11px;"> CUSTOMER </th>
                                        <th style=" font-size: 11px;"> KREDIT </th>
                                        <th style=" font-size: 11px;"> CASH </th>
                                        <th style=" font-size: 11px;"> SUB TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cek_nota as $key => $value) { ?>
                                        <tr>
                                            <td style=" font-size: 11px;"><?= $key + 1 ?></td>
                                            <td style=" font-size: 11px;"><?= $value['no_nota'] ?></td>
                                            <td style=" font-size: 11px;"><?= $value['nama_customer'] ?></td>
                                            <td style=" font-size: 11px;"></td>
                                            <td style=" font-size: 11px;"></td>
                                            <td style=" font-size: 11px;"></td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>

        
    </div>



    <!-- <div class="col-md-6">
                                <a href="#" class="btn btn-gradient-warning btn-rounded btn-fw">
                                    Save
                                </a>
                            </div> -->


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

        $result = $nama_hari . ', ' . $pecahkanTanggal[2] . '/' . (int)$pecahkanTanggal[1] . '/' . $pecahkanTanggal[0];
        // $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int)$pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];

        if ($waktu !== null) {
            $result .= ' ' . $waktu;
        }

        return $result;
    }
    ?>
    <?= $this->endSection() ?>