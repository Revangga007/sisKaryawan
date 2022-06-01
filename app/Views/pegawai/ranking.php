<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Profil <?= session('nama') ?? 'Unknown' ?></h6>
        </div>
        <div class="card-body">
            <div class="mb-5">
                <strong>Anda Peringkat <?=$history_detail['ranking']?> Dari <?= $jumlah; ?></strong>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <p><strong>Nilai Alternatif</strong></p>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <?php foreach($kriterias as $kriteria) : ?>
                                <?php foreach($alternatifs as $alternatif) :?>
                                    <?php if($kriteria['kode'] == $alternatif['kode_kriteria']) :?>
                                    <tr>
                                        <td width="80%"><?= $kriteria['nama']; ?></td>
                                        <td><?= $alternatif['nilai_kriteria']; ?></td>
                                    </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </table>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>