<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'kodeasset';

    protected $useTimestamps = true;
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diupdate';
    protected $deletedField  = 'dihapus';

    protected $allowedFields = ['namaasset', 'slug', 'nilai'];
}
