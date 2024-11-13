<?php

namespace App\Controllers\Admin;
use App\Libraries\FileUpload;
use App\Controllers\BaseController;
use App\Models\Admin\Navigationmodel;
use App\Models\Admin\IconModel;
use App\Models\Admin\Pagemodel;




class Navigationcontroller extends BaseController
{
    protected $navigationModel;
    protected $iconModel;
    protected $pageModel;
    protected $uri;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {

        $this->navigationModel = new Navigationmodel();
        $this->iconModel = new IconModel();
        $this->pageModel = new Pagemodel();  
        $this->uri = service('uri');     

    }

    public function navigationSetup()
    {

    
        $data['icon_list'] = $this->iconModel->getAllIcons();
        $data['page_list'] = $this->pageModel->getpagelist();
        $data['nav_list'] = $this->navigationModel->getAllTab();
        echo view('admin/layouts/adminheader');
        echo view('admin/navigationSetup',$data);
        echo view('admin/layouts/adminfooter');
    }


    public function saveNavigation(){

        $navID =$this->uri->getSegment(2);
        $nav_typ =$this->request->getPost('nav_type');
        $nav = $this->request->getPost('nav_pg_id');
		$custom_field = $this->request->getPost('custom_field');
		$custom_url = $this->request->getPost('custom_url');
		$link_icon = $this->request->getPost('link_icon');
		$nav_category = $this->request->getPost('nav_category');
		$pg_order = $this->request->getPost('pg_order'); 
        

		$navarray = array(
            'id'=>$navID,
		    'nav_typ'=>$nav_typ,
            'nav_pg_id'=>$nav,
            'custom_field'=>$custom_field,
            'custom_url'=>$custom_url,
            'img_icon'=>$link_icon,
            'navigation_category'=>$nav_category,
            'page_order'=>$pg_order,
		);

        if($this->navigationModel->save($navarray)){

                return $navID ? redirect()->to('navigation/'.$navID)->with('success','Updated succesfully') : redirect()->to('navigation')->with('success','Created succesfully');
        }else{

            return $navID ? redirect()->to('navigation/'.$navID)->with('error','Data not saved. Please try again') : redirect()->to('navigation')->with('error','Data not saved. Please try again');

        }		
    }


    public function deleteNavigation(){

        $NavId = $this->request->getGet('id');       
        $this->navigationModel->where('nav_id',$NavId)->delete();
        return redirect()->to('navigation')->with('error', 'Deleted Successfully.');
    }

    

}