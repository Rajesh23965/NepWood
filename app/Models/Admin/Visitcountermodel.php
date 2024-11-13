<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Visitcountermodel extends Model
{
    protected $primaryKey = 'counterId';
    protected $table = 'visitorcounter';
    protected $allowedFields = [
        'systemIp','visitedTimes','added_on','added_by'
    ];


    public function getAllVisitor(){

        return $this->findAll();
    }

    public function getByIpAndDate($ip, $date) {
        return $this->where('systemIp', $ip)->where('added_on', $date)->first();
    }
    


    

}
