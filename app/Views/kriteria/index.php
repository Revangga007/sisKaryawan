<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?? null; ?></h6>
            <a href="<?= base_url('kriteria/create'); ?>" class="btn btn-outline-primary btn-sm"><li class="fa fa-plus"></li> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th>Status Kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($kriterias as $key => $kriteria) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $kriteria['kode']; ?></td>
                            <td><?= $kriteria['nama']; ?></td>
                            <td><?= $kriteria['bobot']; ?></td>
                            <td><?= $kriteria['status']; ?></td>
                            <td>
                                <a href="<?= base_url('kriteria/edit/'.$kriteria['kode']); ?>" class="btn btn-sm btn-warning"><li class="fa fa-edit"></li>&nbsp;Edit</a>
                                <form action="<?= base_url('kriteria/delete/'.$kriteria['kode']); ?>" method="post" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('yakin');"><li class="fa fa-trash"></li>&nbsp;Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>