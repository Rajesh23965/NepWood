<?php

namespace App\Models\Admin; // directory where this file exist

use CodeIgniter\Model;

class Loginattemptsmodel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'login_attempts';
    protected $allowedFields = [
        'ip_address', 'timestamp',
    ];

    public function getAllIpAddress($clientIP)
    {

        $model = new Loginattemptsmodel(); // Replace YourModelName with the actual name of your model

        // Build the query
        $query = $model->where('ip_address', $clientIP)
            ->where('timestamp >= DATE_SUB(NOW(), INTERVAL 900 SECOND)') // 60 seconds for testing
            ->findAll();

        return $query;

    }




}
