<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <form action="<?= base_url('kriteria/store'); ?>" method="post">
        <?= csrf_field(); ?>
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Tambah <?= $title ?? null; ?></h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $generateKode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" name="nama" id="nama" class="form-control <?= $validation->hasError('nama') ? 'is-invalid': null?>" placeholder="Masukkan Nama Kriteria" onkeyup="namaFormat();" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="number" step="0.01" min="0.00" max="1.00" name="bobot" id="bobot" class="form-control <?= $validation->hasError('bobot') ? 'is-invalid': null; ?>" placeholder="Masukkan Bobot Kriteria" value="<?= old('bobot') ?? '0.00'; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('bobot'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Kriteria</label>
                        <select name="status" id="status" class="form-control <?= $validation->hasError('status') ? 'is-invalid': null; ?>">
                            <option value="" disable>Pilih status kriteria</option>
                            <option value="Benefit" <?= old('status')=='Benefit' ? 'selected':null; ?>>Benefit</option>
                            <option value="Cost" <?= old('status')=='Cost' ? 'selected':null; ?>>Cost</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('status'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container d-flex justify-content-between">
                    <a href="<?= base_url('kriteria'); ?>" class="btn btn-sm btn-outline-danger"><li class="fa fa-arrow-left"></li>&nbsp;Kembali</a>
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