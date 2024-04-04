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
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/transaksi/edit_penjualan_barang') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Salesman</label>
                                <div class="col-sm-9">
                                    <select name="id_partner" class="form-control select2">
                                        <option value="<?= $model['id_partner'] ?>"> <?= $model['nama_lengkap'] ?>
                                        </option>
                                        <?php foreach ($salesman as $value) { ?>
                                        <option value="<?= $value['id_partner'] ?>"> <?= $value['nama_lengkap'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No Plat Mobil
                                </label>
                                <div class="col-sm-9">
                                    <select name="id_asset" class="form-control select2">
                                        <option value="<?= $model['id_asset'] ?>"> <?= $model['no_plat'] ?> -
                                            <?= $model['nama_asset'] ?>
                                        </option>
                                        <?php foreach ($asset as $value) { ?>
                                        <option value="<?= $value['id_asset'] ?>"> <?= $value['no_plat'] ?> -
                                            <?= $value['nama_asset'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kilometer</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $model['km'] ?>" name="km"
                                        class="form-control form-control-sm">
                                    <input type="hidden" value="<?= $model['id_sales'] ?>" name="id_sales"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Id Area
                                </label>
                                <div class="col-sm-9">
                                    <select name="id_area" class="form-control select2">
                                        <option value="<?= $model['id_area'] ?>"> <?= $model['id_nama_area'] ?> -
                                            <?= $model['nama_area'] ?>
                                        </option>
                                        <?php foreach ($area as $value) { ?>
                                        <option value="<?= $value['id_area'] ?>"> <?= $value['id_nama_area'] ?> -
                                            <?= $value['nama_area'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Week</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="week">
                                        <option value="<?= $model['week'] ?>"> <?= $model['week'] ?>
                                        </option>
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
                            <div class="form-group row mb-1">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tgl DO</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control form-control-sm"
                                        value="<?= $model['tgl_do'] ?>" name="tgl_do">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm" rows="3"
                                        name="keterangan"><?= $model['keterangan'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn btn-gradient-success btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i> Transasct</button>
                                <a href="<?= base_url('/akk/transaksi/ambil_barang') ?>" class="btn btn-light btn-xs">
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


<?= $this->endSection() ?>