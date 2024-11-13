<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table            = 'staff_table';
    protected $primaryKey       = 'staff_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [


        'staff_name',
        'staff_designation',
        'staf_speciyalities',
        'staf_category',
        'order_id',
        'staff_image',
        'delete_status'
    ];


    public function getstafflist()
    {


        // $this->db->select( '*' );
        // $this->db->from( 'staff_table' );
        // $this->db->join('staff_category_tbl','staff_table.staf_category = staff_category_tbl.staff_cat_id', 'left');
        // $this->db->order_by( 'staff_table.order_id', 'Asc' );
        // $this->db->where( 'staff_table.delete_status','0' );
        // $this->db->where( 'staff_category_tbl.delete_status','0' );
        // return $this->db->get()->result_array();


        return $this
            ->join('staff_category_tbl', 'staff_table.staf_category = staff_category_tbl.staff_cat_id', 'left')
            ->orderBy('staff_table.order_id', 'Asc')
            ->where('staff_table.delete_status', '0')
            ->where('staff_category_tbl.delete_status', '0')
            ->findAll();
    }
}
