<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        echo view('profil/content');
    }
}
