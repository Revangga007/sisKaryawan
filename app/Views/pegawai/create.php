<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <form action="<?= base_url('pegawai/store'); ?>" method="post">
        <?= csrf_field(); ?>
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tambah <?= $title ?? null; ?></h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-group">
                        <label for="kode">Kode pegawai</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $generateKode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama pegawai</label>
                        <input type="text" name="nama" id="nama" class="form-control <?= $validation->hasError('nama') ? 'is-invalid': null ?>" placeholder="Masukkan Nama pegawai" onkeyup="namaFormat();" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin pegawai</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jekel" id="Pria" value="Pria" <?= old('jekel') == 'Pria' ? 'checked' : null; ?>>
                                    <label class="form-check-label" for="Pria">Pria</label>
                                </div>
                            </div>
                            <div class="row-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jekel" id="Wanita" value="Wanita" <?= old('jekel') == 'Wanita' ? 'checked' : null; ?>>
                                    <label class="form-check-label" for="Wanita">Wanita</label>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jekel'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No.handphone pegawai</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control<?= $validation->hasError('no_hp') ? ' is-invalid': null?>" placeholder="Masukkan no.handphone pegawai" value="<?= old('no_hp'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_hp'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat pegawai</label>
                        <textarea name="alamat" id="alamat" class="form-control<?= $validation->hasError('no_hp') ? ' is-invalid': null?> " cols="30" rows="5" placeholder="Masukkan alamat pegawai"><?= old('alamat'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control<?= $validation->hasError('username') ? ' is-invalid': null?>" placeholder="Masukkan username pegawai" value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control<?= $validation->hasError('password') ? ' is-invalid': null?>" placeholder="Masukkan password pegawai" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('status'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container d-flex justify-content-between">
                    <a href="<?= base_url('pegawai'); ?>" class="btn btn-sm btn-outline-danger"><li class="fas fa-arrow-left"></li>&nbsp;Kembali</a>
                    <button class="btn btn-sm btn-success"><li class="fas fa-save"></li>&nbsp;Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function namaFormat()
        {
            document.getElementById('nama').value = document.getElementById('nama').value.toUpperCase();

        }
    </script>
<?= $this->endSection(); ?>