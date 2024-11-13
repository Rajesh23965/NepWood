<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Quicklinkmodel extends Model
{
    protected $primaryKey = 'link_id';
    protected $table = 'quick_links_tbl';
    protected $allowedFields = [
        'link_label',
        'link_url',
        'link_icon',
        'delete_status'
    ];
}