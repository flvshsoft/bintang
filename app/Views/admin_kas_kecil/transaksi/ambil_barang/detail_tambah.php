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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/transaksi/ambil_barang') ?>"> Sales</a></li>
                    <li class="breadcrumb-item"><a
                            href="<?= base_url('/akk/transaksi/ambil_barang/detail/' . $id_sales['id_sales']) ?>">
                            Detail</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/transaksi/ambil_barang/detail/tambah') ?>">
                            <div class="form-group row mb-0">
                                <div class="col-sm-9">
                                    <input type="hidden" name="id_sales" value="<?= $id_sales['id_sales'] ?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Kode Barang</label>
                                <div class="col-sm-9">
                                    <select name="id_product" id="id_product" class="form-control">
                                        <option> Pilih </option>
                                        <?php foreach ($product as $value) { ?>
                                        <option value="<?= $value['id_product'] ?>">
                                            <?= $value['nama_product'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" id="nama_product" disabled class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Stok Gudang</label>
                                <div class="col-sm-9">
                                    <? ?>
                                    <input type="text" id="stock_product" disabled class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Satuan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="satuan_sales_detail">
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn btn-gradient-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i> Transasct</button>
                                <a href="<?= base_url('/akk/transaksi/ambil_barang/detail/' . $id_sales['id_sales']) ?>"
                                    class="btn btn-light btn-xs">
                                    <i class="mdi mdi-backburger"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        url: "<?= base_url('/tambah_nama_barang'); ?>",
        method: "POST",
        data: {
            id: id
        },
        success: function(data) {
            str = data.split(';');
            var x = document.getElementById("nama_product").value = str[0];
            var y = document.getElementById("stock_product").value = number_format(Number(str[1]));
        }
    });
    return false;
});
</script>

<?= $this->endSection() ?>