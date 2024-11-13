<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class CounterModel extends Model
{
    protected $primaryKey = 'counter_id';
    protected $table = 'counter_tbl';
    protected $allowedFields = [
        'counter_icon',
        'counter_title',
        'counter_number',
        'delete_status'
    ];
}