<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Newstickermodel;

class NewstickerController extends BaseController
{   
    protected $newsTickerModel;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->newsTickerModel = new Newstickermodel();

    }

    public function SetUpnewsTicker()
    {
        $data['category'] = $this->newsTickerModel->getAllticker();
        echo view('admin/layouts/adminheader');
        echo view('admin/news_ticker', $data);
        echo view('admin/layouts/adminfooter');
    }

    public function saveNewsTicker()
    {
        $cat_id = $this->request->getPost('cat_id');

        // Truncate the new_ticker table before inserting new records
        $this->newsTickerModel->truncate();

        foreach ($cat_id as $ca) {
            $cats[] = ['category_id' => $ca];
        }
        if ($this->newsTickerModel->insertBatch($cats)) {

            return redirect()->to('news-ticker')->with('success', 'Changes Saved Sucefully');
        }else{

            return redirect()->to('news-ticker')->with('errors', 'something Went wrong. Please try again.');

        }

    }

}