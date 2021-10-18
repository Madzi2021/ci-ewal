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
}
