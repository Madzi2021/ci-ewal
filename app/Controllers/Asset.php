<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\TransaksiModel;

class Asset extends BaseController
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
        $asset = $this->assetModel->where('tipeakun', 1)->findAll();

        $data = [
            'asset' => $asset,
        ];

        return view('asset/content', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'asset-baru' => [
                'rules' => 'is_unique[akun.namaakun]',
                'errors' => [
                    'is_unique' => 'Nama Asset sudah ada di-database'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            $asset = $this->assetModel->where('tipeakun', 1)->findAll();

            $data = [
                'asset' => $asset,
                'validation' => $validation->getErrors()
            ];

            return view('asset/content', $data);
        }

        $namaAkun = $this->request->getVar('asset-baru');

        if ($namaAkun != "") {
            $slug = url_title($this->request->getVar('asset-baru'), '-', true);
            $this->assetModel->save([
                'namaakun' => $this->request->getVar('asset-baru'),
                'slug' => $slug,
                'nilai' => 0,
                'tipeakun' => 1
            ]);
        } else {
            $namaAkun = $this->request->getVar('asset');
        }

        $curAsset = $this->assetModel->where('namaakun', $namaAkun)->first();
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


        return redirect()->to('/asset');
    }


    public function kurangi()
    {
        $namaAkun = $this->request->getVar('asset');

        $curAsset = $this->assetModel->where('namaakun', $namaAkun)->first();
        $equity = $this->assetModel->where('slug', 'equity')->first();
        $this->transaksiModel->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nilai' => $this->request->getVar('nilai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'akunkredit' => $curAsset['kodeakun'],
            'akundebet' => $equity['kodeakun'],
            'jenistransaksi' => 'REGISTER AKUN'
        ]);

        $updateNilai = $curAsset['nilai'] - $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $curAsset['kodeakun'],
            'nilai' => $updateNilai
        ]);

        $updateEquity = $equity['nilai'] - $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $equity['kodeakun'],
            'nilai' => $updateEquity
        ]);

        return redirect()->to('/asset');
    }

    public function ubah()
    {
        if (!$this->validate([
            'namaakun' => [
                'rules' => 'is_unique[akun.namaakun]',
                'errors' => [
                    'is_unique' => 'Nama Asset sudah ada di-database'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            $asset = $this->assetModel->where('tipeakun', 1)->findAll();

            $data = [
                'asset' => $asset,
                'validation' => $validation->getErrors()
            ];

            return view('asset/content', $data);
        }

        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('namaakun'), '-', true);
        $this->assetModel->save([
            'kodeakun' => $this->request->getVar('kodeakun'),
            'namaakun' => $this->request->getVar('namaakun'),
            'slug' => $slug
        ]);

        return redirect()->to('/asset');
    }

    public function error()
    {
        return view('pesan-error');
    }
}
