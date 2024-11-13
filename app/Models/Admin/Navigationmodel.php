<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Navigationmodel extends Model
{
    protected $table = 'navigation_tbl';
    protected $primaryKey = 'nav_id';
    protected $allowedFields = [
        'nav_typ','img_icon','page_order','nav_pg_id','custom_field','custom_url','delete_status','added_on'
    ];


    public function getAllTab(){

        return $this
        ->join('pagetbl','pagetbl.pg_id = navigation_tbl.nav_pg_id','left')
        // ->join('categorytbl','categorytbl.cat_id = navigation_tbl.navigation_category','right')
        ->where('navigation_tbl.delete_status','0')->orderBy('navigation_tbl.page_order','ASC')->findAll();
    }


    

}
