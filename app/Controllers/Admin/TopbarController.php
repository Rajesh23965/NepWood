<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Topbarmodel;

class TopbarController extends BaseController
{   
    protected $topbarModel;
    protected $uri;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {

        $this->topbarModel = new topbarModel();
        $this->uri = service('uri');

    }

    public function setUptopBar()
    {

        $id = 1;
        $data['topbar'] = $this->topbarModel->singleData($id);
        echo view('admin/layouts/adminheader');
        echo view('admin/admintopbar',$data);
        echo view('admin/layouts/adminfooter');
    }

    public function saveTopbar()
    {

        $id = 1;
        $topbar_array = array(
            'topbar_id' => $id,
            'email' => $this->request->getPost('email'),
            'mobile_number' => $this->request->getPost('mobile_number'),
            'facebook' => $this->request->getPost('facebook'),
            'twitter' => $this->request->getPost('twitter'),
            'yotube' => $this->request->getPost('yotube'),
        );
        $this->topbarModel->save($topbar_array);
        return redirect()->to('top-bar-setup')->with("success", 'Saved Succesfully');
    }

}