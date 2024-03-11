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
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/keuangan/mutasi_bank') ?>">MUTASI BANK</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST"
                            action="<?= base_url('/akk/keuangan/mutasi_bank/edit') ?>">
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2"
                                    class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control form-control-sm" name="tgl_mutasi_bank"
                                        value="<?= $model['tgl_mutasi_bank'] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Bank</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_bank">
                                        <option value="<?= $model['id_bank'] ?>"> <?= $model['nama_bank'] ?> </option>
                                        <?php foreach ($bank as $value) { ?>
                                        <option value="<?= $value['id_bank'] ?>"> <?= $value['nama_bank'] ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" value="<?= $model['biaya_mutasi_bank'] ?>"
                                        name="biaya_mutasi_bank">
                                    <input type="hidden" value="<?= $model['id_mutasi_bank'] ?>" name="id_mutasi_bank">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Pekan Ke-</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="week_mutasi_bank">
                                        <option><?= $model['week_mutasi_bank'] ?></option>
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
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Type Mutasi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type_mutasi_bank">
                                        <option><?= $model['type_mutasi_bank'] ?></option>
                                        <option>Uang Keluar</option>
                                        <option>Mutasi HO BOP</option>
                                        <option>Mutasi HO Deviden</option>
                                        <option>Mutasi Kas Pengembangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">
                                    Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3"
                                        name="remark_mutasi_bank"><?= $model['remark_mutasi_bank'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/keuangan/mutasi_bank') ?>" class="btn btn-primary btn-xs"><i
                                        class="mdi mdi-backburger icon-sm"></i></a>
                                <button type="submit" class="btn btn-warning btn-xs"><i
                                        class="mdi mdi-content-save-all icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>