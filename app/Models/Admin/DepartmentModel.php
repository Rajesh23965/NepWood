<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table            = 'department';
    protected $primaryKey       = 'department_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [


        'department_name','department_description','added_on','delete_status'
    ];

    
}
