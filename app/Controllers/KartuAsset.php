<?php

namespace App\Controllers;

class KartuAsset extends BaseController
{
    public function index()
    {
        echo view('kartu-asset/content');
    }
}
