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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi') ?>"> TRANSAKSI</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/terima_barang') ?>"> TERIMA BARANG</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata("lebih")) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= session()->getFlashdata("lebih") ?>
                            </div>
                        <?php } ?>
                        <?php if (session()->getFlashdata("berhasil")) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?= session()->getFlashdata("berhasil") ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" height="88%" cellspacing="0">
                                <thead class="table table-primary">
                                    <tr>
                                        <th style="font-size: 11px;"> No </th>
                                        <th style="font-size: 11px;"> Kode Barang </th>
                                        <th style="font-size: 11px;"> Barang </th>
                                        <th style="font-size: 11px;"> Stock Gudang PO</th>
                                        <th style="font-size: 11px;"> Jumlah Masuk Ke Gudang </th>
                                        <th style="font-size: 11px;"> Satuan </th>
                                        <th style="font-size: 11px;"> # </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="<?= base_url('/akk/transaksi/terima_barang/detail') ?>" method="post">
                                            <input type="hidden" name="id_purchase_order" class="form-control" value="<?= $id_purchase_order ?>">
                                            <td style="font-size: 11px;">#</td>
                                            <td style="font-size: 11px;">
                                                <select class="form-control form-control-sm" id="id_product" name="id_po_dan_produk" required>
                                                    <option value=""> Pilih Produk</option>
                                                    <?php foreach ($podetail as $value) {
                                                        $jumlah = $value['jumlah_product'] - $value['jumlah_masuk']
                                                    ?>
                                                        <?php if ($jumlah > 0) { ?>
                                                            <option value="<?= $value['id_purchase_order_detail'] ?>,<?= $value['id_product'] ?>">
                                                                <?= $value['id_product'] ?>
                                                                -
                                                                <?= $value['nama_product'] ?>
                                                                -
                                                                <?= $jumlah ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <input type="text" disabled class="form-control" value="Kosong">
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" disabled class="form-control" id="nama_product">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" readonly class="form-control" id="jumlah_product" name="jumlah_product">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <input type="text" name="jumlah_masuk" class="form-control" id="pay" value="0">
                                            </td>
                                            <td style="font-size: 11px;">
                                                <select name="satuan" class="form-control form-control-sm" required>
                                                    <option>Pilih Subinventory</option>
                                                    <option>Defect</option>
                                                    <option>Gudang</option>
                                                    <option>Sample</option>
                                                </select>
                                            </td>
                                            <td style="font-size: 11px;">
                                                <?php if ($jumlah > 0) { ?>
                                                    <button type="text" class="btn btn-primary btn-xs" name="btn_s">Ok</button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger btn-xs" disabled name="btn_s">Ok</button>
                                                <?php } ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    //$(document).on('change', '#id_sales_detail', function() {
    $('#id_product').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url('/terima_barang/tambah_nama_barang'); ?>",
            method: "POST",
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                str = data.split(',');
                var x = document.getElementById("nama_product").value = str[0];
                var y = document.getElementById("jumlah_product").value = (Number(str[1]));
                // var y = document.getElementById("jumlah_sales").value = number_format(Number(str[1]));
            }
        });
        return false;
    });
</script>
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

<?= $this->endSection() ?>