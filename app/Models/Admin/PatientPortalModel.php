<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PatientPortalModel extends Model
{
    protected $table            = 'testlistpricetbl';
    protected $primaryKey       = 'test_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [

        'testName',
        'testPrice',
        'testCategoryName',
        'testCategoryId',
        'specimen',
        'collection',
        'reporting'

    ];

    public function getallByDepartmentId($testCategoryId)
    {


        return $this->where("FIND_IN_SET($testCategoryId, testCategoryId) > 0")->findAll();
    }
}
