<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Usermodel;

class UserController extends BaseController
{   
    protected $userModel;
    protected $uri;    

    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {

        $this->userModel = new Usermodel;
        $this->uri = service('uri');
    }

    public function userSetup()
    {
        $userID = $this->uri->getSegment('2');

        if (isset($userID)) {

            $data['singleUser'] = $this->userModel->singleData($userID);
        }
        $data['users'] = $this->userModel->getAllUser();
        echo view('admin/layouts/adminheader');
        echo view('admin/user_form', $data);
        echo view('admin/layouts/adminfooter');

    }

    public function saveUser()
{
    $userImage = '';
    $userID = $this->uri->getSegment('2');
    $first_name = $this->request->getPost('first_name');
    $middle_name = $this->request->getPost('middle_name');
    $last_name = $this->request->getPost('last_name');
    $gender = $this->request->getPost('gender');
    $role = $this->request->getPost('role');
    $status = $this->request->getPost('status');
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $encrypted_pass = md5($password);

    $file = $this->request->getFile('userImage');


    
    if ($file && $file->isValid() && !$file->hasMoved()) {
        if (!in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
            return redirect()->back()->withInput()->with('errors', 'Invalid image file type. Please upload jpg, jpeg, png, gif types');
        } elseif ($file->getSize() > 10485760) { // 10 MB in bytes
            return redirect()->back()->withInput()->with('errors', 'Filesize exceeds. Please upload file less than 10MB');
        }
        
        $employeeFile = $file->getRandomName();
        if ($file->move(FCPATH . 'assets/uploads', $employeeFile)) {
            $userImage = $employeeFile;
        } else {
            return redirect()->back()->withInput()->with('errors', 'Failed to upload the image.');
        }
    }
    
    // print_r($userImage); die;
    $data = array(
        'id' => $userID,
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'gender' => $gender,
        'role' => $role,
        'status' => $status,
        'username' => $username,
        'email' => $email,
        'userImage' => $userImage,
        'password' => $encrypted_pass,
    );

    if ($this->userModel->save($data)) {
        if ($userID) {
            return redirect()->to('user')->with('success', 'User updated successfully.');
        } else {
            return redirect()->to('user/' . $userID)->with('success', 'User created successfully.');
        }
    } else {
        return redirect()->back()->withInput()->with('errors', 'Failed to save user data.');
    }
}


    public function deleteUser()
    {

        $userID = $this->uri->getSegment(2);
        updatePage($this->userModel, $userID, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('user')->with('dltmsg', 'Deleted Successfully.');
    }

    public function changePassword()
    {
        $oldPassword = $this->request->getPost('oldPass');
        $newPassword = $this->request->getPost('newpass');
        $hashedPassword = md5($oldPassword);
        $userID = session()->get('id');        
        $userData = $this->userModel->getDataUsingPassword($userID, $hashedPassword);
        if (!empty($userData)) {
         
            $password = [
                'id' => $userID,
                'password' => md5($newPassword), 
            ];
            $this->userModel->save($password);             
            echo "success";
            
        } else {
            
            echo "failed";
        }
    }

    

}