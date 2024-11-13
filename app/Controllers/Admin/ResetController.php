<?php

namespace App\Controllers\Admin;

use App\Config\Email;
use App\Controllers\Basecontroller;
use App\Models\Admin\Usermodel;

class ResetController extends Basecontroller
{
    protected $userModel;
    
    public function index()
    {

        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->userModel = new Usermodel();
    }

    public function forgetPassword()
    {

        echo view('admin/forgetPassword');
    }

    public function createLink()
    {
        $inputEmail = $this->request->getPost('email');

        $rules = [
            'email' => 'required|min_length[4]|max_length[100]|trim|valid_email',
        ];

        if ($this->validate($rules)) {
            $userData = $this->userModel->getDataByEmail($inputEmail);
            $token = mt_rand(100000, 999999);

            if (!empty($userData)) {

                $usrID = $userData['id'];
                $data = array(
                    'id' => $usrID,
                    'token' => $token,
                );

                // print_r($data);die;

                $this->userModel->save($data);
                $email = \Config\Services::email();

                $email->setFrom('info@wwpu.org.np', 'Reset Link');
                $email->setTo($inputEmail);

                $email->setSubject('Password Reset');
                $email->setMessage('Here is your password reset link: ' . base_url() . 'reset?token=' . $token . '&id=' . $usrID . '<br/>Please donot share the detailswith unauthorize person.');

                if (!$email->send()) {
                    // Error handling for email sending failure
                    $error = $email->printDebugger(['headers']);
                    return redirect()->to('forget-password')->with('error', $error);
                } else {
                    // Success message
                    return redirect()->to('forget-password')->with('success', 'Link sent to <b>' . $inputEmail . '</b> email. Please click the link to reset');
                }
            } else {
                return redirect()->to('forget-password')->with('error', 'Email not registered.');
            }
        } else {
            return redirect()->to('forget-password')->with('error', 'Invalid Email.');
        }
    }

    public function verifyemail()
    {

        $token = $this->request->getGet('token');
        $id = $this->request->getGet('id');

        $data = array(
            'token' => $token,
            'id' => $id,
        );

        echo view('admin/updatepassword', $data);
    }

    public function savePassword()
    {
        $token = $this->request->getPost('token');
        $newpassword = $this->request->getPost('newpassword');
        $cnfrmpassword = $this->request->getPost('cnfrmpassword');
        $id = $token % 10;


        $userData = $this->userModel->singleData($id);

        if (!empty($token) && $userData['token'] == substr(strval($token), 0, 6)) {

            $rules = [

                'newpassword' => 'required|max_length[255]|min_length[6]',
                'cnfrmpassword' => 'required_with[password]|max_length[255]|matches[newpassword]',
                'token' => 'required|trim',
            ];

            if ($this->validate($rules)) {

                $data = array(
                    'id' => $id,
                    'password' => md5($newpassword),
                    'token' => null,

                );

                if ($this->userModel->save($data)) {

                    return redirect()->to('reset')->with('success', 'Password changed succesfully');
                }
            } else {
                $errorMsg = $this->validator->getErrors();
                return redirect()->to('reset?token=' . $token . '&id=' . $id)->with('error', $errorMsg);
            }
        } else {

            return redirect()->to('reset')->with('error', 'Unverified email or link expired. <a href="' . base_url('forget-password') . '">Click here</a>');
        }
    }
}