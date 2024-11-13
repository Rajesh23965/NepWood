<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SubdepartmentModel extends Model
{
    protected $table            = 'subdepartments';
    protected $primaryKey       = 'subdepartment_id ';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [

        'department_name',
        'sub_department_name',
        'head_of_sub_department',
        'contact_number',
        'department_description',
        'delete_status'
    ];


    public function getAllDepartmentList(){

        return $this
        ->join('department','department.department_id = subdepartments.department_name','left')
        ->findAll();
    }


    
}
