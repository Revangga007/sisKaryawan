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
                    <thead class="text-center">
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
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus_<?= $kriteria['kode']; ?>">
                                    <li class="fa fa-trash"></li>
                                    &nbsp;Hapus
                                </button>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus_<?= $kriteria['kode']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Konfirmasi Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data <?= $kriteria['nama']; ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('kriteria/delete/'.$kriteria['kode'])?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger btn-danger">Konfirmasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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