<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\ResponseInterface;

use App\Libraries\NepaliDateNew;

use App\Models\Admin\Topbarmodel;
use App\Models\Admin\Categorymodel;
use App\Models\Admin\Headermodel;
use App\Models\Admin\Menumodel;
use App\Models\Admin\Slidermodel;
use App\Models\Admin\Introductionmodel;
use App\Models\Admin\Footermodel;
use App\Models\Admin\Navigationmodel;
use App\Models\Admin\Pagemodel;
use App\Models\Admin\PostModel;
use App\Models\Admin\ProductModel;




use App\Models\Admin\FaqModel;

use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{


    protected $uri;
    protected $topbarModel;
    protected $categoryModel;
    protected $headerModel;
    protected $menuModel;
    protected $sliderModel;
    protected $introductionModel;
    protected $footerModel;
    protected $navigationModel;
    protected $pageModel;
    protected $postModel;
    protected $productModel;


    


    public function __construct()
    {
        $this->uri = service('uri');
        $this->topbarModel = new Topbarmodel();
        $this->categoryModel = new Categorymodel();
        $this->headerModel = new Headermodel();
        $this->menuModel = new Menumodel();
        $this->sliderModel = new Slidermodel();
        $this->introductionModel = new Introductionmodel();
        $this->footerModel = new Footermodel();
        $this->navigationModel = new Navigationmodel();
        $this->pageModel = new Pagemodel();
        $this->postModel = new Postmodel();
        $this->productModel = new ProductModel();


    }
    public function index()
    {
        echo "Silence is golden";
    }


    private function getDetails($model, $key)
    {
        $data = [
            'message' => 'success',
            $key      => $this->$model->findAll()
        ];

        return $this->respond($data, 200);
    }

    public function getTopbarDetails()
    {
        return $this->getDetails('topbarModel', 'topbar');
    }

    public function getHeaderDetails()
    {
        return $this->getDetails('headerModel', 'header');
    }

    public function getMenuDetails()
    {
        $data = [
            'message' => 'success',
            'menu'      => $this->menuModel->getAllmenu()
        ];



        return $this->respond($data, 200);
    }

    public function getSliderDetails()
    {
        $data = [
            'message' => 'success',
            'slider'      => $this->sliderModel->getAllSlider()
        ];

        return $this->respond($data, 200);
    }


    public function getIntroductionDetails()
    {
        return $this->getDetails('introductionModel', 'intro');
    }

    


    public function getPageDetails()
    {
        $pageId = $this->request->getGet('id');

        $data = [
            'message' => 'success',
            'page'      => $this->pageModel->getSinglePageData($pageId)
        ];

        return $this->respond($data, 200);
    }


    public function getPostDetails()
    {

        $postId = $this->request->getGet('id');

        $data = [
            'message' => 'success',
            'post'      => $this->postModel->getSinglePostData($postId)
        ];

        return $this->respond($data, 200);
    }


    public function getCategoryDetails()
    {

        $catId = $this->request->getGet('id');

        $data = [
            'message' => 'success',
            'category'      => $this->categoryModel->getCategoryById($catId)
        ];

        return $this->respond($data, 200);
    }


   


    public function getFooterDetails()
    {

        return $this->getDetails('footerModel', 'footerlist');

    }


    public function getFrontendProducts(){

        return $this->getDetails('productModel', 'footerlist');


    }


}