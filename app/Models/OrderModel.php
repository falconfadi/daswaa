<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'client_id',
        'service_id',
        'is_regular',
        'mobile',
        'landline',
    ];

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

    public function client()
    {
        return $this->belongsTo('client', 'App\Models\ClientModel','client_id');
        // $this->belongsTo('propertyName', 'model', 'foreign_key', 'owner_key');
    }

    public function service()
    {
        return $this->belongsTo('service','App\Models\CustomerServiceModel','service_id');

    }
}
