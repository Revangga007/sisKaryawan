<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <form action="<?= base_url('pegawai/update-password/'.$pegawai['kode']); ?>" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Password <?= $title ?? null; ?></h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-group">
                        <label for="password">Password pegawai</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password pegawai" require>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Konfirmasi Password pegawai</label>
                        <input type="password" name="password-confirm" id="password-confirm" class="form-control" placeholder="Masukkan konfirmasi password pegawai" require>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container d-flex justify-content-between">
                    <a href="<?= base_url('pegawai/edit/'.$pegawai['kode']); ?>" class="btn btn-sm btn-outline-danger"><li class="fas fa-arrow-left"></li>&nbsp;Kembali</a>
                    <button class="btn btn-sm btn-success"><li class="fas fa-save"></li>&nbsp;Simpan</button>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection(); ?>