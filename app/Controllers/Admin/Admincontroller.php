<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Admincontroller extends BaseController
{
    public function index()
    {
        
        echo view('admin/layouts/adminheader');
        echo view('admin/layouts/adminfooter');

    }
}
