<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerServiceModel;
use App\Models\OrderModel;
use App\Controllers\ClientController;
use App\Models\ClientModel;

class OrderController extends BaseController
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
        $o = new OrderModel();
        $c = new ClientModel();
        $data['orders'] = $o->findAll();
        $names = array();
        foreach ($data['orders'] as $order){
            $name = $c->find($order['client_id']);
            $names[] = $name['first_name']." ". $name['last_name'];
        }
        $data['names'] = $names;
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

        //$request = service('request');

        // Retrieve form data
//        $firstName = $this->request->getPost('first_name');
//        $fatherName = $this->request->getPost('father_name');
//        $lastName = $this->request->getPost('last_name');

        $nationalityNumber = $this->request->getPost('national_id');
        $phone = $this->request->getPost('phone');
        $isRegular = $this->request->getPost('is_regular');
        //var_dump($isRegular);exit();
        $serviceId = $this->request->getPost('service_id');
       /// var_dump($nationalityNumber);
        $clientModel = new \App\Models\ClientModel();
        $client = $clientModel->getClientByNationalityNumber($nationalityNumber);

        if (!$client) {
            $data = array(
            'first_name'  => $this->request->getPost('first_name'),
            'father_name' => $this->request->getPost('father_name'),
            'last_name' => $this->request->getPost('last_name'),
            'national_id' => $nationalityNumber,
            'is_regular' => ''
        );
      $clientModel->save($data);
       //     var_dump($clientModel->insertID);exit();
       $createdClientId = $clientModel->insertID;

    }
    else{
        $createdClientId =   $client['id'];
    }

      $order = new OrderModel();
      $data = array(
        'client_id'  => $createdClientId,
        'service_id' => $serviceId,
        'is_regular' => $isRegular,
        'mobile'=>$phone,
        'landline' =>''
   
      );
      $order->save( $data);
      $deliveredData = array(
            'is_regular' => $this->request->getPost('is_regular'),
      );
    $session = session();
    $session->set('deliveredData',$deliveredData);
      return redirect()->to('add-order-details');
    }
    /*
        // If client doesn't exist, create a new client
        if (!$client) {
            $client = new ClientModel();
            $client->$allowedFields->first_name = $firstName;
            $client->$allowedFields->father_name = $fatherName;
            $client->$allowedFields->last_name = $lastName;
            $client->$allowedFields->nationality_number = $nationalityNumber;
            $client->$allowedFields->phone = $phone;
            var_dump($client->$allowedFields->$phone);
            $client->save(  $client);
        }

        // Create a new order
        $order = new OrderController();
        $order->client_id = $client->id;
        $order->service_id = $serviceId;
        $order->is_regular = $isRegular;
        $order->save( $order);

        // Set flashdata to display success message
        session()->setFlashdata('status', 'OrderController created successfully');

        // Redirect to a success page or any other desired action
        return redirect()->to(site_url('order/success'));
    }
    */
/*    
        $data = [
            'first_name' => $first_name
        ];
        //$order->save($data);

        //$this->session->set_userdata('deliveredData', $deliveredData);*/
      //  return redirect()->to('add-order-details')/*->with('status','Added Successfully');
    

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
      //  return redirect()->to('orders')->with('status','تم إضافة طلب جديد');
    }

    public function addingOrderDetails(){
//        if(session()->getFlashdata('status')){
//            echo session()->getFlashdata('status');
//        }
        $data = array();
        $title = "تفاصيل الطلب";
        $data['title'] = $title;
        $array = session()->get('deliveredData');

        $data['is_regular'] = $array['is_regular'];
        //regular

        // echo view('orders/order_details',$data);
//        } else{
//            echo view('orders/order-details',$data);
//        }
        return redirect()->to('orders')->with('status','تم إضافة طلب جديد');
    }

    public function test(){
        $clientModel = new \App\Models\ClientModel();
        $client = $clientModel->getClientByNationalityNumber('9876546352');
        //var_dump($client['id']);
    }

}
