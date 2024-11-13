<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FaqModel extends Model
{



    protected $table            = 'faq_tbl';
    protected $primaryKey       = 'faq_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [

        'faq_title',
        'faq_category',
        'faq_order',
        'faq_description',
        'delete_status',
        'added_on'
    ];
}
