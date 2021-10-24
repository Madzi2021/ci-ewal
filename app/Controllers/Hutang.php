<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\TransaksiModel;

class Hutang extends BaseController
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
        $hutang = $this->assetModel->where('tipeakun', 2)->findAll();
        $asset = $this->assetModel->where('tipeakun', 1)->findAll();
        $data = [
            'hutang' => $hutang,
            'asset' => $asset
        ];
        echo view('hutang/content', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'hutangbaru' => [
                'rules' => 'is_unique[akun.namaakun]',
                'errors' => [
                    'is_unique' => 'Nama Hutang sudah ada di-database'
                ]
            ],
            'hutangbaruasset' => [
                'rules' => 'is_unique[akun.namaakun]',
                'errors' => [
                    'is_unique' => "Nama Asset sudah ada di-database"
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            $asset = $this->assetModel->where('tipeakun', 2)->findAll();

            $data = [
                'asset' => $asset,
                'validation' => $validation->getErrors()
            ];

            return view('hutang/content', $data);
        }

        $namaHutang = $this->request->getVar('hutangbaru');
        if ($namaHutang != "") {
            $slug = url_title($this->request->getVar('hutangbaru'), '-', true);
            $this->assetModel->save([
                'namaakun' => $this->request->getVar('hutangbaru'),
                'slug' => $slug,
                'nilai' => 0,
                'tipeakun' => 2
            ]);
        } else {
            $namaHutang = $this->request->getVar('hutang');
        }

        $namaAsset = $this->request->getVar('hutangbaruasset');
        if ($namaAsset != "") {
            $slug = url_title($this->request->getVar('hutangbaruasset'), '-', true);
            $this->assetModel->save([
                'namaakun' => $this->request->getVar('hutangbaruasset'),
                'slug' => $slug,
                'nilai' => 0,
                'tipeakun' => 1
            ]);
        } else {
            $namaAsset = $this->request->getVar('asset');
        }

        $curHutang = $this->assetModel->where('namaakun', $namaHutang)->first();
        $curAsset = $this->assetModel->where('namaakun', $namaAsset)->first();
        $this->transaksiModel->save([
            'nilai' => $this->request->getVar('nilai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'akundebet' => $curAsset['kodeakun'],
            'akunkredit' => $curHutang['kodeakun'],
            'jenistransaksi' => 'REGISTER AKUN'
        ]);

        $updateNilai = $curAsset['nilai'] + $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $curAsset['kodeakun'],
            'nilai' => $updateNilai
        ]);

        $updateHutang = $curHutang['nilai'] + $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $curHutang['kodeakun'],
            'nilai' => $updateHutang
        ]);


        return redirect()->to('/hutang');
    }

    public function bayar()
    {
        $namaHutang = $this->request->getVar('hutang');
        $namaAsset = $this->request->getVar('asset');

        $curHutang = $this->assetModel->where('namaakun', $namaHutang)->first();
        $curAsset = $this->assetModel->where('namaakun', $namaAsset)->first();
        $this->transaksiModel->save([
            'nilai' => $this->request->getVar('nilai'),
            'keterangan' => $this->request->getVar('keterangan'),
            'akunkredit' => $curAsset['kodeakun'],
            'akundebet' => $curHutang['kodeakun'],
            'jenistransaksi' => 'REGISTER AKUN'
        ]);

        $updateNilai = $curAsset['nilai'] - $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $curAsset['kodeakun'],
            'nilai' => $updateNilai
        ]);

        $updateHutang = $curHutang['nilai'] - $this->request->getVar('nilai');
        $this->assetModel->save([
            'kodeakun' => $curHutang['kodeakun'],
            'nilai' => $updateHutang
        ]);


        return redirect()->to('/hutang');
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

        return redirect()->to('/hutang');
    }
}
