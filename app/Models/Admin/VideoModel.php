<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table            = 'videos';
    protected $primaryKey       = 'videoId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';   
    protected $allowedFields    = [
        'video_path','video_url','added_on'
    ];


    public function getLastVideo(){

        return $this->orderBy('videoId', 'DESC')
                    ->first();
    }

    
}
