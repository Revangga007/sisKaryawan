<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Profil <?= session('nama') ?? 'Unknown' ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <td width="30%">Nama</td>
                                <td><?= $pegawai['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?= $pegawai['jekel'] ?></td>
                            </tr>
                            <tr>
                                <td>No.Handphone</td>
                                <td><?= $pegawai['no_hp'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $pegawai['alamat'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>