<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#simpanModal">
    <li class="fas fa-save"></li> Simpan ke history
    </button>

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
        <h6 class="m-0 font-weight-bold text-primary">Perhitungan Pangkat Bobot</h6>
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
                    <?php foreach($pegawais as $key => $pegawai) :
                            $total = 0; 
                            foreach($kriterias as $key => $kriteria) : 
                                foreach($alternatifs as $key => $alternatif) : 
                                    if($alternatif['kode_kriteria'] == $kriteria['kode'] && $alternatif['kode_pegawai'] == $pegawai['kode']) :
                                        $hasil[$pegawai['kode']][] = pow($alternatif['nilai_kriteria'] , ($kriteria['bobot']/$jumlah['bobot']));
                                    endif;
                                endforeach;
                            endforeach;
                            // dd($hasil);
                            foreach($hasil[$pegawai['kode']] as $key => $value) :
                                if($key == 0) : 
                                    $total = $value;
                                else :
                                    $total *= $value;
                                endif;
                            endforeach;
                            $arrayVektorS[$pegawai['kode']][] = $total;
                    ?>
                    <tr>
                        <td><?= $pegawai['kode']; ?></td>
                        <td><?= $total; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php 
                        $jumlahVektorS = 0;
                        foreach($arrayVektorS as $vektor){
                            $jumlahVektorS += $vektor[0];
                        } ?>
                    <tr>
                        <td><strong>JUMLAH</strong></td>
                        <td><strong><?= $jumlahVektorS; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perhitungan Nilai V</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="50%">Alternatif</th>
                        <th width="50%">V</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jumlahVektorV = 0;
                    foreach($arrayVektorS as $key => $vektorV) : 
                    ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $vektorV[0] / $jumlahVektorS; ?></td>
                    </tr>
                    <?php 
                        $arrayVektorV[$key] = $vektorV[0] / $jumlahVektorS;
                        $jumlahVektorV += $vektorV[0] / $jumlahVektorS;
                    endforeach;

                    arsort($arrayVektorV);
                    ?>
                    <tr>
                        <td><strong>JUMLAH</strong></td>
                        <td><?= $jumlahVektorV; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perhitungan Perankingan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="50%">Alternatif</th>
                        <th width="50%">Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ranking = 1; 
                    foreach($arrayVektorV as $key => $value) : ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $ranking++; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil akhir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="50%">Alternatif</th>
                        <th width="50%">Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ranking = 1; 
                    foreach($arrayVektorV as $key => $value) : 
                        foreach ($pegawais as $pegawai) :
                            if($key == $pegawai['kode']) :
                    ?>
                    
                    <tr>
                        <td><?= $pegawai['nama']; ?></td>
                        <td><?= $ranking++; ?></td>
                    </tr>
                    <?php 
                            endif;
                        endforeach;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

          <div class="modal fade" id="simpanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atur Periode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('perhitungan/store') ?>" method="post">
            <?php foreach($arrayVektorV as  $key => $value) : ?>
            <input type="hidden" name="vektors[<?= $key ?>]" value="<?= $value ?>">
            <?php endforeach; ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="periode_awal">Periode Awal</label>
                            <input type="date" name="periode_awal" id="periode_awal" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="periode_akhir">Periode Akhir</label>
                            <input type="date" name="periode_akhir" id="periode_akhir" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    </div>
<?= $this->endSection(); ?>
