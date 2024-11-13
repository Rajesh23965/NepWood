<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Categorymodel extends Model
{
    protected $primaryKey = 'cat_id';
    protected $table = 'categorytbl';
    protected $allowedFields = [
        'cat_name', 'cat_slug', 'doc_typ', 'delete_status',
    ];

    public function getAllcategoryList()
    {
        return $this->where('delete_status', 0)->orderBy('cat_id', 'ASC')->findAll();
    }

    public function getCategoryById($catId)
    {

        return $this->where('delete_status', '0')
            ->where('cat_id', $catId)
            ->first();
    }

    public function deletecatItfrompost($catId)
    {

        $sql = "UPDATE posttbl
        SET post_caty_id = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', post_caty_id, ','), ',$catId,', ','))
        WHERE FIND_IN_SET('$catId', post_caty_id) > 0";
        $this->db->query($sql);

    }

}
