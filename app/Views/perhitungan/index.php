<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Matrix alternatif - kriteria</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10%"><?= strToUpper('kode'); ?></th>
                            <th width="30%"><?= strToUpper('nama'); ?></th>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                            <th><?= $kriteria['kode']; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pegawais as $key => $pegawai) : ?>
                        <tr>
                            <td><?= $pegawai['kode']; ?></td>
                            <td><?= $pegawai['nama']; ?></td>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                                <?php foreach($alternatifs as $key => $alternatif) : ?>
                                    <?php if($alternatif['kode_kriteria'] == $kriteria['kode'] && $alternatif['kode_pegawai'] == $pegawai['kode']) : ?>
                                        <td><?= $alternatif['nilai_kriteria']; ?></td>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perhitungan Bobot Kepentingan</h6>
        </div>
        <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Bobot/ kriteria</td>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                            <th><?= $kriteria['kode']; ?></td>
                            <?php endforeach; ?>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bobot kepentingan</td>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                            <td><?= $kriteria['bobot']/$jumlah['bobot']; ?></td>
                            <?php endforeach; ?>
                            <td><?= $jumlah['bobot']/$jumlah['bobot']; ?></td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perhitungan Bobot Kepentingan</h6>
        </div>
        <div class="card-body">
             <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Bobot/ kriteria</td>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                            <th><?= $kriteria['kode']; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Status kriteria</td>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                            <td><?= $kriteria['status']; ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <td>Pangkat</td>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                            <td><?= $kriteria['bobot']/$jumlah['bobot']; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perhitungan Nilai S</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50%">Alternatif</th>
                            <th width="50%">S</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pegawais as $key => $pegawai) : ?>
                            <?php foreach($kriterias as $key => $kriteria) : ?>
                                <?php foreach($alternatifs as $key => $alternatif) : ?>
                                    <?php if($alternatif['kode_kriteria'] == $kriteria['kode'] && $alternatif['kode_pegawai'] == $pegawai['kode']) : ?>
                                        <?php $hasil[] = pow($alternatif['nilai_kriteria'] , ($kriteria['bobot']/$jumlah['bobot'])); ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                                <?php dd($hasil); ?>
                        <tr>
                            <td><?= $pegawai['nama']; ?></td>
                            <td>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
<?= $this->endSection(); ?>
