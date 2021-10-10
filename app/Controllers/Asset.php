<?php

namespace App\Controllers;

class Asset extends BaseController
{
    public function index()
    {
        echo view('asset/content');
    }
}
