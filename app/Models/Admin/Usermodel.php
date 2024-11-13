<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Usermodel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $allowedFields = [
        'first_name', 'middle_name', 'last_name', 'role', 'gender', 'status', 'username', 'email','userImage', 'password', 'delete_status', 'added_on','token',
    ];


    public function getAllUser(){

        return $this->where('delete_status','0')->findAll();
    }

    public function singleData($id)
    {
        return $this->where('id', $id)->first();
    }


    public function getDataByemail($email){

        return $this->where('email', $email)->first();

    }


    public function getDataUsingPassword($userID,$hashedPassword){

        return $this->where('id', $userID)->where('password',$hashedPassword)->first();

    }

}
