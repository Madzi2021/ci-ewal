<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\MutasiModel;
use App\Models\TransaksiModel;

class Pendapatan extends BaseController
{
    protected $assetModel;
    protected $transaksiModel;
    protected $mutasiModel;

    public function __construct()
    {
        $this->assetModel = new AssetModel();
        $this->transaksiModel = new TransaksiModel();
        $this->mutasiModel = new MutasiModel();
    }

    public function index()
    {
        $asset = $this->assetModel->where('tipeakun', 1)->findAll();
        $pendapatan = $this->assetModel->where('tipeakun', 4)->findAll();
        $mutasi = $this->mutasiModel->select('tanggal')
            ->selectSum('nilai', 'nilai')->groupBy('tanggal')->findAll();

        $data = [
            'asset' => $asset,
            'pendapatan' => $pendapatan,
            'mutasi' => $mutasi
        ];

        echo view('pendapatan/content', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'asset-baru' => [
                'rules' => 'is_unique[akun.namaakun]',
                'errors' => [
                    'is_unique' => 'Nama ini sudah ada di-database'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $asset = $this->assetModel->where('tipeakun', 1)->findAll();
            $pendapatan = $this->assetModel->where('tipeakun', 4)->findAll();
            $mutasi = $this->mutasiModel->findAll();

            $data = [
                'asset' => $asset,
                'validation' => $validation->getErrors(),
                'pendapatan' => $pendapatan,
                'mutasi' => $mutasi
            ];

            return view('pendapatan/content', $data);
        }

        $namaAkun = $this->request->getVar('asset-baru');

        if ($namaAkun != "") {
            $slug = url_title($this->request->getVar('asset-baru'), '-', true);
            $this->assetModel->save([
                'namaakun' => $this->request->getVar('asset-baru'),
                'slug' => $slug,
                'nilai' => 0,
                'tipeakun' => 4
            ]);
        } else {
            $namaAkun = $this->request->getVar('kategori');
        }

        $kategori = $this->assetModel->where('namaakun', $namaAkun)->first();
        $this->mutasiModel->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nilai' => $this->request->getVar('nilai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'akun' => $kategori['kodeakun']
        ]);

        $curAsset = $this->assetModel->where('namaakun', $this->request->getVar('asset'))->first();
        $equity = $this->assetModel->where('slug', 'equity')->first();
        $this->transaksiModel->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nilai' => $this->request->getVar('nilai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'akundebet' => $curAsset['kodeakun'],
            'akunkredit' => $equity['kodeakun'],
            'jenistransaksi' => 'REGISTER AKUN'
        ]);

        $updateNilai = $curAsset['nilai'] + $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $curAsset['kodeakun'],
            'nilai' => $updateNilai
        ]);

        $updateEquity = $equity['nilai'] + $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $equity['kodeakun'],
            'nilai' => $updateEquity
        ]);


        return redirect()->to('/pendapatan');
    }

    public function detail($tanggal = '2000-01-01')
    {
        $tgl = strtotime($tanggal);
        $mutasi = $this->mutasiModel
            ->select('akun.namaakun akun, mutasi.keterangan, mutasi.nilai')
            ->join('akun', 'akun.kodeakun = mutasi.akun', 'inner')
            ->where('tanggal', date('Y-m-d', $tgl))
            ->findAll();
        $data = [
            'tanggal' => $tgl,
            'mutasi' => $mutasi
        ];
        echo view('pendapatan/detail', $data);
    }
}
