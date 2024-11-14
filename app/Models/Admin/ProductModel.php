<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'products_tbl';
    protected $allowedFields = [
        'description','title','slug','thickness','width','length','moisture','price','more','image_paths','cat_name','delete_status','created_at'
    ];
}