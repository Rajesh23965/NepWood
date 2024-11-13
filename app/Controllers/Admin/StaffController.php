<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\FileUpload;
use App\Models\Admin\StaffModel;
use App\Models\Admin\StaffCategoryModel;
use CodeIgniter\HTTP\URI;

// use CodeIgniter\HTTP\URI;

class StaffController extends BaseController
{
    protected $staffmodel;
    protected $uri;
    protected $fileupload;
    protected $staffCategoryModel;

    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->staffmodel = new StaffModel();
        $this->staffCategoryModel = new StaffCategoryModel();

        $this->uri = service('uri');
        $this->fileupload = new fileupload();
    }


    public function manageStaff()
    {

        $staffId = $this->request->getGet('staffId');
        $data['staff_category'] = $this->staffCategoryModel->where('delete_status', '0')->findAll();
        $data['staff_list'] = $this->staffmodel->where('delete_status', '0')->findAll();

        if (!empty($staffId)) {

            $data['staffDetails'] = $this->staffmodel->where('staff_id', $staffId)->first();
        }
        echo view('admin/layouts/adminheader');
        echo view('admin/manageStaff', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function saveStaffCategory()
    {

        $staffCategoryName = $this->request->getPost('cat_name');
        $staffCategoryId = '';

        $data = array(
            'staff_categoryorder_id' => $staffCategoryId,
            'staff_title' => $staffCategoryName

        );

        if ($this->staffCategoryModel->save($data)) {

            return redirect()->to('manage-staff')->with('success', 'Category Added Succesfully');
        } else {

            return redirect()->to('manage-staff')->with('errors', 'Failed. PLease try again');
        }
    }


    public function saveStaffList()
    {
        // Retrieve POST and GET data
        $staffID = $this->request->getGet('staffId');
        $staff_name = $this->request->getPost('staff_name');
        $specialist = $this->request->getPost('specialist');
        $category = $this->request->getPost('category');
        $selected_id = $this->request->getPost('selected_id');
        $o_id = $this->request->getPost('order_old_id');

        // Handle file upload
        $staff_image = $this->request->getPost('staff_image_old');
        $uploadedImage = $this->request->getFile('staff_image');

        if ($uploadedImage->isValid()) {
            $validation = \Config\Services::validation();
            $rules = [
                'staff_image' => [
                    'label' => 'Staff Image',
                    'rules' => 'uploaded[staff_image]|is_image[staff_image]|max_size[staff_image,10240]',
                    'errors' => [
                        'uploaded' => 'No file was selected for upload.',
                        'is_image' => 'The file must be an image.',
                        'max_size' => 'The file size exceeds the allowed limit of 10MB.',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->to('slider-setup')->with('errors', $validation->getErrors());
            }

            // Move the uploaded file to the desired location
            $staff_image = $uploadedImage->getRandomName();
            $uploadedImage->move(FCPATH . 'assets/uploads/', $staff_image);
        }

        // Determine order_id
        if (!empty($selected_id)) {
            $id_parts = explode(",", $selected_id);
            $orderId = trim($id_parts[1]);
            $this->staffmodel
                ->set('order_id', 'order_id+1', false)
                ->where('order_id >=', $orderId)
                ->update();
        } else {
            if (!empty($o_id)) {
                $orderId = $o_id;
            } else {
                $max_order_id = $this->check_higher_id($category);
                $orderId = max($max_order_id + 1, 1); // Ensure orderId is at least 1
            }
        }

        // Prepare data for insertion or update
        $staffListArray = [
            'staff_name' => $staff_name,
            'staf_speciyalities' => $specialist,
            'staf_category' => $category,
            'order_id' => $orderId,
            'staff_image' => $staff_image
        ];

        if ($staffID) {
            // Update existing staff record
            $this->staffmodel->update($staffID, $staffListArray);
            return redirect()->to('manage-staff')->with('success', 'Staff Updated Successfully');
        } else {
            // Insert new staff record
            $this->staffmodel->insert($staffListArray);
            return redirect()->to('manage-staff')->with('success', 'Staff Added Successfully');
        }
    }

    public function check_higher_id($category)
    {
        // Use the model to select the maximum order_id
        $query = $this->staffmodel->selectMax('order_id')->first();

        // Return the maximum order_id or 0 if no result is found
        return $query->order_id ?? 0;
    }

    public function getStafflist()
    {

        $data['staff_category'] = $this->staffCategoryModel->where('delete_status', '0')->findAll();
        $data['staff_list'] = $this->staffmodel->where('delete_status', '0')->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/stafflist', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function deleteStaff()
    {

        $staffID = $this->request->getGet('staffId');
        if (!empty($staffID)) {

            $this->staffmodel->where('staff_id', $staffID)->delete();

            return redirect()->to('get-stafflist')->with('success', 'Staff Deleted Succesfully');
        }
    }
}
