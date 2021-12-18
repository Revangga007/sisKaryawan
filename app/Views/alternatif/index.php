<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?? null; ?></h6>
            <a href="<?= base_url('alternatif/reset'); ?>" class="btn btn-danger btn-sm"><i class="fas fa-undo"></i> Reset</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th width="7%">No</th>
                            <th>Nama Pegawai</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pegawais as $key => $pegawai) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $pegawai['nama']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('alternatif/show/'.$pegawai['kode']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-list"></i> Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>

    </script>
<?= $this->endSection(); ?>