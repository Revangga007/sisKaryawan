<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <form action="<?= base_url('users/store'); ?>" method="post">
        <?= csrf_field(); ?>
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tambah <?= $title ?? null; ?></h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" name="nama" id="nama" class="form-control <?= $validation->hasError('nama') ? 'is-invalid': null ?>" placeholder="Masukkan Nama user" onkeyup="namaFormat();" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control<?= $validation->hasError('username') ? ' is-invalid': null?>" placeholder="Masukkan username" value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control<?= $validation->hasError('username') ? ' is-invalid': null ?>" placeholder="Masukkan password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option selected disabled>Pilih role</option>
                            <option value="pimpinan">Pimpinan</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container d-flex justify-content-between">
                    <a href="<?= base_url('users'); ?>" class="btn btn-sm btn-outline-danger"><li class="fa fa-arrow-left"></li>&nbsp;Kembali</a>
                    <button class="btn btn-sm btn-success"><li class="fa fa-save"></li>&nbsp;Simpan</button>
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