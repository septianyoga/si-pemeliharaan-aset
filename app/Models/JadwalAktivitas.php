<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalAktivitas extends Model
{
    protected $table            = 'jadwal_aktivitas';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tanggal',
        'id_driver',
        'id_aset',
        'aktivitas',
        'status'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getDataLast14Days()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->select("DATE(tanggal) as date, 
                SUM(CASE WHEN status = 'Diantar' THEN 1 ELSE 0 END) as diantar, 
                SUM(CASE WHEN status = 'Sampai' THEN 1 ELSE 0 END) as sampai")
            ->where('tanggal >=', date('Y-m-d', strtotime('-14 days')))
            ->groupBy('DATE(tanggal)')
            ->orderBy('date', 'ASC')
            ->get();

        return $query->getResultArray();
    }
}
