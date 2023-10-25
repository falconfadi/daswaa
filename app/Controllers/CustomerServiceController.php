<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerServiceModel;

class CustomerServiceController extends BaseController
{
    public function index()
    {
        $title = "خدمات المشتركين";
        $data['title'] = $title;
        $services = new CustomerServiceModel();

        $data['services' ] =$services->findAll();
        echo view('services/index',$data);
    }
    public function add()
    {
        $title = "إضافة خدمة مشترك";
        $data['title'] = $title;
       
        echo view('services/add_service',$data);
    }
    

}
