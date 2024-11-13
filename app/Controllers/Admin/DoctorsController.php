<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\DepartmentModel;
use App\Models\Admin\SubdepartmentModel;
use App\Models\Admin\DoctorsModel;
use App\Libraries\FileUpload;




class DoctorsController extends BaseController
{

    protected $departmentModel;
    protected $subdepartmentModel;
    protected $doctorsModel;
    protected $fileupload;

    public function __construct()
    {

        $this->departmentModel = new DepartmentModel();
        $this->subdepartmentModel = new SubdepartmentModel();
        $this->doctorsModel = new DoctorsModel();
        $this->fileupload = new FileUpload();
    }
    public function index()
    {
        echo "Silence is golden";
    }


    public function loadDoctorsForm()
    {

        $doctor_id = $this->request->getGet('doctor_id');
        $data['department'] = $this->departmentModel->where('delete_status', 0)->findAll();
        $data['subdepartment'] = $this->subdepartmentModel->where('delete_status', 0)->findAll();
        $data['previousData']  = $this->doctorsModel->where('doctor_id', $doctor_id)->first();
        echo view('admin/layouts/adminheader');
        echo view('admin/doctorSetup', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function saveDoctors()
    {


        $doctor_id = $this->request->getGet('doctor_id');
        $profilePicture = '';


        if (!empty($doctor_id)) {

            $pro = $this->doctorsModel->where('doctor_id', $doctor_id)->first();
            $profilePicture = $pro['profilePicture'];
        }



        if (isset($_FILES['profilephoto']) && $_FILES['profilephoto']['size'] > 0) {

            $file = $this->request->getFile('profilephoto');
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
            if (!in_array($file->getExtension(), $allowedTypes)) {
                return redirect()->back()->with('error', 'Invalid File Type');
            }


            if ($file->getSize() > 10485760) { // 10 MB
                return redirect()->back()->with('error', 'Filesize Exceeds. Please upload file less than 10MB');
            }


            $newFileName = $file->getRandomName();
            if ($file->move(FCPATH . 'assets/uploads', $newFileName)) {

                $profilePicture = $newFileName;
            } else {
                return redirect()->back()->with('error', 'Failed to upload the image.');
            }
        } else {
            return redirect()->back()->with('error', 'No file was uploaded.');
        }




        $data = [
            'doctor_id' => $doctor_id,
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'specialization' => $this->request->getPost('specialization'),
            'department_id' => $this->request->getPost('department_id'),
            'subdepartment_id' => $this->request->getPost('sub_department_id'),
            'room_number' => $this->request->getPost('room_number'),
            'schedule' => $this->request->getPost('schedule'),
            'profilePicture' => $profilePicture
        ];


        if (!empty($doctor_id)) {

            $url = "doctors-setup?doctor_id=" . $doctor_id;
            $msg = "Doctor details updated successfully!";
        } else {

            $url = "doctors-setup";
            $msg = "Doctor details added successfully!";
        }


        if ($this->doctorsModel->save($data)) {


            return redirect()->to($url)->with('success', $msg);
        } else {

            return redirect()->back()->with('error', 'Adding Failed');
        }
    }



    public function doctorList()
    {

        $data['doctorlist'] = $this->doctorsModel->getAllDoctros();
        echo view('admin/layouts/adminheader');
        echo view('admin/doctorlist', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function deleteDoctor()
    {

        $doctor_id = $this->request->getGet('doctor_id');

        if (!empty($doctor_id)) {

            $this->doctorsModel->where('doctor_id', $doctor_id)->delete();
            return redirect()->to('get-doctor-list')->with('success', 'Doctor deleted Succesfully !!');
        }
    }
}