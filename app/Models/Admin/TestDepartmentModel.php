<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TestDepartmentModel extends Model
{
    protected $table            = 'testdepartment';
    protected $primaryKey       = 'departmentId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [


        'departmentName',
        'includedTestinDepartment'
    ];
}
