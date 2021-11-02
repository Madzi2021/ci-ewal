<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="home-content">
    <div class="judul">
        <label class="name">Kartu Aset & Hutang</label>
        <ul>
            <li id="period-link"><a href="#">Perubahan <?= $namaAkun; ?> <?= $daftarBulan[date("m") - 1]; ?> <?= $tahun; ?></a></li>
        </ul>
    </div>

    <form action="/kartuasset/cari" method="post">
        <div class="row mb-2 ">
            <div class="col-4">
                <div class="input-group">
                    <span class="input-group-text">Periode</span>
                    <select class="form-select" aria-label="Default select example" name="bulan">
                        <option value="1" <?php if ($bulan == 1) {
                                                echo "selected";
                                            } ?>>Januari</option>
                        <option value="2" <?php if ($bulan == 2) {
                                                echo "selected";
                                            } ?>>Februari</option>
                        <option value="3" <?php if ($bulan == 3) {
                                                echo "selected";
                                            } ?>>Maret</option>
                        <option value="4" <?php if ($bulan == 4) {
                                                echo "selected";
                                            } ?>>April</option>
                        <option value="5" <?php if ($bulan == 5) {
                                                echo "selected";
                                            } ?>>Mei</option>
                        <option value="6" <?php if ($bulan == 6) {
                                                echo "selected";
                                            } ?>>Juni</option>
                        <option value="7" <?php if ($bulan == 7) {
                                                echo "selected";
                                            } ?>>Juli</option>
                        <option value="8" <?php if ($bulan == 8) {
                                                echo "selected";
                                            } ?>>Agustus</option>
                        <option value="9" <?php if ($bulan == 9) {
                                                echo "selected";
                                            } ?>>September</option>
                        <option value="10" <?php if ($bulan == 10) {
                                                echo "selected";
                                            } ?>>Oktober</option>
                        <option value="11" <?php if ($bulan == 11) {
                                                echo "selected";
                                            } ?>>November</option>
                        <option value="12" <?php if ($bulan == 12) {
                                                echo "selected";
                                            } ?>>Desember</option>
                    </select>
                    <select class="form-select" aria-label="Default select example" name="tahun">
                        <?php foreach ($daftarTahun as $key) : ?>
                            <option value="<?= $key; ?>"><?= $key; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-3">
                <div class="input-group">
                    <span class="input-group-text">Asset / Hutang</span>
                    <select class="form-select" aria-label="Default select example" name="kodeakun">
                        <?php foreach ($akun as $key) : ?>
                            <option value="<?= $key['kodeakun']; ?>" <?php if ($key['namaakun'] == $namaAkun) {
                                                                            echo "selected";
                                                                        } ?>><?= $key['namaakun']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-1">
                <div class="input-group">
                    <button type="submit" class="btn btn-dark">Terapkan</button>
                </div>
            </div>
        </div>
    </form>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key) : ?>
                <tr>
                    <td><a href="#" id="trans"><?= $key['tanggal']; ?></a></td>
                    <td><?= $key['keterangan']; ?></td>
                    <td class="text-end"><?php if ($key['tipeakun'] == 1) {
                                                if ($key['kodeakun'] == $key['akunkredit']) {
                                                    $key['nilai'] *= -1;
                                                }
                                            } else {
                                                if ($key['kodeakun'] == $key['akundebet']) {
                                                    $key['nilai'] *= -1;
                                                }
                                            }

                                            echo number_format($key['nilai'], 2); ?></td>
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