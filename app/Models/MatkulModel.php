<?php 

namespace App\Models;

use CodeIgniter\Model;

class MatkulModel extends Model {
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_matkul';
    protected $allowedFields = ['nama_matkul'];
}