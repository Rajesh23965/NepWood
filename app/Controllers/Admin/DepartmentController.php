<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\DepartmentModel;
class DepartmentController extends BaseController
{
    protected $departmentModel;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct(){

        $this->departmentModel = new DepartmentModel();
    }   
    
    

    public function loadDepartmentForm(){

        $department_id = $this->request->getGet('department_id');
        $data['previousData'] = $this->departmentModel->where('department_id',$department_id)->where('delete_status','0')->first();
        echo view('admin/layouts/adminheader');
        echo view('admin/department',$data);
        echo view('admin/layouts/adminfooter');

    }


    public function departmentList(){

        $data['departmentlist'] = $this->departmentModel->where('delete_status','0')->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/departmentlist',$data);
        echo view('admin/layouts/adminfooter');
    }


    public function saveDepartment(){

        $department_id = $this->request->getGet('department_id');

        // echo $department_id; die;

        $data = array(

            'department_id'=>$department_id,
            'department_name'=>$this->request->getPost('department_name'),
            'department_description' =>$this->request->getPost('department_description')
        );

        if(!empty($department_id)){


            $url = "?department_id=".$department_id."&title=".createCustomSlug($this->request->getPost('department_name'));
            $msg ="Department Updated Succesfully";
        }else{

            $url = "";
            $msg="Department Created Succesfully";
        }


        if($this->departmentModel->save($data)){

            return redirect()->to('department-setup'.$url)->with('success',$msg);
        }else{

            return redirect()->back()->with('error','No created. Please try adding again');
        }
    }


    public function deleteDepartment(){

        $department_id = $this->request->getGet('department_id');


        if($this->departmentModel->where('department_id',$department_id)->delete()){

            return redirect()->to('department-list')->with('success','Department deleted Succesfully');

        }else{
            return redirect()->back()->with('error','Not Deleted. Please try adding again');

        }

    }
}