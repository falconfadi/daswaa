<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerServiceModel;
use App\Models\OrderModel;
use App\Controllers\Client;
use App\Models\ClientModel;

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

        $request = service('request');

        // Retrieve form data
        $firstName = $request->getPost('first_name');
        $fatherName = $request->getPost('father_name');
        $lastName = $request->getPost('last_name');
        $nationalityNumber = $request->getPost('nationality_number');
        $phone = $request->getPost('phone');
        $isRegular = $request->getPost('is_regular');
        $serviceId = $request->getPost('service_id');

      
       


        $clientModel = new \App\Models\ClientModel();
        $client = $clientModel->getClientByNationalityNumber($nationalityNumber);
        if (!$client) { $data = array(
            'first_name'  => $request->getPost('first_name'),
            'father_name' => $this->request->getPost('father_name'),
            'last_name' => $this->request->getPost('last_name'),
            'nationality_number' => $this->request->getPost('nationality_number'),
        
        );
      $createdClientId=  $clientModel->saveClient($data);
    
    }
  else{$createdClientId=   $client['id']; }
      
      
      
    
      $order = new OrderModel();
      $data = array(
        'client_id'  => $createdClientId,
        'service_id' => $this->request->getPost('service_id'),
        'property_type' => $this->request->getPost('is_regular'),
   
      );
      $order->saveOrder( $data);
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
        $order = new Order();
        $order->client_id = $client->id;
        $order->service_id = $serviceId;
        $order->is_regular = $isRegular;
        $order->save( $order);

        // Set flashdata to display success message
        session()->setFlashdata('status', 'Order created successfully');

        // Redirect to a success page or any other desired action
        return redirect()->to(site_url('order/success'));
    }
    */
/*    
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
        return redirect()->to('add-order-details')/*->with('status','Added Successfully');*/
    

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
