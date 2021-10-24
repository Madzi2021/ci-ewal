<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <div class="judul">
        <label class="name">Hutang</label>
        <!-- <ul>
            <li id="period-link"><a href="#">Hutang</a></li>
            <li>></li>
            <li id="period-link"><a href="#">Bayar Hutangku</a></li>
        </ul> -->
    </div>

    <div class="row mb-2 justify-content-between ">
        <div class="col-4">
            <!-- <div class="input-group">
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
            </div> -->
        </div>
        <div class="col-6 d-flex flex-row-reverse">
            <a href="#" class="btn btn-dark" id="tambah" data-bs-toggle="modal" data-bs-target="#bayar-hutang">Bayar Hutang</a>
            <a href="#" class="btn btn-dark" id="tambah" data-bs-toggle="modal" data-bs-target="#tambah-hutang">Tambah Hutang</a>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Nama Hutang</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hutang as $key) : ?>
                <tr>
                    <td><a href="#" class="akun" data-bs-toggle="modal" data-bs-target="#ubah-hutang" data-id="<?php echo $key['kodeakun'] ?>" data-nilai="<?php echo $key['nilai'] ?>" data-nama="<?php echo $key['namaakun'] ?>"><?php echo $key['namaakun'] ?></a></td>
                    <td class="text-end"><?php echo number_format($key['nilai'], 2); ?></td>
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

<!-- Modal Tambah Hutang -->
<div class="modal fade" id="tambah-hutang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Hutang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hutang/tambah" method="POST">
                <div class="modal-body">
                    <div class="mb-3 baru" id="div-baru">
                        <label for="asset" class="form-label">Pilih Hutang</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" id="tambah-akun-hutang" name="hutang">
                                <?php foreach ($hutang as $key) : ?>
                                    <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <a href="#" class="btn btn-dark" id="tombol-hutang-baru">+</a>
                        </div>
                        <input type="text" class="form-control" id="hutang-baru" name="hutangbaru">
                    </div>
                    <div class="mb-3 baru" id="div-baru-asset">
                        <label for="asset" class="form-label">Pilih Asset</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" id="tambah-hutang-asset" name="asset">
                                <?php foreach ($asset as $key) : ?>
                                    <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <a href="#" class="btn btn-dark" id="tombol-hutang-baru-asset">+</a>
                        </div>
                        <input type="text" class="form-control" id="hutang-baru-asset" name="hutangbaruasset">
                    </div>
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Masukkan Nilai</label>
                        <input type="number" class="form-control" id="tambah-hutang-nilai" name="nilai" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="tambah-hutang-keterangan" rows="3" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Bayar Hutang -->
<div class="modal fade" id="bayar-hutang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Bayar Hutang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hutang/bayar" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="asset" class="form-label">Pilih Hutang</label>
                        <select class="form-select" aria-label="Default select example" id="hapus-akun-hutang" name="hutang">
                            <?php foreach ($hutang as $key) : ?>
                                <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="asset" class="form-label">Bayar Menggunakan</label>
                        <select class="form-select" aria-label="Default select example" id="hapus-hutang-asset" name="asset">
                            <?php foreach ($asset as $key) : ?>
                                <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Masukkan Nilai</label>
                        <input type="number" class="form-control" id="hapus-hutang-nilai" name="nilai">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="hapus-hutang-keterangan" rows="3" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Hutang -->
<div class="modal fade" id="ubah-hutang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/hutang/ubah" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namaakun" class="form-label">Nama Asset</label>
                        <input type="text" class="form-control" id="ubah-nama-akun" name="namaakun" required>
                        <input type="hidden" class="form-control" id="ubah-kode-akun" name="kodeakun" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Nilai</label>
                        <input type="text" class="form-control" id="ubah-nilai" name="nilai" required disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>