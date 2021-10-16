<?php

namespace App\Controllers;

class Pendapatan extends BaseController
{
    public function index()
    {
        echo view('pendapatan/content');
    }

    public function detail()
    {
        echo view('pendapatan/detail');
    }
}
