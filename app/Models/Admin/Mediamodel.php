<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Mediamodel extends Model
{
    protected $primaryKey = 'doc_id';
    protected $table = 'document_tbl';
    protected $allowedFields = [
        'doc_name', 'doc_temp_name','delete_status','added_by'
    ];


    public function getAllmedia(){

        return $this->where('delete_status','0')->orderBy('doc_id','DESC')->findAll();
    }
    
}