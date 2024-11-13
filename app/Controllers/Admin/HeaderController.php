<?php

namespace App\Controllers\Admin;
use App\Libraries\FileUpload;
use App\Controllers\BaseController;
use App\Models\Admin\Headermodel;

class HeaderController extends BaseController
{

    protected $headerModel;
    protected $fileupload;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {

        $this->headerModel = new Headermodel();
        $this->fileupload = new fileupload();

    }

    public function setUpheader()
    {

        $id = 1;
        $data['adminheader'] = $this->headerModel->singleData($id);
        echo view('admin/layouts/adminheader');
        echo view('admin/adminheader', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function saveHeader()
    {

        $id = 1;
        $left_logo = '';
        $right_logo = '';
        $imageData = $this->headerModel->singleData($id=1);
        $left_logo = isset($imageData['left_logo']) ? $imageData['left_logo'] : '';
        $right_logo = isset($imageData['right_logo']) ? $imageData['right_logo'] : '';


        if ($_FILES['left_logo']['size'] > 0) {
            $left_logo = $this->fileupload->upload('left_logo', ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'gif']);
            if ($left_logo === 0) {

                return redirect()->to('header')->with('errors', 'Invalid File Type');
            } elseif ($left_logo === 1) {

                return redirect()->to('header')->with('errors', 'Filesize Exceeds. Please upload file less than 10Mb');

            }
        }

        if ($_FILES['right_logo']['size'] > 0) {
            $right_logo = $this->fileupload->upload('right_logo', ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'gif']);
            if ($right_logo === 0) {

                return redirect()->to('header')->with('errors', 'Invalid File Type');
            } elseif ($right_logo === 1) {

                return redirect()->to('header')->with('errors', 'Filesize Exceeds. Please upload file less than 10Mb');

            }
        }
        $header_admin = array(
            'header_id'=>$id,
            'province_name' => $this->request->getPost('province_name'),
            'ministry' => $this->request->getPost('ministry'),
            'nirdeshnalaya' => $this->request->getPost('nirdeshnalaya'),
            'office_name' => $this->request->getPost('office_name'),
            'office_location' => $this->request->getPost('office_location'),
            'left_logo' => $left_logo,
            'right_logo' => $right_logo,
        );
        $this->headerModel->save($header_admin);
        return redirect()->to('header')->with("success", 'Saved Succesfully');
    }

}