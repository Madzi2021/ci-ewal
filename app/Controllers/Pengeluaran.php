<?php

namespace App\Controllers;

class Pengeluaran extends BaseController
{
    public function index()
    {
        echo view('pengeluaran/content');
    }
}
