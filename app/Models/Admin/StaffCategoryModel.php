<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StaffCategoryModel extends Model
{
    protected $table            = 'staff_category_tbl';
    protected $primaryKey       = 'staff_categoryorder_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [


        'staff_title',
        'delete_status'
    ];
}
