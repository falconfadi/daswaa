<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\API\ResponseTrait;

class ClientController extends BaseController
{
    use ResponseTrait;

    /**
     * Create a new client.
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function index()
    {
        $title = "المشتركين";
        $data['title'] = $title;
        $clients = new ClientModel();

        $data['clients' ] =$clients->findAll();
        echo view('clients/index',$data);
    }
    public function add()
    {
        $title = "إضافة  مشترك";
        $data['title'] = $title;
       
        echo view('clients/add_client',$data);
    }
    public function create()
    {/*
        $request = service('request');

        // Retrieve form data
        $firstName = $request->getPost('first_name');
        $fatherName = $request->getPost('father_name');
        $lastName = $request->getPost('last_name');
        $nationalityNumber = $request->getPost('nationality_number');
        $phone = $request->getPost('phone');

        // Create a new client
        $client = new ClientController();
        $client->first_name = $firstName;
        $client->father_name = $fatherName;
        $client->last_name = $lastName;
        $client->nationality_number = $nationalityNumber;
        $client->phone = $phone;
        $client->save();

        // Return a response indicating success
        $response = [
            'status' => 'success',
            'message' => 'ClientController created successfully',
            'client' => $client,
        ];

        return $this->respond($response)*/
    }
}