<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Newstickermodel extends Model
{
    protected $primaryKey = 'ticker_id';
    protected $table = 'new_ticker';
    protected $allowedFields = [
        'category_id', 'added_on',
    ];

    public function getAllticker()
    {

       return $this->join('categorytbl', ' categorytbl.cat_id=  new_ticker.category_id','right')->where('categorytbl.delete_status','0')
            ->findAll();

            
    }


    public function getAllpost()
    {

       return $this->join('posttbl','FIND_IN_SET(new_ticker.category_id,posttbl.post_caty_id)>0')->where('posttbl.delete_status','0')->orderBy('posttbl.post_id', 'DESC')
            ->findAll();

            
    }

    

    

}
