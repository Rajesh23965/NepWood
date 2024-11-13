<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\FileUpload;
use App\Models\Admin\Officermodel;
use CodeIgniter\HTTP\URI;

class OfficerController extends BaseController
{   
    protected $officerModel;
    protected $uri;
    protected $fileupload;

    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->officerModel = new Officermodel();
        $this->uri = service('uri');
        $this->fileupload = new fileupload();

    }

    public function SetupOfficer()
    {
        $officerID = $this->uri->getSegment(2);
        $data['edit_officer'] = $this->officerModel->singleData($officerID);
        echo view('admin/layouts/adminheader');
        echo view('admin/officer_setup', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function getOfficerList()
    {

        $officerID = $this->uri->getSegment(2);
        $data['off_list'] = $this->officerModel->getAllOfficer();
        echo view('admin/layouts/adminheader');
        echo view('admin/officer_list', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function saveOfficer()
    {
        $officer_id = $this->uri->getSegment(2);
        $officer_name = $this->request->getPost('officer_name');
        $designation = $this->request->getPost('designation');
        $order_num = $this->request->getPost('order_num');
        $mobile = $this->request->getPost('mobile');
        $email = $this->request->getPost('email');
        $officer_image = '';
        if (isset($officer_id)) {
            $data = $this->officerModel->singleData($officer_id);
            if (!empty($data)) {
                $officer_image = $data['officer_image'];
            }
        }

        if ($_FILES['officer_image']['size'] > 0) {
            $officer_image = $this->fileupload->upload('officer_image', ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'gif']);
            if ($officer_image === 0) {

                return redirect()->to('edit-officer-details/' . $officer_id)->with('errors', 'Invalid File Type');
            } elseif ($officer_image === 1) {

                return redirect()->to('edit-officer-details/' . $officer_id)->with('errors', 'Filesize Exceeds. Please upload file less than 10Mb');

            }
        }

        $officer_array = [
            'officer_id' => $officer_id,
            'officer_name' => $officer_name,
            'designation' => $designation,
            'order_num' => $order_num,
            'mobile' => $mobile,
            'email' => $email,
            'officer_image' => $officer_image,
        ];
        $result = $this->officerModel->save($officer_array);

        if ($result) {

            $message = $officer_id ? 'Updated Sucessfully' : 'Created successfully!!!';
            return $officer_id ? redirect()->to('edit-officer-details/' . $officer_id)->with('success', $message) : redirect()->to('officer-setup/' . $officer_id)->with('success', $message);

        }

    }

    public function deleteOfficer($officerId)
    {

        $officer_id = $this->uri->getSegment(2);
        updatePage($this->officerModel, $officer_id, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('show-officer-list')->with('msg', 'Deleted Successfully.');
    }

}