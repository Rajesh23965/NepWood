<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TestPackageModel extends Model
{
    protected $table            = 'testpackagename';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [

        'categoryName',
        'packageImage',
        'includedTest',
        'packagePrice'
    ];
}