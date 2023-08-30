<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table      = 'cities';
    protected $primaryKey = 'id';
    //protected $returnType = 'array';

    protected $allowedFields = ['name'];
    protected function initialize()
    {
        $this->allowedFields[] = 'middlename';
    }
}