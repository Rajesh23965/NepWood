<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Categorymodel;

class CategoryController extends BaseController
{
    protected $categorymodel;
     
    public function index()
    {

        echo "Silence is golden";

    }

    public function __construct()
    {

        $this->categorymodel = new categoryModel();
        

    }

    public function getCategory()
    {

        $categoryList = $this->categorymodel->getAllcategoryList();
        echo view('admin/layouts/adminheader');
        echo view('admin/category_editor', ['getCatyList' => $categoryList]);
        echo view('admin/layouts/adminfooter');

    }

    public function addCategory()
    {

        $catId = $this->request->getPost('cat_id');
        $caty_title = $this->request->getPost('caty_title');
        $caty_slug = $this->request->getPost('caty_slug');

        if (!empty($caty_slug)) {

            $caty_slug = createCustomSlug($caty_slug);
        } else {

            $caty_slug = createCustomSlug($caty_title);

        }
        $caty_array = array(
            'cat_id' => $catId,
            'cat_name' => $caty_title,
            'cat_slug' => $caty_slug,
        );

        $this->categorymodel->save($caty_array);
        if (empty($catId)) {

            $catId = $this->categorymodel->insertID();
        }
        $category_list = $this->categorymodel->getCategoryById($catId);
        echo json_encode($category_list);

    }



    public function DeleteIdCategoryIdPost($catId){
        $this->categorymodel->deletecatItfrompost($catId);

    }

    public function deleteCategoryById()
    {

        $catId = $this->request->getPost('id');

        $this->DeleteIdCategoryIdPost($catId);

        if (updatePage($this->categorymodel, $catId, ['delete_status' => '1'], 'Deleted')) {

            echo json_encode(['success' => true, 'msg' => 'deleted successfully' ]);
        }
    }


    
}