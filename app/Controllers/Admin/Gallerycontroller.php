<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Categorymodel;
use App\Models\Admin\Gallerymodel;
use App\Models\Admin\Newstickermodel;

class Gallerycontroller extends BaseController
{
    protected $categorymodel;
    protected $galleryModel;
    
    public function index()
    {

        echo "Silence is golden";

    }

    public function __construct()
    {

        $this->categorymodel = new categoryModel();
        $this->galleryModel = new Gallerymodel();

    }

    public function gallerySetup()
    {
        $data['category'] = $this->galleryModel->getAllcategory();
        echo view('admin/layouts/adminheader');
        echo view('admin/galleryEditor', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function createGallery()
    {

        $gallery = array(

            'category_id' => $this->request->getPost('cat_id'),

        );

        if ($this->galleryModel->truncate() && $this->galleryModel->save($gallery)) {

            return redirect()->to('gallery')->with('msg', 'Gallery Created sucess');
        }

    }

}