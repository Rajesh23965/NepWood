<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Tabmodel extends Model
{
    protected $table = 'tab_table';
    protected $primaryKey = 'tab_id';
    protected $allowedFields = [
        'tab_id', 'order_by', 'tab_items', 'category_id', 'tab_icon', 'added_on', 'created_by',
    ];

    public function getAllTabsList()
    {

        return $this->orderBy('order_by','Asc')->findAll();
    }

    public function getTabById($tabID)
    {

        return $this->where('tab_id', $tabID)->first();
    }

    public function tabList()
    {

        return $this
        ->join('categorytbl', 'tab_table.category_id = categorytbl.cat_id', 'left')
        ->where('categorytbl.delete_status', '0')->where('tab_table.delete_status', '0')->orderBy('order_by','ASC')->findAll();
    }


    

}
