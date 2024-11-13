<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Officermodel extends Model
{
    protected $primaryKey = 'officer_id';
    protected $table = 'officer_tbl';
    protected $allowedFields = [
        'officer_name','designation','order_num','mobile','email','officer_image','delete_status','added_on'
    ];

    public function getAllOfficer()
    {

       return $this->where('delete_status','0')->orderBy('order_num','ASC')->findAll();

            
    }    

    public function singleData($id)
    {
        return $this->where('officer_id', $id)->where('delete_status','0')
            ->first();
    }

}
