<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kodetransaksi';

    protected $useTimestamps = true;
    protected $createdField  = 'dibuat';
    protected $updatedField  = 'diupdate';
    protected $deletedField  = 'dihapus';

    protected $allowedFields = ['tanggal', 'akundebet', 'akunkredit', 'nilai', 'jenistransaksi', 'keterangan'];
}
