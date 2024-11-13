<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Popupmodel extends Model
{
    protected $primaryKey = 'popup_id';
    protected $table = 'popup_table';
    protected $allowedFields = [
        'poup_title','popup_img','popup_width','popup_height','active_status','delete_status','added_by','added_on'
    ];
    
    public function getPopup()
    {
        return $this->where('delete_status', 0)->where('active_status', 1)->orderBy('popup_id', 'DESC')->findAll();
    }

    public function getPopupList()
    {
        return $this->where('delete_status', 0)->orderBy('popup_id', 'DESC')->findAll();
    }

    public function getPopupbyId($popupId)
    {
        return $this->where('delete_status', 0)->where('popup_id', $popupId)->orderBy('popup_id', 'DESC')->first();
    }


     
        

}