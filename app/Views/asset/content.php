<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <div class="judul">
        <label class="name">Asset</label>
        <!-- <ul>
            <li id="period-link"><a href="#">Asset</a></li>
            <li>></li>
            <li id="period-link"><a href="#">Detail Asset</a></li>
        </ul> -->
    </div>

    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php foreach ($validation as $val) : ?>
                <?= $val; ?>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row mb-2 justify-content-between ">
        <div class="col-4">

        </div>
        <div class="col-6 d-flex flex-row-reverse">
            <a href="#" class="btn btn-dark" id="tambah" data-bs-toggle="modal" data-bs-target="#kurangi-asset">Kurangi Asset</a>
            <a href="#" class="btn btn-dark" id="tambah" data-bs-toggle="modal" data-bs-target="#tambah-asset">Tambah Asset</a>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Nama Asset</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asset as $key) : ?>
                <tr>
                    <td><a href="#" class="akun" data-bs-toggle="modal" data-bs-target="#ubah-asset" data-id="<?php echo $key['kodeakun'] ?>" data-nilai="<?php echo $key['nilai'] ?>" data-nama="<?php echo $key['namaakun'] ?>"><?php echo $key['namaakun'] ?></a></td>
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

<!-- Modal Tambah Asset -->
<div class="modal fade" id="tambah-asset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/asset/tambah" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal-tambah" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal-tambah" name="tanggal" required>
                    </div>
                    <div class="mb-3 baru" id="div-baru">
                        <label for="asset" class="form-label">Pilih Asset</label>

                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" id="tambah-akun" name="asset">
                                <?php foreach ($asset as $key) : ?>
                                    <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <a href="#" class="btn btn-dark" id="tombol-asset-baru">+</a>
                            <!-- <button class="btn btn-dark" type="button" id="tombol-asset-baru">+</button> -->
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

<!-- Modal Kurangi Asset -->
<div class="modal fade" id="kurangi-asset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/asset/kurangi" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kurangi Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal-kurangi" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal-kurangi" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="asset" class="form-label">Pilih Asset</label>
                        <select class="form-select" aria-label="Default select example" id="kurangi-asset" name="asset">
                            <?php foreach ($asset as $key) : ?>
                                <option value="<?= $key['namaakun']; ?>"><?= $key['namaakun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nilai" class="form-label">Masukkan Nilai</label>
                        <input type="number" class="form-control" id="-kurangi-nilai" name="nilai" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="kurangi-keterangan" rows="3" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Asset -->
<div class="modal fade" id="ubah-asset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/asset/ubah" method="POST">
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