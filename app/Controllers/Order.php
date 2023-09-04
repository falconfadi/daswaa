<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerServiceModel;
use App\Models\OrderModel;

class Order extends BaseController
{
    public $CI;
    public function __construct()
    {
        parent::__construct();


    }

    public function index()
    {
        $title = "الطلبات";
        $data['title'] = $title;
        $cServices = new CustomerServiceModel();

        $data['cServices' ] =$cServices->findAll();
        echo view('orders/index',$data);
    }

    public function add()
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
        $deliveredData = array(
            'is_regular' => $this->request->getPost('is_regular'),

        );
        $session = session();
        $session->set('deliveredData',$deliveredData);
        //$this->session->set_userdata('deliveredData', $deliveredData);
        return redirect()->to('add-order-details')/*->with('status','Added Successfully');*/;
    }

    public function orderDetails(){
//        if(session()->getFlashdata('status')){
//            echo session()->getFlashdata('status');
//        }
        $data = array();
        $title = "تفاصيل الطلب";
        $data['title'] = $title;
        $array = session()->get('deliveredData');

        $data['is_regular'] = $array['is_regular'];
        //regular

        echo view('orders/order_details',$data);
//        } else{
//            echo view('orders/order-details',$data);
//        }
    }
}
