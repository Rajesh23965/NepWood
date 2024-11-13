<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\Introductionmodel;
use App\Models\Admin\Mediamodel;
use App\Models\Admin\Pagemodel;


class IntroductionController extends BaseController
{
    protected $introductionModel;
    protected $mediaModel;
    protected $pageModel;
    
    public function index()
    {

        echo "Silence is golder";
    }

    public function __construct()
    {

        $this->introductionModel = new Introductionmodel();
        $this->mediaModel = new Mediamodel();
        $this->pageModel = new Pagemodel();

    }

    public function setupIntroduction()
    {

        $id = 1;
        $medaiObj = $this->mediaModel;        
        $mediaList = getMediaList('document_tbl',$medaiObj);
        $data['page_list'] = $this->pageModel->findAll();
        $data['intro'] = $this->introductionModel->singleData($id);
        echo view('admin/layouts/adminheader');
        echo view('admin/introduction', $data+$mediaList);
        echo view('admin/layouts/adminfooter');
    }

    public function saveIntroduction()
    {

        $id = 1;
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $selectedPage = $this->request->getPost('selectedPage');

        $introDuction = array(

            'id' => $id,
            'title' => $title,
            'description' => $description,
            'selectedPage'=>$selectedPage
        );

        $this->introductionModel->save($introDuction);

        return redirect()->to('introduction-setup')->with('success', 'Changes Saved Succesfully');

    }

}