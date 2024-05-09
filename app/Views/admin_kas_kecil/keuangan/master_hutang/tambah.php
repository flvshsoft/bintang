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
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/keuangan/master_hutang/tambah') ?>">

                            <div class="form-group row mb-4">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">
                                    No Faktur</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" disabled
                                        rows="3"> <?= $lastPiutangUsaha ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Supplier</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="id_supplier">
                                        <option>Pilih Supplier</option>
                                        <?php foreach ($supplier as $value) { ?>
                                        <option value="<?= $value['id_supplier'] ?>"><?= $value['nama_supplier'] ?>
                                        </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Pekan Ke-</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="minggu-ke">
                                        <option></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                        <option>45</option>
                                        <option>46</option>
                                        <option>47</option>
                                        <option>48</option>
                                        <option>49</option>
                                        <option>50</option>
                                        <option>51</option>
                                        <option>52</option>
                                        <option>53</option>
                                        <option>54</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2"
                                    class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control form-control-sm" name="tgl_piutang"
                                        value="<?= date('Y-m-d H:i:s') ?>">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nilai Hutang</label>
                                <div class="col-sm-9">
                                    <input type="text" id="pay" class="form-control" value="0" name="jumlah_piutang">
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/keuangan/master_hutang') ?>"
                                    class="btn btn-primary btn-xs"><i class="mdi mdi-backburger icon-sm"></i></a>
                                <button type="submit" class="btn btn-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
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

<?= $this->endSection() ?>