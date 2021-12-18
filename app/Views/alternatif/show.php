<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Nilai <?= $pegawai['nama'] ?? null; ?></h6>
                <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalCreate_<?= $pegawai['kode']; ?>"><li class="fas fa-plus"></li>&nbsp;Input nilai</button>
                <div class="modal fade" id="modalCreate_<?= $pegawai['kode']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Form input nilai <?= $pegawai['nama'] ?? null; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('alternatif/create/'.$pegawai['kode']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="kode_pegawai" value="<?= $pegawai['kode']; ?>">
                                    <div class="form-group">
                                        <label for="kode_kriteria">Kriteria</label>
                                        <select name="kode_kriteria" id="kode_kriteria" class="form-control">
                                            <?php foreach($unSelected as $kriteria): ?>
                                                <option value="<?=$kriteria['kode']; ?>"><?=$kriteria['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai_kriteria">Nilai</label>
                                        <input type="number" name="nilai_kriteria" id="nilai_kriteria" class="form-control">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Kriteria</th>
                                <th width="10%">Nilai Kriteria</th>
                                <th width="18%">Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php foreach($kriterias as $key => $kriteria) : ?>
                            <tr>
                                
                                <td><?= $key + 1; ?></td>
                                <td><?= $kriteria['nama']; ?></td>
                                <td>
                                    <?php foreach($alternatifs as $alternatif) : ?>
                                            <?= $alternatif['kode_kriteria'] == $kriteria['kode'] ? $alternatif['nilai_kriteria'] : null ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach($alternatifs as $alternatif) : ?>
                                        <?php if($kriteria['kode'] == $alternatif['kode_kriteria']) :?>
                                            <!-- button edit -->
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit_<?= $alternatif['id']; ?>"><li class="fas fa-edit"></li>&nbsp;Edit</button>
                                            <!-- modal edit -->
                                            <div class="modal fade" id="modalEdit_<?= $alternatif['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Form Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('alternatif/update/'.$alternatif['id'])?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <div class="form-group">
                                                                    <label for="nilai">Nilai Kriteria</label>
                                                                    <input type="text" name="nilai_kriteria" id="nilai" class="form-control" value="<?= $alternatif['nilai_kriteria']; ?>">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- button hapus -->
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $alternatif['id']; ?>"><li class="fas fa-trash"></li>&nbsp;Hapus</button>
                                            <!-- modal hapus -->
                                            <div class="modal fade" id="modalHapus_<?= $alternatif['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                                            <form action="<?= base_url('alternatif/delete/'.$alternatif['id'])?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger btn-danger">Konfirmasi</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                </div>
            </div>
            <div class="card-footer">
                <div class="container">
                    <a href="<?= base_url('alternatif'); ?>" class="btn btn-sm btn-outline-danger"><li class="fas fa-arrow-left"></li>&nbsp;Kembali</a>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection(); ?>