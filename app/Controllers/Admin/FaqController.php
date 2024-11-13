<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\FaqModel;




class FaqController extends BaseController
{
    protected $faqModel;

    public function __construct()
    {

        $this->faqModel = new FaqModel();
    }


    public function setupFaq()
    {

        $faqId = $this->request->getGet('faq_id');
        $data['faqById'] = $this->faqModel->where('faq_id', $faqId)->first();

        echo view('admin/layouts/adminheader');
        echo view('admin/faqSetup', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function savefaqDetails()
    {
        $faqId = $this->request->getGet('faq_id');
        $faqArray = [
            'faq_id'            => $faqId,
            'faq_title'         => $this->request->getPost('faq_title'),
            'faq_category'      => $this->request->getPost('faq_category'),
            'faq_order'         => $this->request->getPost('faq_order'),
            'faq_description'   => $this->request->getPost('faq_description'),
        ];

        if (!empty($faqId)) {
            $url = 'setup-faq?faq_id=' . $faqId;
            $msg = 'Updated Successfully';
        } else {
            $url = 'setup-faq';
            $msg = 'Created Successfully';
        }

        if ($this->faqModel->save($faqArray)) {
            return redirect()->to($url)->with('success', $msg);
        }


        return redirect()->back()->withInput()->with('error', 'Failed to save FAQ details.');
    }


    public function faqlist()
    {
        $data['faqList'] = $this->faqModel->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/faqlist', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function deletefaq()
    {
        $faqId = $this->request->getGet('faq_id');

        if (!empty($faqId)) {

            $this->faqModel->where('faq_id', $faqId)->delete();
            return redirect()->to('faq-list')->with('success', 'Successfully deleted');
        }
    }
}