<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <div class="judul">
        <label class="name">Pendapatan</label>
        <ul>
            <li id="period-link"><a href="#">Pendapatan <?= strftime("%e %B %Y", $tanggal); ?></a></li>
            <li>></li>
            <li id="period-link"><a href="#">Detail Pendapatan</a></li>
        </ul>
    </div>

    <div class="row mb-2 justify-content-between ">
        <div class="col-5">
            <div class="input-group">
                <span class="input-group-text">Periode</span>
                <select class="form-select" aria-label="Default select example">
                    <option value="<?php echo strftime("%e", $tanggal); ?>"><?php echo strftime("%e", $tanggal); ?></option>
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option value="<?php echo strftime("%B", $tanggal); ?>"><?php echo strftime("%B", $tanggal); ?></option>
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option value="<?php echo strftime("%Y", $tanggal); ?>"><?php echo strftime("%Y", $tanggal); ?></option>
                </select>
            </div>
        </div>
        <a href="#" class="btn btn-dark col-2" id="tambah">Tambah Data</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Kategori</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mutasi as $key) : ?>
                <tr>
                    <td><?= $key['akun']; ?></td>
                    <td><?= $key['keterangan']; ?></td>
                    <td class="text-end"><?= number_format($key['nilai'], 2); ?></td>
                    <td class="text-end"><a href="#"><span class="material-icons">delete</span></a></td>
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
<?= $this->endSection(); ?>