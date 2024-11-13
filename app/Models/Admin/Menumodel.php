<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Menumodel extends Model
{
    protected $primaryKey = 'id_menu';
    protected $table = 'menu';
    protected $allowedFields = [
        'label_menu', 'url_menu', 'parent_id', 'has_child', 'content_type', 'content_id', 'delete_status',
    ];

    public function getAllmenu() {
        return $this
            ->select('menu.*, pagetbl.pg_id, categorytbl.cat_id, posttbl.post_id')
            ->join('pagetbl', 'pagetbl.pg_id = menu.content_id AND menu.content_type = 1', 'left')
            ->join('categorytbl', 'categorytbl.cat_id = menu.content_id AND menu.content_type = 3', 'left')
            ->join('posttbl', 'posttbl.post_id = menu.content_id AND menu.content_type = 2', 'left')
            ->where('menu.delete_status', '0')
            ->groupStart()
                ->groupStart()
                    ->where('menu.content_type', '1')
                    ->where('pagetbl.delete_status', '0')
                    ->where('pagetbl.page_status', '1')

                ->groupEnd()
                ->orGroupStart()
                    ->where('menu.content_type', '3')
                    ->where('categorytbl.delete_status', '0')
                    
                ->groupEnd()
                ->orGroupStart()
                    ->where('menu.content_type', '2')
                    ->where('posttbl.delete_status', '0')
                    ->where('posttbl.status_id', '1')
                    
                ->groupEnd()
                ->orGroupStart()
                    ->where('menu.content_type', '4')
                ->groupEnd()
            ->groupEnd()
            ->findAll();
    }
    

    public function singleData($id)
    {
        return $this->where('id_menu', $id)
            ->first();
    }

}
