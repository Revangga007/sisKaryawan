<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?? null; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th width="8%">No</th>
                            <th>Periode Awal</th>
                            <th>Periode Akhir</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($histories as $key => $history) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= date('d-m-Y', strtotime($history['periode_awal'])); ?></td>
                            <td><?= date('d-m-Y', strtotime($history['periode_akhir'])); ?></td>
                            <td>
                                <a href="<?= base_url('history/generate/'.$history['id']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i>&nbsp;Detail</a>
                                <button type="button" class="btn btn-sm btn-danger d-inline" data-toggle="modal" data-target="#modalHapus_<?= $history['id']; ?>">
                                    <li class="fas fa-trash"></li>
                                    &nbsp;Hapus
                                </button>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus_<?= $history['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Konfirmasi Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus data history ini?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('history/delete/'.$history['id'])?>" method="post">
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
<?= $this->endSection(); ?>