<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <div class="judul">
        <label class="name">Pendapatan</label>
        <ul>
            <li id="period-link"><a href="#">Pendapatan Januari 2021</a></li>
            <li>></li>
            <li id="period-link"><a href="#">Detail Pendapatan</a></li>
        </ul>
    </div>

    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php foreach ($validation as $val) : ?>
                <?= $val; ?>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row mb-2">
        <div class="col-4">
            <div class="input-group">
                <span class="input-group-text">Periode</span>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Tahun</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>

        <div class="col-1">
            <div class="input-group">
                <button type="submit" class="btn btn-dark">Terapkan</button>
            </div>
        </div>

        <div class="col-7">
            <div class="rata-kanan">
                <a href="#" class="btn btn-dark" id="tambah" data-bs-toggle="modal" data-bs-target="#tambah-pendapatan">Tambah Data</a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mutasi as $key) : ?>
                <tr>
                    <td><a href="/pendapatan/detail/<?= $key['tanggal']; ?>" id="trans"><?= $key['tanggal']; ?></a></td>
                    <td class="text-end"><?= number_format($key['nilai'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="row">
        <div class="col">
            <div class="d-flex flex-row-reverse paging">
                <a href="#" class="br">Next</a>
                <a href="#" class="br">3</a>
                <a href="#" class="br">2</a>
                <a href="#" class="br">1</a>
                <a href="#" class="bl br">Previous</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pendapatan -->
<div class="modal fade" id="tambah-pendapatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/pendapatan/tambah" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pendapatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal-tambah" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal-tambah" name="tanggal" required>
                    </div>
                    <div class="mb-3 baru">
                        <label for="pilih-asset" class="form-label">Masuk ke Asset</label>
                        <select class="form-select" aria-label="Default select example" id="pilih-asset" name="asset" required>
                            <?php foreach ($asset as $key) : ?>
                                <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 baru" id="div-baru">
                        <label for="taambah-akun" class="form-label">Kategori Pendapatan</label>

                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" id="tambah-akun" name="kategori">
                                <?php foreach ($pendapatan as $key) : ?>
                                    <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <a href="#" class="btn btn-dark" id="tombol-asset-baru">+</a>
                        </div>
                        <input type="text" class="form-control" id="asset-baru" name="asset-baru">
                    </div>
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Masukkan Nilai</label>
                        <input type="number" class="form-control" id="tambah-nilai" name="nilai" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="tambah-keterangan" rows="3" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>