<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Headermodel extends Model
{
    protected $primaryKey = 'header_id';
    protected $table = 'header';
    protected $allowedFields = [
        'province_name','ministry','nirdeshnalaya','office_name','office_location','left_logo','right_logo','created_by','deleted_by'
    ];


    public function getAllHeaderDetails(){

        return $this->findAll();
    }
    
   
    public function singleData($id){        
        return $this->where('header_id', $id)
        ->first();
    }


}