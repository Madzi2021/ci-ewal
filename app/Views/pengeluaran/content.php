<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <h3 class="mt-3 mb-3">Pengeluaran</h3>

    <div class="row mb-2">
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text">Bulan</span>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="col-6 justify-content-end">
            <a href="#" class="btn btn-dark float-right">Tambah Data</a>
        </div>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>20 Oktober 2020</td>
                <td>149.000</td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>