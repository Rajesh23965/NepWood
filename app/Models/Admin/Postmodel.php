<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Postmodel extends Model
{
    protected $primaryKey = 'post_id';
    protected $table = 'posttbl';
    protected $allowedFields = [
        'post_title',
        'post_caty_id',
        'featured_image',
        'status_id',
        'slug',
        'doc_typ',
        'content_section',
        'downloadable_file',
        'delete_status',
        'added_on'
    ];

    public function getAllpostList()
    {
        return $this->where('delete_status', 0)->orderBy('post_id', 'DESC')->findAll();
    }


    public function getAllpostListFortab()
    {
        return $this->where('delete_status', 0)->orderBy('added_on', 'DESC')->findAll();
    }


    public function getSinglePostData($pageId)
    {

        return $this->where('delete_status', '0')->where('status_id', 1)
            ->where('post_id', $pageId)
            ->first();
    }

    public function postforcategory($id)
    {
        return $this->join('categorytbl', 'FIND_IN_SET(categorytbl.cat_id,posttbl.post_caty_id)>0')
            ->where('categorytbl.cat_id', $id)
            ->where('posttbl.delete_status', 0)
            ->where('posttbl.status_id', 1)
            ->orderBy('posttbl.post_id', 'ASC')
            ->findAll();
    }

    public function postForBlog($id)
    {
        return $this->join('categorytbl', 'FIND_IN_SET(categorytbl.cat_id,posttbl.post_caty_id)>0')
            ->where('categorytbl.cat_id', $id)
            ->where('posttbl.delete_status', 0)
            ->where('posttbl.status_id', 1)
            ->orderBy('posttbl.post_id', 'ASC')
            ->limit(6, 0)
            ->findAll();
    }


    public function get_count($columnName, $val)
    {

        return $this->where($columnName, $val)->where('delete_status', '0')->findAll();
    }

    public function getDeleted_count($columnName, $val)
    {

        return $this->where($columnName, $val)->findAll();
    }


    public function getDeletePostList()
    {
        return $this->where('delete_status', '1')->findAll();
    }


    public function deleteAlldeletedPost()
    {
        $this->where('delete_status', '1')->delete();
    }


    public function getCarousel()
    {

        return $this->join('gallery', 'FIND_IN_SET(gallery.category_id,posttbl.post_caty_id)>0')
            ->orderBy('posttbl.post_id', 'ASC')
            ->orderBy('posttbl.added_on', 'ASC')
            ->limit(6, 0)
            ->findAll();
    }
}
