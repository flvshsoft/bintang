<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"><?= $judul1 ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>">BERANDA</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/laporan') ?>">LAPORAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA PER WEEK</h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Pengeluaran</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>BIAYA KANTOR</option>
                                        <option>BIAYA OPREASIONAL</option>
                                        <option>MUTASI HO</option>
                                        <option>MUTASI HO BOP</option>
                                        <option>MUTASI HO DIVIDEN</option>
                                        <option>MUTASI KAS PENGEMBANGAN</option>
                                        <option>PABRIK</option>
                                        <option>UANG KELUAR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Week</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
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
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Year</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA PER-SALES</h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Salesman</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>ADE</option>
                                        <option>ADMIN</option>
                                        <option>ANDANI</option>
                                        <option>BENGKULU</option>
                                        <option>BAMBANG</option>
                                        <option>BOBY</option>
                                        <option>DUMAI</option>
                                        <option>FAISAL</option>
                                        <option>FIRMAN</option>
                                        <option>GRESIK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Week</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
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
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Year</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA PER-REMARK</h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Pengeluaran</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>BIAYA KANTOR</option>
                                        <option>BIAYA OPREASIONAL</option>
                                        <option>MUTASI HO</option>
                                        <option>MUTASI HO BOP</option>
                                        <option>MUTASI HO DIVIDEN</option>
                                        <option>MUTASI KAS PENGEMBANGAN</option>
                                        <option>PABRIK</option>
                                        <option>UANG KELUAR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Month</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Year</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA PER-TAHUN</h4>
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Pengeluaran</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>BIAYA KANTOR</option>
                                        <option>BIAYA OPREASIONAL</option>
                                        <option>MUTASI HO</option>
                                        <option>MUTASI HO BOP</option>
                                        <option>MUTASI HO DIVIDEN</option>
                                        <option>MUTASI KAS PENGEMBANGAN</option>
                                        <option>PABRIK</option>
                                        <option>UANG KELUAR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Year</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm">
                                        <option></option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">USAHA PER-PERIODE</h4>
                        <form class="forms-sample">
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">Start
                                    Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="exampleInputConfirmPassword2" class="col-sm-4 col-form-label">End
                                    Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <a href="<?= base_url('/akk/laporan') ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-backburger icon-sm"></i>
                                </a>
                                <button class="btn btn-dark btn-sm"><i class="mdi mdi-printer icon-sm"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</style>

<?= $this->endSection() ?>