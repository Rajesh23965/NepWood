<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\FileUpload;
use App\Libraries\NepaliDateNew;
use App\Models\Admin\Categorymodel;
use App\Models\Admin\Postmodel;
use CodeIgniter\HTTP\URI;
use App\Models\Admin\Mediamodel;
use App\Models\Admin\Menumodel;


class PostController extends BaseController
{
    protected $postmodel;
    protected $menuModel;
    protected $mediaModel;
    protected $categorymodel;
    protected $nepaliDateNew;
    protected $uri;
    protected $fileupload;


    public function index()
    {

        echo 'Silence is golden';
    }

    public function __construct()
    {
        $this->postmodel = new postModel();
        $this->categorymodel = new categoryModel();
        $this->uri = service('uri');
        $this->nepaliDateNew = new NepaliDateNew();
        $this->mediaModel = new Mediamodel();
        $this->menuModel = new Menumodel();
        $this->fileupload = new fileupload();
    }

    public function getAllPostList()
    {

        $this->session->remove('success');
        $data['postList'] = $this->postmodel->getAllPostList();
        $data['published'] = $this->getPublishedPost();
        $data['unpublished'] = $this->getUnpublishedPost();
        $data['getDeletedItem'] = $this->getDeletedItem();
        $convertedDate = '';
        foreach ($data['postList'] as &$post) {
            if (!empty($post['added_on'])) {
                $convertedDate = $this->nepaliDateNew->getNepaliDate($post['added_on']);
                $post['added_on'] = $convertedDate;
            }
        }

        $data['categoryList'] = $this->categorymodel->getAllCategoryList();

        echo view('admin/layouts/adminheader');
        echo view('admin/postlist', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function getpublishedPost()
    {

        $columnName = 'status_id';
        $val = '1';
        return $this->postmodel->get_count($columnName, $val);
    }

    public function getunpublishedPost()
    {

        $columnName = 'status_id';
        $val = '0';
        return $this->postmodel->get_count($columnName, $val);
    }

    public function getDeletedItem()
    {

        $columnName = 'delete_status';
        $val = '1';
        return $this->postmodel->getDeleted_count($columnName, $val);
    }

    public function viewpostEditor()
    {
        $postId = $this->uri->getSegment(2);
        $medaiObj = $this->mediaModel;
        $mediaList = getMediaList('document_tbl', $medaiObj);
        $categoryList = $this->categorymodel->getAllcategoryList();
        $singlepostData = $this->postmodel->getSinglePostData($postId);
        $convertedDate = '';
        $added_on = ''; // Initialize $added_on

        if (!empty($singlepostData['added_on'])) {

            $convertedDate = $this->nepaliDateNew->getNepaliDateInEnglishFont($singlepostData['added_on']);

            // $added_on = $convertedDate['year'].'-'.$convertedDate['month'].'-'.$convertedDate['date'];
        }

        // Pass data to the view
        echo view('admin/layouts/adminheader');
        echo view('admin/post_editor', [
            'categoryList' => $categoryList,
            'edit_post_by_id' => $singlepostData,
            'added_on_bs' => $convertedDate,
        ] + $mediaList);
        echo view('admin/layouts/adminfooter');
    }

    public function savepost()
    {
        $id = $this->uri->getSegment(2);

        $postdate = $this->request->getPost('postdate');


        if (!empty($postdate)) {
            $postdate = explode(',', $postdate);
            $bsDate = $this->nepaliDateNew->getEnglishDate($postdate);
        } else {
            $bsDate = date('Y-m-d');
        }

        // Set validation rules
        $validationRules = [
            'post_title' => 'required',
            'post_caty_id' => 'required',
            'downloadable_file' => 'max_size[downloadable_file,1024000]|ext_in[downloadable_file,jpg,png,jpeg,pdf,gif,pdf,docx]',
            'featured_image' => 'max_size[featured_image,1024000]|ext_in[featured_image,jpg,png,jpeg,gif]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $post_title = $this->request->getPost('post_title');
        $post_desc = $this->request->getPost('post_desc');
        $post_caty_id = $this->request->getPost('post_caty_id');
        $post_status = $this->request->getPost('post_status');
        $featured_image = '';
        $downloadable_file = '';

        if ($id) {
            $singlepostData = $this->postmodel->getSinglePostData($id);
            $featured_image = isset($singlepostData['featured_image']) ? $singlepostData['featured_image'] : '';
            $downloadable_file = isset($singlepostData['downloadable_file']) ? $singlepostData['downloadable_file'] : '';
        }

        $url = $id ? 'edit-post/' . $id : 'add-post';

        if ($this->request->getFile('downloadable_file')->isValid()) {
            $downloadable_file = $this->fileupload->upload('downloadable_file', ['jpg', 'png', 'jpeg', 'pdf', 'gif']);
        }

        if ($this->request->getFile('featured_image')->isValid()) {
            $featured_image = $this->fileupload->upload('featured_image', ['jpg', 'png', 'jpeg', 'gif']);
        }

        $slug = !empty($post_title) ? createCustomSlug($post_title) : '{no-title}';
        $post_caty_id = !empty($post_caty_id) ? implode(',', $post_caty_id) : '0';

        $post_array = [
            'post_id' => $id,
            'post_title' => $post_title,
            'status_id' => $post_status,
            'post_caty_id' => $post_caty_id,
            'content_section' => $post_desc,
            'added_on' => $bsDate,
            'slug' => $slug,
            'downloadable_file' => $downloadable_file,
            'featured_image' => $featured_image,
        ];

        if (!empty($id)) {
            $menuArray = [
                'label_menu' => $this->request->getPost('post_title'),
                'url_menu' => $slug,
            ];
            $this->menuModel->where('content_id', $id)->where('content_type',2)->update(null, $menuArray);
        }

        $result = $this->postmodel->save($post_array);

        if ($result) {
            $message = $id ? 'Post updated successfully!!!' : 'Post created successfully!!!';
            return $id ? redirect()->to('edit-post/' . $id)->with('success', $message) : redirect()->to('add-post')->with('success', $message);
        }
    }


    public function deletepost()
    {
        $postId = $this->uri->getSegment(2);
        updatePage($this->postmodel, $postId, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('view-all-post-list')->with('msg', 'Deleted Successfully.');
    }

    public function deactivatepost()
    {
        $postId = $this->uri->getSegment(2);
        updatePage($this->postmodel, $postId, ['status_id' => '0'], 'Deactivated');
        return redirect()->to('view-all-post-list')->with('status', 'Deactivated Successfully.');
    }

    public function activatepost()
    {
        $postId = $this->uri->getSegment(2);
        updatePage($this->postmodel, $postId, ['status_id' => '1'], 'Activated');
        return redirect()->to('view-all-post-list')->with('status', 'Activated Successfully.');
    }

    public function removeFeatureImage()
    {

        $postId = $this->uri->getSegment(2);
        updatePage($this->postmodel, $postId, ['featured_image' => null], 'Featured Image Removed');
        return redirect()->to('edit-post/' . $postId)->with('errors', 'Featured Image Removed.');
    }

    public function downloadFileremove()
    {

        $postId = $this->uri->getSegment(2);
        updatePage($this->postmodel, $postId, ['downloadable_file' => null], ' File Removed');
        return redirect()->to('edit-post/' . $postId)->with('errors', ' File Removed.');
    }



    public function deletemultiplePost()
    {

        $postID = $this->request->getPost('itemID');
        $bulkAction = $this->request->getPost('bulkAction');
        if (empty($bulkAction)) {

            return redirect()->back()->with('error', 'Bulk action is required.');
        }

        $postIdArray = explode(',', $postID);

        if ($bulkAction == '1') {

            foreach ($postIdArray as $id) {
                updatePage($this->postmodel, $id, ['delete_status' => '1'], 'Deleted');
            }

            return redirect()->to('view-all-post-list')->with('changemsg', 'Deleted Succesfully.');
        }
    }

    public function showDeletedPost()
    {

        $this->session->remove('success');
        $data['getDeletePosts'] = $this->postmodel->getDeletePostList();
        $data['published'] = $this->getPublishedPost();
        $data['unpublished'] = $this->getUnpublishedPost();

        echo view('admin/layouts/adminheader');
        echo view('admin/posttrashbin', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function deleteSelectedPostPermanently()
    {
        $postID = $this->request->getPost('itemID');
        $bulkAction = $this->request->getPost('bulkAction');

        if (empty($bulkAction)) {
            return redirect()->back()->with('dltmsg', 'Please select action.');
        }

        if (empty($postID)) {
            return redirect()->back()->with('dltmsg', 'Page not selected.');
        }

        $postIdArray = explode(',', $postID);

        foreach ($postIdArray as $id) {
            if (!is_numeric($id)) {

                return redirect()->back()->with('dltmsg', 'please select Page.');
            }
        }

        if ($bulkAction == '1') {
            foreach ($postIdArray as $id) {
                $this->postmodel->delete($id);
            }

            return redirect()->to('deleted-posts')->with('changemsg', 'Deleted Successfully.');
        } elseif ($bulkAction == '2') {

            foreach ($postIdArray as $id) {
                updatePage($this->postmodel, $id, ['delete_status' => '0'], 'Restored');
            }
            return redirect()->to('deleted-posts')->with('changemsg', 'Restored Successfully.');
        }

        return redirect()->back()->with('dltmsg', 'Invalid request');
    }



    public function deletpostpermanently()
    {

        $pageID = $this->request->getGet('page_id');
        $this->postmodel->delete($pageID);
        return redirect()->to('deleted-posts')->with('changemsg', 'Deleted Succesfully.');
    }

    public function deleteAllPermanently()
    {

        $this->postmodel->deleteAlldeletedPost();
        return redirect()->to('deleted-posts')->with('changemsg', 'Deleted Succesfully.');
    }
}
