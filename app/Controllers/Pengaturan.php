<?php

namespace App\Controllers;

class Pengaturan extends BaseController
{
    public function index()
    {
        echo view('pengaturan/content');
    }

    public function detail()
    {
        echo view('pengaturan/detail');
    }
}
