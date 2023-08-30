<?php

namespace App\Controllers;

use App\Models\CityModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = array();
        $cityM = new CityModel();
        $data['cities' ] =$cityM->findAll();
       // echo view('welcome_message',$data);
        echo view('homepage',$data);
    }
}
