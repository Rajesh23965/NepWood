<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Footermodel;
use App\Models\Admin\Mediamodel;

class FooterController extends BaseController
{

    protected $footerModel;
    protected $uri;
    protected $mediaModel;

    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->footerModel = new Footermodel();
        $this->uri = service('uri');
        $this->mediaModel = new Mediamodel();
    }

    public function setupFooter()
    {
        $footerID = $this->uri->getSegment('2');
        $data['footer'] = $this->footerModel->singleData($footerID);
        $medaiObj = $this->mediaModel;
        $mediaList = getMediaList('document_tbl', $medaiObj);
        echo view('admin/layouts/adminheader');
        echo view('admin/footer_setup', $data + $mediaList);
        echo view('admin/layouts/adminfooter');
    }

    public function footerList()
    {


        $data['footer_list'] = $this->footerModel->getAllfooter();
        echo view('admin/layouts/adminheader');
        echo view('admin/footer_list', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function saveFooter()
    {

        $footerID = $this->uri->getSegment('2');
        $footer_title = $this->request->getPost('footer_title');
        $footer_desc = $this->request->getPost('footer_desc');
        $order_by = $this->request->getPost('order_by');

        $footerArray = array(
            'footer_id' => $footerID,
            'footer_title' => $footer_title,
            'footer_description' => $footer_desc,
            'order_by' => $order_by
        );

        if ($this->footerModel->save($footerArray)) {
            return $footerID ? redirect()->to('footer-setup/' . $footerID)->with('success', 'Changes Saved') : redirect()->to('footer-setup')->with('success', 'Update Saved');
        }
    }

    public function deleteFooter()
    {
        $tabID = $this->uri->getSegment(2);
        updatePage($this->footerModel, $tabID, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('footer-list')->with('dltmsg', 'Deleted Successfully.');
    }
}
