<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Pagemodel extends Model
{
    protected $primaryKey = 'pg_id';
    protected $table = 'pagetbl';
    protected $allowedFields = [
        'page_title', 'page_status','page_desc','delete_status','page_status','slug','doc_typ','page_featured_img'
    ];
    
    public function getpagelist()
    {
        return $this->where('delete_status', 0)->orderBY('pg_id','DESC')->findAll();
    }


    public function getSinglePageData($pageId){
        
        return $this->where('delete_status', '0')
        ->where('pg_id', $pageId)
        ->first();
    }


    public function get_count($columnName,$val){

        return $this->where($columnName,$val)->where('delete_status', '0')->findAll();

    }

    public function getDeleted_count($columnName,$val){

        return $this->where($columnName,$val)->findAll();

    }


    public function getDeletePageList(){
        return $this->where('delete_status', '1')->findAll();

    }


    public function deleteAlldeletedPage() {
        $this->where('delete_status', '1')->delete();
    }
    
}