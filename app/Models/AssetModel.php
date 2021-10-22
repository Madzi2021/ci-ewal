<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'kodeakun';

    protected $useTimestamps = true;
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diupdate';
    protected $deletedField  = 'dihapus';

    protected $allowedFields = ['namaakun', 'slug', 'nilai', 'tipeakun', 'keterangan'];
}
