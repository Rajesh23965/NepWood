<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\ResponseInterface;

use App\Libraries\NepaliDateNew;
use App\Models\Admin\Categorymodel;
use App\Models\Admin\Footermodel;
use App\Models\Admin\Gallerymodel;
use App\Models\Admin\Headermodel;
use App\Models\Admin\Introductionmodel;
use App\Models\Admin\Menumodel;
use App\Models\Admin\Navigationmodel;
use App\Models\Admin\Newstickermodel;
use App\Models\Admin\Officermodel;
use App\Models\Admin\Pagemodel;
use App\Models\Admin\Popupmodel;
use App\Models\Admin\Postmodel;
use App\Models\Admin\Slidermodel;
use App\Models\Admin\Tabmodel;
use App\Models\Admin\Topbarmodel;
use App\Models\Admin\VideoModel;
use App\Models\Admin\Visitcountermodel;
use App\Models\Admin\StaffCategoryModel;
use App\Models\Admin\StaffModel;
use App\Models\Admin\RelatedLinkModel;
use App\Models\Admin\LocationModel;
use App\Models\Admin\DepartmentModel;
use App\Models\Admin\SubdepartmentModel;
use App\Models\Admin\DoctorsModel;
use App\Models\Admin\Quicklinkmodel;
use App\Models\Admin\CounterModel;
use App\Models\Admin\TestPackageModel;
use App\Models\Admin\TestDepartmentModel;
use App\Models\Admin\PatientPortalModel;

use App\Models\Admin\FaqModel;

use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{


    protected $uri;
    protected $topbarModel;
    protected $headerModel;
    protected $footerModel;
    protected $menuModel;
    protected $newsTicker;
    protected $sliderModel;
    protected $officerModel;
    protected $introductionModel;
    protected $tabModel;
    protected $postModel;
    protected $pageModel;
    protected $categoryModel;
    protected $navigationModel;
    protected $galleryModel;
    protected $popupModel;
    protected $visitcounterModel;
    protected $nepaliDateNew;
    protected $videoModel;
    protected $staffCategoryModel;

    protected $staffModel;
    protected $relatedlinkModel;
    protected $locationModel;
    protected $departmentModel;
    protected $subdepartmentModel;
    protected $doctorsModel;
    protected $quicklinkmodel;
    protected $counterModel;

    protected $testpackageModel;

    protected $testdepartmentModel;

    protected $patientportalModel;

    protected $faqModel;


    public function __construct()
    {
        $this->uri = service('uri');
        $this->topbarModel = new Topbarmodel();
        $this->headerModel = new Headermodel();
        $this->footerModel = new Footermodel();
        $this->menuModel = new Menumodel();
        $this->newsTicker = new Newstickermodel();
        $this->sliderModel = new Slidermodel();
        $this->officerModel = new Officermodel();
        $this->introductionModel = new Introductionmodel();
        $this->tabModel = new Tabmodel();
        $this->postModel = new Postmodel();
        $this->pageModel = new Pagemodel();
        $this->categoryModel = new Categorymodel();
        $this->navigationModel = new Navigationmodel();
        $this->galleryModel = new Gallerymodel();
        $this->popupModel = new Popupmodel();
        $this->visitcounterModel = new Visitcountermodel();
        $this->nepaliDateNew = new NepaliDateNew();
        $this->videoModel = new VideoModel();
        $this->staffCategoryModel = new StaffCategoryModel();
        $this->staffModel = new StaffModel();
        $this->relatedlinkModel = new RelatedLinkModel();
        $this->locationModel = new LocationModel();
        $this->departmentModel = new DepartmentModel();
        $this->subdepartmentModel = new SubdepartmentModel();
        $this->doctorsModel = new DoctorsModel();
        $this->quicklinkmodel = new Quicklinkmodel();
        $this->counterModel = new CounterModel();
        $this->testpackageModel = new TestPackageModel();
        $this->testdepartmentModel = new TestDepartmentModel();
        $this->patientportalModel = new PatientPortalModel();
        $this->faqModel = new FaqModel();
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

    public function getCarouselDetails()
    {
        $data = [
            'message' => 'success',
            'slider'      => $this->postModel->getCarousel()
        ];

        return $this->respond($data, 200);
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


    public function getEmployeeDetails()
    {
        return $this->getDetails('staffModel', 'stafflist');
    }


    public function getFooterDetails()
    {

       

        $data = [
            'message' => 'success',
            'footerlist'      => $this->footerModel->getAllfooter()
        ];

        return $this->respond($data, 200);
    }


    public function getpostlistBycategoryId()
    {

        $catId = $this->request->getGet('catId');

        $data = [
            'message' => 'success',
            'postlist'      => $this->postModel->postforcategory($catId)
        ];

        return $this->respond($data, 200);
    }


    public function getNewsticker()
    {
        $catId = $this->request->getGet('catId');

        $data = [
            'message' => 'success',
            'postlist'      => $this->newsTicker->getAllpost()
        ];

        return $this->respond($data, 200);
    }
}