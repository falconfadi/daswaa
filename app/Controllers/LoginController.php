<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        echo view('login');
    }

    public function login(){
        //echo "fd";
        //redirect('/');
        return redirect()->to('/');
    }
}
