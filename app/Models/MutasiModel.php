<?php

namespace App\Models;

use CodeIgniter\Model;

class MutasiModel extends Model
{
    protected $table = 'mutasi';
    protected $primaryKey = 'kodemutasi';

    protected $useTimestamps = true;
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diupdate';
    protected $deletedField  = 'dihapus';

    protected $allowedFields = ['tanggal', 'akun', 'nilai', 'keterangan'];
}
