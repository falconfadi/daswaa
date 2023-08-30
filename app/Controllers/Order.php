<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerServiceModel;
use App\Models\OrderModel;

class Order extends BaseController
{
    public function index()
    {
        $title = "إضافة طلب";
        $data['title'] = $title;
        $cServices = new CustomerServiceModel();

        $data['cServices' ] =$cServices->findAll();
        echo view('orders/add_order',$data);
    }

    public function store(){

        $order = new OrderModel();
        $first_name = $this->request->getPost('first_name');

        $data = [
            'first_name' => $first_name
        ];
        //$order->save($data);
        return redirect()->to('add-order')->with('status','Added Successfully');
    }
}
