<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Topbarmodel extends Model
{
    protected $primaryKey = 'topbar_id';
    protected $table = 'topbar';
    protected $allowedFields = [
        'topbar_id','email','mobile_number','facebook','twitter','yotube','created_by'
    ];
    
   
    public function singleData($id){        
        return $this->where('topbar_id', $id)
        ->first();
    }


}