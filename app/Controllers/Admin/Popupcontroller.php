<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\FileUpload;
use App\Models\Admin\Popupmodel;

class Popupcontroller extends BaseController
{
    protected $popupModel;
    protected $fileupload;

    public function index()
    {

        echo 'Silence is golden';

    }

    public function __construct()
    {
        $this->popupModel = new Popupmodel();
        $this->fileupload = new FileUpload();
    }

    public function popupSetup()
    {
        $data['popuplist'] = $this->popupModel->getPopupList();
        $popupId = $this->request->getGet('popupId') ?? '';

        if (!empty($popupId)) {
            $data['popupById'] = $this->popupModel->getPopupById($popupId);
        } else {
            $data['popupById'] = null;
        }

        echo view('admin/layouts/adminheader');
        echo view('admin/popupsetup', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function savePopup()
    {

        $popID = $this->request->getGet('popup_id') ?? '';
        $popup_img = '';
        if (!empty($popID)) {
            $popup_img = $this->popupModel->find($popID);
            $popup_img = $popup_img['popup_img'];
        }

        if ($_FILES['popup_img']['size'] > 0) {

            $popup_img = $this->fileupload->upload('popup_img', ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'gif', 'pdf']);
            $url = 'popup-setup';
            if ($popup_img === 0) {
                return redirect()->to($url)->with('errors', 'Invalid File Type');
            } elseif ($popup_img === 1) {
                return redirect()->to($url)->with('errors', 'Filesize Exceeds. Please upload file less than 10Mb');
            }
        }

        $popData = array(
            'popup_id' => $popID,
            'poup_title' => $this->request->getPost('poup_title'),
            'popup_img' => $popup_img,
            'popup_width' => $this->request->getPost('popup_width'),
            'popup_height' => $this->request->getPost('popup_height'),
            'active_status' => $this->request->getPost('active_status'),
        );

        $msg = 'Successfully Added';
        if ($this->popupModel->save($popData)) {
            return redirect()->to('popup-setup')->with('success', $msg);
        } else {
            return redirect()->to('popup-setup')->with('errors', 'Not created');
        }
    }

    public function deletepopup()
    {
        $popupId = $this->request->getGet('popupId');
        updatePage($this->popupModel, $popupId, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('popup-setup')->with('errors', 'Deleted Successfully.');
    }

    public function updateStatus()
    {
        $popupId = $this->request->getGet('popupId');
        $popupstatus = $this->request->getGet('popupstatus');

        if (!empty($popupId)) {
            $popup = $this->popupModel->find($popupId);
            if ($popup !== null) {
                $newStatus = ($popup['active_status'] == 1) ? 0 : 1;
                $updateData = [
                    'popup_id' => $popupId,
                    'active_status' => $newStatus,
                ];
                $this->popupModel->save($updateData);
                $message = ($newStatus == 1) ? 'activated' : 'deactivated';
                echo json_encode(['status' => 'success', 'message' => "Popup $message successfully."]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Popup not found.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid popup ID.']);
        }
    }

}