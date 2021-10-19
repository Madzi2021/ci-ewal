<?php

namespace App\Controllers;

use App\Models\AssetModel;

class Asset extends BaseController
{
    protected $assetModel;
    public function __construct()
    {
        $this->assetModel = new AssetModel();
    }

    public function index()
    {
        $asset = $this->assetModel->findAll();

        $data = [
            'asset' => $asset
        ];

        return view('asset/content', $data);
    }

    public function simpan()
    {
        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('asset-baru'), '-', true);
        $this->assetModel->save([
            'namaasset' => $this->request->getVar('asset-baru'),
            'slug' => $slug,
            'nilai' => 0
        ]);

        return redirect()->to('/asset');
    }
}
