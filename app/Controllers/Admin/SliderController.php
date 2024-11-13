<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\FileUpload;
use App\Models\Admin\Slidermodel;
// use CodeIgniter\HTTP\URI;

class SliderController extends BaseController
{   
    protected $sliderModel;
    protected $uri;
    protected $fileupload;
    
    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->sliderModel = new Slidermodel();
        $this->uri = service('uri');
        $this->fileupload = new fileupload();

    }

    public function setupSlider()
    {
        
        $data['image_list'] = $this->sliderModel->getAllSlider();
        echo view('admin/layouts/adminheader');
        echo view('admin/slidersetup', $data);
        echo view('admin/layouts/adminfooter');
    }

    

    public function saveSlider()
    {
        $slider_title =  $this->request->getPost( 'slider_title' );
        $slider_description =  $this->request->getPost( 'slider_description' );
        
        if ($_FILES['slider_image']['size'] > 0) {
            $slider_image = $this->fileupload->upload('slider_image', ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'gif']);
            if ($slider_image === 0) {
                
                return redirect()->to('slider-setup')->with('errors', 'Invalid File Type');
            } elseif ($slider_image === 1) {
                
                return redirect()->to('slider-setup')->with('errors', 'Filesize Exceeds. Please upload file less than 10Mb');
                
            }
        }
        
        $slider_array = array( 
            'slider_title' => $slider_title, 
            'slider_description' => $slider_description, 
            'slider_image' => $slider_image 
        );
        
        $result = $this->sliderModel->save($slider_array);

        if ($result)
        {            
            return redirect()->to('slider-setup')->with('success', 'Created Succesfully');

        }

    }

    public function deleteSlider()
    {

        $sliderId = $this->uri->getSegment(2);
        updatePage($this->sliderModel, $sliderId, ['delete_status' => '1'], 'Deleted');
        return redirect()->to('slider-setup')->with('msg', 'Deleted Successfully.');
    }

}