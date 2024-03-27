<?= $this->extend('layout/admin_kas_kecil'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h6 class="page-title">
                <?= $judul1 ?>
            </h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 11px;">
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/dashboard') ?>"> BERANDA </a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/sdm') ?>"> SDM</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('/akk/master_employee') ?>"> PEKERJA</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?= $judul1 ?></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">GENERAL PERSONAL</h4>
                    <form class="forms-sample" method="POST" action="<?= base_url('/akk/karyawan/edit') ?>">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">
                                No. Induk Karyawan
                                (Kode Cabang.HariBulanTahun.Nomor Urut)
                                E.g Format : (001.270722.001)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?= $model['nip'] ?>"
                                    name="nip" required>
                                <input type="hidden" class="form-control form-control-sm"
                                    value="<?= $model['id_karyawan'] ?>" name="id_karyawan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Induk Kependudukan
                                (NIK)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="exampleInputEmail2" required
                                    value="<?= $model['nik'] ?>" name="nik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="exampleInputMobile" required
                                    value="<?= $model['nama_karyawan'] ?>" name="nama_karyawan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phone/Whatsapp</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-control-sm" id="exampleInputPassword2"
                                    required value="<?= $model['no_hp'] ?>" name="no_hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tempat
                                Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['tempat_lahir'] ?>"
                                    name="tempat_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tanggal
                                Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['tgl_lahir'] ?>"
                                    name="tgl_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Domisili</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['domisili'] ?>"
                                    name="domisili">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Jenis
                                Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" name="jk" required>
                                    <option value="<?= $model['jk'] ?>"><?= $model['jk'] ?></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Status
                                Kawin</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="status_kawin">
                                    <option value="<?= $model['status_kawin'] ?>"><?= $model['status_kawin'] ?></option>
                                    <option>Belum Kawin</option>
                                    <option>Kawin</option>
                                    <option>Janda</option>
                                    <option>Duda</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Golongan
                                Darah</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" name="gol_darah">
                                    <option value="<?= $model['gol_darah'] ?>"><?= $model['gol_darah'] ?></option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>AB</option>
                                    <option>O</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="agama">
                                    <option value="<?= $model['agama'] ?>"><?= $model['agama'] ?></option>
                                    <option>Islam</option>
                                    <option>Protestan</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                    <option>Koghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Saldo Cuti</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['saldo_cuti'] ?>"
                                    name="saldo_cuti">
                            </div>
                        </div>
                        <h4 class="card-title">EMPLOYMENT</h4>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Posisi
                                Pekerjaan</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="posisi">
                                    <option value="<?= $model['posisi'] ?>"><?= $model['posisi'] ?></option>
                                    <option>Office</option>
                                    <option>Salesman</option>
                                    <option>Driver</option>
                                    <option>Admin</option>
                                    <option>IT</option>
                                    <option>Gudang</option>
                                    <option>Owner</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tingkat
                                Pekerjaan</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="jabatan">
                                    <option value="<?= $model['jabatan'] ?>"><?= $model['jabatan'] ?></option>
                                    <option>CEO</option>
                                    <option>Manager</option>
                                    <option>Supervisor</option>
                                    <option>Staff</option>
                                    <option>Head</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Status
                                Pekerjaan</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="status_pekerjaan">
                                    <option value="<?= $model['status_pekerjaan'] ?>"><?= $model['status_pekerjaan'] ?>
                                    </option>
                                    <option>Tetap</option>
                                    <option>Kontrak</option>
                                    <option>Freelance</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Salary</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['salary'] ?>"
                                    name="salary">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tunjangan</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['tunjangan'] ?>"
                                    name="tunjangan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tanggal
                                Mulai Kerja</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['tgl_kerja'] ?>"
                                    name="tgl_kerja">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tanggal
                                Selesai Kerja</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required name="tgl_selesai_kerja"
                                    value="<?= $model['tgl_selesai_kerja'] ?>">
                            </div>
                        </div>
                        <h4 class="card-title">LAST EDUCATION</h4>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Tamatan
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" required name="tamatan">
                                    <option value="<?= $model['tamatan'] ?>"><?= $model['tamatan'] ?></option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA/SMK</option>
                                    <option>SARJANA</option>
                                    <option>MAGISTER</option>
                                    <option>DOCTOR</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['instansi'] ?>"
                                    name="instansi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['jurusan'] ?>"
                                    name="jurusan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Nilai
                                Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['nilai_terakhir'] ?>"
                                    name="nilai_terakhir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required value="<?= $model['tgl_sekolah'] ?>"
                                    name="tgl_sekolah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">End Date
                            </label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm"
                                    id="exampleInputConfirmPassword2" required
                                    value="<?= $model['tgl_selesai_sekolah'] ?>" name="tgl_selesai_sekolah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Absen Status
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="status">
                                    <option value="<?= $model['status'] ?>"> <?= $model['status'] ?></option>
                                    <option>OUTSTATION</option>
                                    <option>OFFICE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Schedule Set
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" id="exampleSelectGender" required name="schedule_set">
                                    <option value="<?= $model['schedule_set'] ?>"><?= $model['schedule_set'] ?></option>
                                    <option>OFFICE</option>
                                    <option>SALES</option>
                                </select>
                            </div>
                        </div>
                        <a href="<?= base_url('/akk/karyawan') ?>" class="btn btn-light"><i
                                class="mdi mdi mdi-backburger icon-sm"></i></a>
                        <button type="submit" class="btn btn-gradient-primary me-2"><i
                                class="mdi mdi-content-save-all icon-sm"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>