<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Mediamodel;
use App\Models\Admin\Menumodel;
use App\Models\Admin\Pagemodel;
use CodeIgniter\HTTP\URI;

class PageController extends BaseController
{

    protected $pageModel;
    protected $menuModel;
    protected $mediaModel;
    protected $uri;

    public function index()
    {

        echo 'Silence is golden';
    }

    public function __construct()
    {

        $this->pageModel = new pageModel();
        $this->mediaModel = new Mediamodel();
        $this->menuModel = new Menumodel();
        $this->uri = service('uri');
    }

    public function getAllPageList()
    {
        $this->session->remove('success');
        $data['pagelist'] = $this->pageModel->getpagelist();
        $data['published'] = $this->getpublishedPage();
        $data['unpublished'] = $this->getunpublishedPage();
        $data['getDeletedItem'] = $this->getDeletedItem();

        echo view('admin/layouts/adminheader');
        echo view('admin/pagelist', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function viewPageEditor()
    {

        $pageId = $this->uri->getSegment(2);
        $singlePage_data = $this->pageModel->getSinglePageData($pageId);
        $medaiObj = $this->mediaModel;
        $mediaList = getMediaList('document_tbl', $medaiObj);
        // echo "<pre>";
        // print_r($mediaList); die;
        echo view('admin/layouts/adminheader');
        echo view('admin/page_editor', ['singlePage_data' => $singlePage_data] + $mediaList);
        echo view('admin/layouts/adminfooter');
    }

    public function savePage()
    {
        $pageId = '';
        $pageId = $this->uri->getSegment(2);
        $pageTitle = $this->request->getPost('page_title');
        $slug = !empty($pageTitle) ? createCustomSlug($pageTitle) : '{no-title}';

        $data = [
            'pg_id' => $pageId,
            'page_title' => $this->request->getPost('page_title'),
            'page_desc' => $this->request->getPost('page_desc'),
            'page_status' => $this->request->getPost('page_status'),
            'slug' => $slug,
        ];

        $rule = [
            'pg_id' => 'integer',
            'page_title' => 'required|trim',

        ];


        if (!empty($pageId)) {

            $menuArray = [

                'label_menu' => $this->request->getPost('page_title'),
                'url_menu' => $slug,
            ];
            $this->menuModel->where('content_id', $pageId)->where('content_type',1)->update(null, $menuArray);
        }
        $this->pageModel->save($data);

        return $pageId ? redirect()->to('edit-page/' . $pageId)->with('success', 'Updated Successfully.') : redirect()->to('add-page/')->with('success', 'Created Successfully.');
    }

    public function deletePage()
    {
        $pageId = $this->uri->getSegment(2);
        updatePage($this->pageModel, $pageId, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('view-all-page-list')->with('dltmsg', 'Deleted Successfully.');
    }

    public function deactivatePage()
    {
        $pageId = $this->uri->getSegment(2);
        updatePage($this->pageModel, $pageId, ['page_status' => '0'], 'Deactivated');
        return redirect()->to('view-all-page-list')->with('changemsg', 'Deactivated Successfully.');
    }

    public function activatePage()
    {
        $pageId = $this->uri->getSegment(2);
        updatePage($this->pageModel, $pageId, ['page_status' => '1'], 'Activated');
        return redirect()->to('view-all-page-list')->with('changemsg', 'Activated Successfully.');
    }

    //new from here

    public function getpublishedPage()
    {

        $columnName = 'page_status';
        $val = '1';
        return $this->pageModel->get_count($columnName, $val);
    }

    public function getunpublishedPage()
    {

        $columnName = 'page_status';
        $val = '0';
        return $this->pageModel->get_count($columnName, $val);
    }

    public function getDeletedItem()
    {

        $columnName = 'delete_status';
        $val = '1';
        return $this->pageModel->getDeleted_count($columnName, $val);
    }

    public function deletemultiplePage()
    {

        $pageID = $this->request->getPost('itemID');
        $bulkAction = $this->request->getPost('bulkAction');
        if (empty($bulkAction)) {

            return redirect()->back()->with('error', 'Bulk action is required.');
        }

        $pageIdArray = explode(',', $pageID);

        if ($bulkAction == '1') {

            foreach ($pageIdArray as $id) {
                updatePage($this->pageModel, $id, ['delete_status' => '1'], 'Deleted');
            }

            return redirect()->to('view-all-page-list')->with('changemsg', 'Deleted Succesfully.');
        }
    }

    public function showDeletedPage()
    {

        $this->session->remove('success');
        $data['getDeletePages'] = $this->pageModel->getDeletePageList();
        $data['published'] = $this->getpublishedPage();
        $data['unpublished'] = $this->getunpublishedPage();

        echo view('admin/layouts/adminheader');
        echo view('admin/pagetrashbin', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function deletpagepermanently()
    {

        $pageID = $this->request->getGet('page_id');
        $this->pageModel->delete($pageID);
        return redirect()->to('deleted-pages')->with('changemsg', 'Deleted Succesfully.');
    }

    public function deleteAllPermanently()
    {

        $this->pageModel->deleteAlldeletedPage();
        return redirect()->to('deleted-pages')->with('changemsg', 'Deleted Succesfully.');
    }

    public function deleteSelectedPagePermanently()
    {
        $pageID = $this->request->getPost('itemID');
        $bulkAction = $this->request->getPost('bulkAction');

        if (empty($bulkAction)) {
            return redirect()->back()->with('dltmsg', 'Please select action.');
        }

        if (empty($pageID)) {
            return redirect()->back()->with('dltmsg', 'Page not selected.');
        }

        $pageIdArray = explode(',', $pageID);

        foreach ($pageIdArray as $id) {
            if (!is_numeric($id)) {

                return redirect()->back()->with('dltmsg', 'please select Page.');
            }
        }

        if ($bulkAction == '1') {
            foreach ($pageIdArray as $id) {
                $this->pageModel->delete($id);
            }

            return redirect()->to('deleted-pages')->with('changemsg', 'Deleted Successfully.');
        } elseif ($bulkAction == '2') {

            foreach ($pageIdArray as $id) {
                updatePage($this->pageModel, $id, ['delete_status' => '0'], 'Restored');
            }
            return redirect()->to('deleted-pages')->with('changemsg', 'Restored Successfully.');
        }

        return redirect()->back()->with('dltmsg', 'Invalid request');
    }
}
