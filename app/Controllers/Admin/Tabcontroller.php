<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\Tabmodel;
use App\Models\Admin\Iconmodel;
use App\Models\Admin\Categorymodel;


use CodeIgniter\HTTP\URI;

class Tabcontroller extends BaseController
{
    protected $tabModel;
    protected $iconModel;
    protected $categoryModel;
    protected $uri;
    
    public function index()
    {

        echo "Silence is golden";

    }

    public function __construct()
    {
        $this->tabModel = new Tabmodel();
        $this->iconModel = new IconModel();
        $this->categoryModel = new Categorymodel();
        $this->uri = service('uri');

    }


    public function setupTabs(){
        
        $tabID = $this->uri->getSegment(2);
        $data['icon_list'] = $this->iconModel->getAllIcons();
        $data['category_list'] = $this->categoryModel->getAllcategoryList();
        $data['edit_tab'] = $this->tabModel->getTabById($tabID);              
        $data['tabs_list'] = $this->tabModel->tabList();
        $data['id']= $tabID;

        // print_r($data['edit_tab'] ); die;
        echo view('admin/layouts/adminheader');
        echo view('admin/tabsetup',$data);
        echo view('admin/layouts/adminfooter');
    }


    public function saveTabDetails(){
        $tabID = $this->uri->getSegment(2);
        $order_by = $this->request->getPost('order_by');
        $tab_items = $this->request->getPost('tab_items');
        $category = $this->request->getPost('category');
        $tab_icon = $this->request->getPost('tab_icon');       
    
        $validation = \Config\Services::validation();
      
        if(empty($tabID)){

            $validation->setRules([
                'order_by' => [
                    'label' => 'Order By',
                    'rules' => 'required|is_unique[tab_table.order_by]' 
                ]
            ]);
        
           
            if (!$validation->withRequest($this->request)->run()) {
                $errorsString = implode('<br>', $validation->getErrors());
                return redirect()->back()->withInput()->with('errors', $errorsString);
            }
        }
        
    
        $tabs_array = array( 
            'tab_id' => $tabID,
            'order_by' => $order_by, 
            'tab_items' => $tab_items, 
            'category_id' => $category, 
            'tab_icon' => $tab_icon 
        );
    
        if($this->tabModel->save($tabs_array)){
            return $tabID ? redirect()->to('tabs-setup')->with('success', 'updated successfully') : redirect()->to('tabs-setup')->with('success', 'created successfully'); 
        }
    }



    public function deleteTab(){

        $tabId = $this->request->getGet('id');

        $this->tabModel->where('tab_id',$tabId)->delete();

        return  redirect()->to('tabs-setup')->with('errors', 'deleted successfully');

    }
    

   

}