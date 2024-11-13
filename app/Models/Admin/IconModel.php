<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class IconModel extends Model
{
    protected $table = 'icon_tbl';

    public function getAllIcons()
    {
        return $this->findAll(); // Change this to resultArray()
    }
}
