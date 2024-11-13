<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use App\Models\Admin\DepartmentModel;
use App\Models\Admin\SubdepartmentModel;

class DoctorsModel extends Model
{
    protected $table            = 'doctors';
    protected $primaryKey       = 'doctor_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [

        'first_name',
        'last_name',
        'email',
        'phone_number',
        'specialization',
        'department_id',
        'subdepartment_id',
        'room_number',
        'schedule',
        'profilePicture',
        'delete_status',
        'created_at',
        'updated_at'
    ];


    public function getAllDoctros()
    {

        return $this->select('doctors.*,department.department_name,subdepartments.sub_department_name')
            ->join('department', 'department.department_id = doctors.department_id', 'left')
            ->join('subdepartments', 'subdepartments.subdepartment_id = doctors.subdepartment_id', 'left')
            ->findAll();
    }
}