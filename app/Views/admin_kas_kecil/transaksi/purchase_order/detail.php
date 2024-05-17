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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> Transaksi </a></li>
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
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?= $info['nama_supplier'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Minggu PO </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?= $info['minggu_purchase_order'] ?>" required readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Keterangan PO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?= $info['keterangan_purchase_order'] ?>" required
                                        name="keterangan_purchase_order" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status PO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm"
                                        value="<?= $info['status_purchase_order'] ?>" required
                                        name="status_purchase_order" readonly>
                                    <input type="hidden" class="form-control form-control-sm"
                                        value="<?= $info['id_purchase_order'] ?>" required name="id_purchase_order">
                                </div>
                            </div>

                        </form>
                        <form method="POST" action="<?= base_url('/akk/transaksi/purchase_order/detail') ?>">
                            <div class="table-responsive">
                                <table class="table table-striped" width="100%" height="78%" cellspacing="0">
                                    <thead class="table table-primary">
                                        <tr>
                                            <th style=" font-size: 11px;"> ID </th>
                                            <th style=" font-size: 11px;"> NAMA </th>
                                            <th style=" font-size: 11px;"> HARGA </th>
                                            <th style=" font-size: 11px;"> SATUAN </th>
                                            <th style=" font-size: 11px;"> QTY </th>
                                            <th style=" font-size: 11px;"> TOTAL</th>
                                            <th style=" font-size: 11px;"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style=" font-size: 11px;">
                                                <select class="form-control" id="id_product" name="id_product">
                                                    <option> Pilih Produk</option>
                                                    <?php foreach ($product as $value) {
                                                    ?>
                                                    <option value="<?= $value['id_product'] ?>">
                                                        <?= $value['id_product'] ?> - <?= $value['nama_product'] ?>
                                                    </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <input type="text" id="nama_product" readonly
                                                    class="form-control form-control-sm">
                                                <input type="hidden" name="id_purchase_order"
                                                    value="<?= $info['id_purchase_order'] ?>"
                                                    class="form-control form-control-sm">
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <input type="text" id="harga_beli" readonly name="harga_beli"
                                                    class="form-control form-control-sm">
                                            </td>
                                            <td>
                                                <input type="text" id="satuan_product" readonly
                                                    class="form-control form-control-sm">
                                            </td>

                                            <td style=" font-size: 11px;">
                                                <input type="text" name="jumlah_product" id="pay" class="form-control"
                                                    value="0">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?php if ($info['status_purchase_order'] == "Belum diterima") {
                                                ?>
                                                <button type="submit" class="btn btn-primary btn-xs"><i
                                                        class="mdi mdi-content-save-all icon-xs"></i>
                                                </button>
                                                <?php }
                                                ?>
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
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table table-primary">
                                        <tr>
                                            <th style="font-size: 11px;"> No </th>
                                            <th style=" font-size: 11px;"> No PO </th>
                                            <th style=" font-size: 11px;"> Barang </th>
                                            <th style=" font-size: 11px;"> Jumlah </th>
                                            <th style=" font-size: 11px;"> Harga Beli </th>
                                            <th style=" font-size: 11px;"> Tgl </th>
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
                                                <? //php if ($value['status'] == 0) { 
                                                    ?>
                                                <a style="text-decoration: none;"
                                                    href="<?= base_url('/akk/transaksi/purchase_order/edit/' . $value['id_purchase_order']) ?>"><b>
                                                        PO-<?= $value['id_purchase_order'] ?></b>
                                                </a>
                                                <? //php } else { 
                                                    ?>
                                                <!-- PO-<? //= $value['id_purchase_order'] 
                                                            ?> -->
                                                <? //php } 
                                                    ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $value['nama_product'] ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= number_format($value['jumlah_product'], 0, ',', ',') ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= 'Rp ' . number_format($value['harga_beli'], 0, '.', '.') ?>
                                            </td>
                                            <td style=" font-size: 11px;">
                                                <?= $formattedDate ?>
                                            </td>

                                            <td style=" font-size: 11px;">
                                                <!-- <a href="<? //= base_url('/akk/transaksi/purchase_order/detail/' . $value['id_purchase_order']) 
                                                                    ?>"
                                                    class="btn btn-info btn-xs">
                                                    <i class="mdi mdi-view-day text-default icon-md"></i>
                                                </a> -->
                                                <?php if ($value['status_purchase_order'] == "Belum diterima") {
                                                    ?>
                                                <a onclick="return confirm('Anda Yakin Ingin Menghapusnya?')"
                                                    href="<?= base_url('/akk/transaksi/purchase_order/detail/hapus/' . $value['id_purchase_order_detail'] . '/' . $value['id_purchase_order']) ?>"
                                                    class="btn btn-danger btn-xs">
                                                    <i class="mdi mdi-delete icon-md"></i>
                                                </a>
                                                <?php }
                                                    //} 
                                                    ?>

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

        <!-- back -->
        <div class="row">
            <div class="col-12">
                <div class="col-1 ms-auto me-5">
                    <a href="<?= base_url('/akk/transaksi/purchase_order') ?>" class="btn btn-success">Simpan</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Format angka saat diketikkan oleh pengguna
    document.getElementById('pay').addEventListener('input', function() {
        // Ambil nilai input
        let payValue = this.value;

        // Hapus semua tanda titik yang ada
        payValue = payValue.replace(/\./g, '');

        // Format angka dengan titik sebagai pemisah ribuan
        payValue = new Intl.NumberFormat('id-ID').format(payValue);

        // Masukkan kembali nilai yang sudah diformat ke dalam input
        this.value = payValue;
    });
    </script>

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
        $pecahkan = explode(' ', $tanggal);
        $tanggal = $pecahkan[0];
        $waktu = isset($pecahkan[1]) ? $pecahkan[1] : null;

        $pecahkanTanggal = explode('-', $tanggal);
        $nama_hari = date('w', strtotime($tanggal));
        $nama_hari = $hari[$nama_hari];

        $result = $nama_hari . ', ' . $pecahkanTanggal[2] . ' ' . $bulan[(int) $pecahkanTanggal[1]] . ' ' . $pecahkanTanggal[0];

        if ($waktu !== null) {
            $result .= ' ' . $waktu;
        }

        return $result;
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
    function number_format(number, decimals, dec_point, thousands_sep) {
        decimals = decimals || 0;
        dec_point = dec_point || '.';
        thousands_sep = thousands_sep || ',';

        let parts = number.toFixed(decimals).split('.');
        let integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
        let decimalPart = parts[1] ? (dec_point + parts[1]) : '';

        return integerPart + decimalPart;
    }


    $('#id_product').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url('/akk/transaksi/po/tambah_nama_barang'); ?>",
            method: "POST",
            data: {
                id: id
            },
            success: function(data) {
                str = data.split(';');
                var x = document.getElementById("nama_product").value = str[0];
                var y = document.getElementById("satuan_product").value = str[1];
                var z = document.getElementById("harga_beli").value = number_format(Number(str[2]));
            }
        });
        return false;
    });
    </script>
    <?= $this->endSection() ?>