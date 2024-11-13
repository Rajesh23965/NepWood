<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\RelatedLinkModel;

class RelatedLinksController extends BaseController
{   

    protected $relatedlinkModel;
    
    public function index()
    {
        echo "Silence is golden";
    }


    public function __construct(){

        $this->relatedlinkModel = new RelatedLinkModel();
    }


    public function setupRelatedLinks(){

        $linkId = $this->request->getGet('linkId');
        $linktoedit= [];

        $data['listData'] = $this->relatedlinkModel->orderBy('orderBY','Asc')->findAll();

      

        if(!empty($linkId)){

            $data['linktoedit'] = $this->relatedlinkModel->where('linkId',$linkId)->first();
        }
        echo view('admin/layouts/adminheader');
        echo view('admin/relatedlinks',$data);
        echo view('admin/layouts/adminfooter');

    }


    public function saverelatedLinks(){

        $linktitle = $this->request->getPost('linkTitle');
        $orderBy = $this->request->getPost('orderBy');
        $linkurl = $this->request->getPost('linkUrl');
        $linkId = $this->request->getGet('linkId');



        $linksArray = array(

            'linkId'=>$linkId,
            'linkTitle'=>$linktitle,
            'linkUrl'=>$linkurl,
            'orderBY'=> $orderBy
        );

        if($this->relatedlinkModel->save($linksArray)){

            return redirect()->to('/related-links-setup')->with('success','Link Created success !!');
        }

    }


    public function deleteLinks(){


        $linkId = $this->request->getGet('linkId');

        if(!empty($linkId)){

            $this->relatedlinkModel->where('linkId',$linkId)->delete();

            return redirect()->to('related-links-setup')->with('error', 'Deleted Succesfully');
        }

    }
}