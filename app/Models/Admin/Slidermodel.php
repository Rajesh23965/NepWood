<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Slidermodel extends Model
{
    protected $primaryKey = 'slider_id';
    protected $table = 'slider_tbl';
    protected $allowedFields = [
        'slider_title','slider_description','slider_image','added_on','delete_status','created_by'
    ];

    public function getAllSlider()
    {

       return $this->where('delete_status','0')->orderBy('slider_id','DESC')->findAll();

            
    }    

    public function singleData($id)
    {
        return $this->where('slider_id', $id)->where('delete_status','0')
            ->first();
    }

}
