<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\DepartmentModel;
use App\Models\Admin\SubdepartmentModel;

class SubDepartmentController extends BaseController
{
    protected $departmentModel;
    protected $subdepartmentModel;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct(){

        $this->departmentModel = new DepartmentModel();
        $this->subdepartmentModel = new SubdepartmentModel();

    }

    public function loadSubdepartmentForm(){
        
        $subdepartment_id = $this->request->getGet('subdepartment_id');
        $data['previousData'] = $this->subdepartmentModel->where('subdepartment_id',$subdepartment_id)->first();

        // print_r($data); die;
        $data['department'] = $this->departmentModel->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/subdepartment',$data);
        echo view('admin/layouts/adminfooter');
    }


    public function saveSubDepartment()
{
    $subdepartment_id = $this->request->getGet('subdepartment_id');

    $data = [
        'sub_department_name' => $this->request->getPost('sub_department_name'),
        'department_name' => $this->request->getPost('department_name'),
        'head_of_sub_department' => $this->request->getPost('head_of_sub_department'),
        'contact_number' => $this->request->getPost('contact_number'),
        'department_description' => $this->request->getPost('department_description'),
    ];

    if (!empty($subdepartment_id)) {
        $this->subdepartmentModel->update($subdepartment_id, $data);
        $url = "sub-department-setup?subdepartment_id=".$subdepartment_id."&title=".createCustomSlug($this->request->getPost('sub_department_name'));
        $msg = "Department updated successfully!";
    } else {
        $this->subdepartmentModel->insert($data);
        $url = "sub-department-setup";
        $msg = "Department added successfully!";
    }

    return redirect()->to(base_url($url))->with('success', $msg);
}

    

    public function subDepartmentList(){

        $data['subdepartmentlist'] = $this->subdepartmentModel->getAllDepartmentList();

        // echo "<pre>";
        // print_r($data);die;
        echo view('admin/layouts/adminheader');
        echo view('admin/subdepartmentlist',$data);
        echo view('admin/layouts/adminfooter');

    }


    public function deleteSubdepartment(){

        $subdepartment_id = $this->request->getGet('subdepartment_id');



        if(!empty($subdepartment_id) && $this->subdepartmentModel->where('subdepartment_id',$subdepartment_id)->delete()){
            

            return redirect()->to(base_url('sub-department-list'))->with('success', 'Department Deleted succesfully !!');
        }else{

            return redirect()->back()->with('error','Request Failed. Please try Again');
        }



        
    }
}