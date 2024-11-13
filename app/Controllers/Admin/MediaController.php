<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Mediamodel;
use CodeIgniter\HTTP\URI;

class MediaController extends BaseController
{
    protected $mediaModel;

    public function index()
    {
        echo 'Silence is golden';
    }

    public function __construct()
    {
        $this->mediaModel = new mediaModel();
        

    }

    public function addMediatoLibrary()
    {
        if (!empty($_FILES['files']['name'][0])) {
            $successCount = 0;
            $errorCount = 0;
            $jsonOutput = [];

            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                $extension = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
                $uniqueId = uniqid();
                $temporaryName = $uniqueId . '.' . $extension;
                $url = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/' . $temporaryName;

                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $url)) {
                    $fileNames = array('doc_name' => $_FILES['files']['name'][$i], 'doc_temp_name' => $temporaryName);
                    $this->mediaModel->save($fileNames);
                    $insert_id = $this->mediaModel->insertID(); 
                    $fileNames['media_id'] = $insert_id;
                    $successCount++;
                    $jsonArray = array($fileNames);
                    $jsonOutput[] = $jsonArray;
                } else {
                    $errorCount++;
                }
            }
            echo json_encode($jsonOutput);

            if ($errorCount > 0) {
                echo $errorCount . ' file( s ) failed to upload.';
            }
        } else {
            echo 'No file selected.';
        }
    }

    public function removeMediaFromLibrary()
    {
        $mediaId = $this->request->getPost('id');
        updatePage($this->mediaModel, $mediaId, ['delete_status' => '1'], 'Deleted');
    }


    public function getMediaList() {
        $page = $this->request->getGet('page');
        $medaiObj = $this->mediaModel;
        $mediaList = getMediaList('document_tbl', $medaiObj);

        echo json_encode($mediaList);
        
    }

}