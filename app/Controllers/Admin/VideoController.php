<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\VideoModel;

class VideoController extends BaseController
{   
    protected $videoModel;

    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->videoModel = new VideoModel();

    }

    public function videoSetup()
    {
        $data['videos'] = $this->videoModel->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/videoEditor',$data);
        echo view('admin/layouts/adminfooter');
    }

    public function saveVideo()
    {

        $videoPath = '';
        $videoFile = $this->request->getFile('videoFileInput');

        if ($videoFile && $videoFile->isValid() && !$videoFile->hasMoved()) {
            $newName = $videoFile->getRandomName();
            $videoFile->move(FCPATH . 'assets/uploads', $newName);
            $videoPath = $newName;
        }

        $videoUrl = $this->request->getPost('videoUrlInput');

        $data = [

            'video_path' => $videoPath,
            'video_url' => $videoUrl,
        ];

        if($this->videoModel->save($data)){

            return redirect()->to('video')->with('success','Video Added Succesfully');
        }
    }


    public function deleteVideo(){

        $videoId = $this->request->getGet('videoId');

        

        if($this->videoModel->where('videoId',$videoId)->delete()){

            return redirect()->to('video')->with('success','Video deleted Succesfully');
        }
    }
}