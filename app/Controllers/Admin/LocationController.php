<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\LocationModel;

class LocationController extends BaseController
{
    protected $locationModel;
    public function index()
    {
        echo "Silence is golden";
    }


    public function __construct(){

        $this->locationModel = new LocationModel();
    }

    public function locationsetup(){

        $data['location'] = $this->locationModel->first();
        echo view('admin/layouts/adminheader');
        echo view('admin/locationsetup',$data);
        echo view('admin/layouts/adminfooter');


    }


    public function saveLocation(){


        $location = $this->request->getPost('location');
        $locationArray = array(

            'id'=>'1',
            'location'=>$location
        );


        if($this->locationModel->save($locationArray)){

            return redirect()->to('location-setup')->with('success','Changes Saved !!');
        }





    }
}