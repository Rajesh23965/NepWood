<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Footermodel extends Model
{

    protected $primaryKey = 'footer_id';
    protected $table = 'footer_table';
    protected $allowedFields = [
        'footer_title',
        'footer_description',
        'order_by',
        'delete_status',
        'added_on',
        'created_by'
    ];

    public function getAllfooter()
    {

        return $this->where('delete_status', '0')->orderBy('order_by', 'ASC')->findAll();
    }

    public function singleData($footer_id)
    {
        return $this->where('footer_id', $footer_id)->first();
    }
}