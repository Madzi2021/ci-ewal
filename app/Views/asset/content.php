<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <div class="judul">
        <label class="name">Asset</label>
        <ul>
            <li id="period-link"><a href="#">Asset</a></li>
            <li>></li>
            <li id="period-link"><a href="#">Detail Asset</a></li>
        </ul>
    </div>

    <div class="row mb-2 justify-content-between ">
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
                    <td><a href="#" id="trans"><?php echo $key['namaasset'] ?></a></td>
                    <td class="text-end"><?php echo $key['nilai'] ?></td>
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
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Asset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 baru" id="div-baru">
                    <label for="asset" class="form-label">Pilih Asset</label>

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" id="asset">
                            <option selected>Open this select asset</option>
                            <option value="1">Kas</option>
                            <option value="2">Bank</option>
                        </select>
                        <a href="#" class="btn btn-dark" id="tombol-asset-baru">+</a>
                        <!-- <button class="btn btn-dark" type="button" id="tombol-asset-baru">+</button> -->
                    </div>
                    <input type="text" class="form-control" id="asset-baru">
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Masukkan Nilai</label>
                    <input type="number" class="form-control" id="nilai">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kurangi Asset -->
<div class="modal fade" id="kurangi-asset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Kurangi Asset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="asset" class="form-label">Pilih Asset</label>
                    <select class="form-select" aria-label="Default select example" id="asset">
                        <option selected>Open this select asset</option>
                        <option value="1">Kas</option>
                        <option value="2">Bank</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Masukkan Nilai</label>
                    <input type="number" class="form-control" id="nilai">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>