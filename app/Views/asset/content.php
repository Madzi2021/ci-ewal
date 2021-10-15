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
            <a href="#" class="btn btn-dark" id="tambah">Kurangi Asset</a>
            <a href="#" class="btn btn-dark" id="tambah">Tambah Asset</a>
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
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <tr>
                    <td><a href="#" id="trans">BCA (08199283989)</a></td>
                    <td class="text-end">149.000</td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>