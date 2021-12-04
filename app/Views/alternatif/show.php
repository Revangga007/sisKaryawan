<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Nilai <?= $pegawai['nama'] ?? null; ?></h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Kriteria</th>
                                <th width="10%">Nilai Kriteria</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php foreach($kriterias as $key => $kriteria) : ?>
                            <tr>
                                
                                <td><?= $key + 1; ?></td>
                                <td><?= $kriteria['nama']; ?></td>
                                <td>
                                    <?php foreach($alternatifs as $alternatif) : ?>
                                        <?php if($alternatif != null) : ?>
                                            <?= $alternatif['kode_kriteria'] == $kriteria['kode'] ? $alternatif['nilai_kriteria'] : null ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <!-- Button input nilai -->
                                    <button class="btn btn-primary btn-sm">Input</button>
                                    <button class="btn btn-danger btn-sm"><li class="fa fa-trash"></li>&nbsp;Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                </div>
            </div>
            <div class="card-footer">
                <div class="container d-flex justify-content-between">
                    <a href="<?= base_url('alternatif'); ?>" class="btn btn-sm btn-outline-danger"><li class="fa fa-arrow-left"></li>&nbsp;Kembali</a>
                    <button class="btn btn-sm btn-success"><li class="fa fa-save"></li>&nbsp;Simpan</button>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection(); ?>