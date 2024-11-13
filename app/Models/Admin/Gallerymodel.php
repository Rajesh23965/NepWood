<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Gallerymodel extends Model
{
    protected $primaryKey = 'gallery_id';
    protected $table = 'gallery';
    protected $allowedFields = [
        'category_id','added_on','added_by'
    ];

    public function getAllcategory()
    {

       return $this->join('categorytbl', ' categorytbl.cat_id=  gallery.category_id','right')->where('categorytbl.delete_status','0')
            ->findAll();

            
    }


    public function getAllpost()
    {

       return $this->join('posttbl','FIND_IN_SET(gallery.category_id,posttbl.post_caty_id)>0')->where('posttbl.delete_status','0')->orderBy('posttbl.post_id', 'DESC')
            ->findAll();

            
    }

    

    

}
