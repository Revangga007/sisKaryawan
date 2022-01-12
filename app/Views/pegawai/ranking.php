<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Profil <?= session('nama') ?? 'Unknown' ?></h6>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-5">
                <strong>Ranking : <?=$history_detail['ranking']?></strong>
                <strong>Hasil Akhir : <?=$history_detail['hasil_akhir']?></strong>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th colspan="3" class="text-center">Nilai Alternatif</th>
                            </tr>
                            <?php foreach($kriterias as $kriteria) : ?>
                                <?php foreach($alternatifs as $alternatif) :?>
                                    <?php if($kriteria['kode'] == $alternatif['kode_kriteria']) :?>
                                    <tr>
                                        <td><?= $kriteria['nama']; ?></td>
                                        <td width="2%">:</td>
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