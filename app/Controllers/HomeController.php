<?php

namespace App\Controllers;

use App\Models\CityModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        //$this->auth = service('authentication');
    }
    public function index()
    {
        $data = array();
        $cityM = new CityModel();
        $data['cities' ] =$cityM->findAll();
       // echo view('welcome_message',$data);

        //var_dump($this->auth()) ;
        $auth = service('authentication');
        if (! $auth->check() )
        {
//            $this->session->set('redirect_url', current_url() );
//            return redirect()->route('login');
        }
        else{
echo "fdfdfd";
echo  $auth->user_id();
        }
        echo view('homepage',$data);
    }
    public function test()
    {

    }
}
