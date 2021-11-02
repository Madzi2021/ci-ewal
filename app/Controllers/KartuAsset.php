<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\TransaksiModel;

class KartuAsset extends BaseController
{
    protected $assetModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->assetModel = new AssetModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        // $transaksi = $this->transaksiModel->where('akundebet', 3)->orWhere('akunkredit', 3)->findAll();
        $transaksi = $this->transaksiModel
            ->select('tanggal, kodeakun, namaakun, tipeakun, akunkredit, akundebet, transaksi.keterangan, transaksi.nilai')
            ->join('akun', 'akun.kodeakun = transaksi.akundebet or akun.kodeakun = transaksi.akunkredit', 'inner')
            ->where('kodeakun', 1)
            ->where('month(tanggal)', date("m"))
            ->where('year(tanggal)', date("Y"))
            ->where('jenistransaksi', 'REGISTER AKUN')->findAll();
        // dd($transaksi);
        $akun = $this->assetModel->findAll();
        $data = [
            'transaksi' => $transaksi,
            'akun' => $akun,
            'daftarTahun' => [
                date("Y"),
                date("Y") - 1
            ],
            'bulan' => date("m"),
            'daftarBulan' => [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ],
            'namaAkun' => 'Equity',
            'tahun' => date("Y")
        ];

        echo view('kartu-asset/content', $data);
    }

    public function cari()
    {
        $transaksi = $this->transaksiModel->select('tanggal, kodeakun, namaakun, tipeakun, akunkredit, akundebet, transaksi.keterangan, transaksi.nilai')->join('akun', 'akun.kodeakun = transaksi.akundebet or akun.kodeakun = transaksi.akunkredit', 'inner')->where('kodeakun', $_POST['kodeakun'])->where('month(tanggal)', $_POST['bulan'])->where('year(tanggal)', $_POST['tahun'])->where('jenistransaksi', 'REGISTER AKUN')->findAll();
        // dd($transaksi);
        // $transaksi = $this->transaksiModel->where('akundebet', $_POST['kodeakun'])->orWhere('akunkredit', $_POST['kodeakun'])->findAll();
        $akun = $this->assetModel->findAll();
        $namaAkun = $this->assetModel->where('kodeakun', $_POST['kodeakun'])->first();
        $data = [
            'transaksi' => $transaksi,
            'akun' => $akun,
            'daftarTahun' => [
                date("Y"),
                date("Y") - 1
            ],
            'bulan' => $_POST['bulan'],
            'daftarBulan' => [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ],
            'namaAkun' => $namaAkun['namaakun'],
            'tahun' => $_POST['tahun']
        ];

        echo view('kartu-asset/content', $data);
    }
}
