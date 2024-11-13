<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\FileUpload;
use App\Models\Admin\TestDepartmentModel;
use App\Models\Admin\PatientPortalModel;
use App\Models\Admin\TestPackageModel;



// use CodeIgniter\HTTP\URI;

class PatientPortalController extends BaseController
{

    protected $uri;
    protected $fileupload;
    protected $testDdepartmentModel;
    protected $patientPortalModel;
    protected $testpackageModel;


    public function index()
    {
        echo "Silence is golden";
    }

    public function __construct()
    {
        $this->uri = service('uri');
        $this->fileupload = new fileupload();
        $this->testDdepartmentModel = new TestDepartmentModel();
        $this->patientPortalModel = new PatientPortalModel();
        $this->testpackageModel = new TestPackageModel();
    }


    public function managePatientPortal()
    {
        $testID = $this->request->getGet('test_id');
        $departmentId = $this->request->getGet('departmentId');

        $data['testDetailsById'] = $this->patientPortalModel->where('test_id', $testID)->first();
        $data['departmentdetailsbyId'] = $this->testDdepartmentModel->where('departmentId', $departmentId)->first();
        $data['alldepartment'] = $this->testDdepartmentModel->findAll();


        // dd($data['testDetailsById']);
        $data['testList'] = $this->patientPortalModel->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/patient-portal', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function savetestDepartment()
    {

        $departmentId = $this->request->getGet('departmentId');
        $includedTestinDepartment = $this->request->getPost('includedTestinDepartment');
        $departmentName = $this->request->getPost('departmentName');

        if (!empty($includedTestinDepartment)) {

            $includedTestinDepartment = implode(',', $includedTestinDepartment);
        }

        $departmentArray = array(

            'departmentId' => $departmentId,
            'departmentName' => $departmentName,
            'includedTestinDepartment' => $includedTestinDepartment
        );



        if ($this->testDdepartmentModel->save($departmentArray)) {

            return redirect()->to('admin-patien-portal')->with('success', 'Test Category/Department Created succesfully');
        }
    }


    public function deleteTestCategory()
    {

        $departmentId = $this->request->getGet('departmentId');

        if ($this->testDdepartmentModel->where('departmentId', $departmentId)->delete()) {

            return redirect()->to('admin-patien-portal')->with('success', 'Deleted Succesfully');
        }
    }

    public function saveTest()
    {
        $testId = $this->request->getGet('testId');
        $testName = $this->request->getPost('testName');
        $specimen = $this->request->getPost('specimen');
        $collection = $this->request->getPost('collection');
        $testCategoryId = $this->request->getPost('testCategoryId');
        $testPrice = $this->request->getPost('testPrice');

        if (!empty($testCategoryId)) {

            $testCategoryId = implode(',', $testCategoryId);
        } else {

            $testCategoryId = '';
        }

        // dd($testCategoryId);


        $testDataArray = array(

            'test_id' => $testId,
            'testName' => $testName,
            'specimen' => $specimen,
            'collection' => $collection,
            'testCategoryId' => $testCategoryId,
            'testPrice' => $testPrice
        );

        if (!empty($testId)) {

            $msg = 'Test data created succesfully';
            $url = '?test_id=' . $testId;
        } else {

            $msg = 'Test data updated succesfully';
            $url = '';
        }

        if ($this->patientPortalModel->save($testDataArray)) {

            return redirect()->to('admin-patien-portal' . $url)->with('success', $msg);
        }
    }


    public function testList()
    {


        $data['testList'] = $this->patientPortalModel->findAll();

        $data['testDepartment'] = $this->testDdepartmentModel->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/testList', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function deleteTest()
    {
        $testId = $this->request->getGet('test_id');

        if (!empty($testId)) {

            $msg = 'Test data deleted succesfully';
        }

        if ($this->patientPortalModel->where('test_id', $testId)->delete()) {

            return redirect()->to('test-list')->with('success', $msg);
        }
    }


    public function managePackage()
    {
        $data['testList'] = $this->patientPortalModel->findAll();

        $packageId = $this->request->getGet('packageId');

        if (!empty($packageId)) {

            $data['packageDetails'] = $this->testpackageModel->where('id', $packageId)->first();
        }
        echo view('admin/layouts/adminheader');
        echo view('admin/packageSetup', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function packageList()
    {
        $data['packageTestList'] = $this->testpackageModel->findAll();
        echo view('admin/layouts/adminheader');
        echo view('admin/packageList', $data);
        echo view('admin/layouts/adminfooter');
    }


    public function savePackage()
    {
        $packageId = $this->request->getGet('packageId');
        $categoryName = $this->request->getPost('categoryName');
        $includedTest = $this->request->getPost('includedTest');
        $packagePrice = $this->request->getPost('packagePrice');
        $pkgImage = null;



        if (!empty($includedTest)) {
            $includedTest = implode(',', $includedTest);
        }


        if (!empty($packageId)) {

            $url = 'manage-package?packageId=' . $packageId;
            $msg = 'Package updated succesfully';
            $allPakgData =  $this->testpackageModel->where('id', $packageId)->first();
            $pkgImage = $allPakgData['packageImage'];
        } else {

            $url = 'manage-package';
            $msg = 'Package Created succesfully';
        }


        if (isset($_FILES['packageImage']) && $_FILES['packageImage']['size'] > 0) {
            $pkgImage = $this->fileupload->upload('packageImage', ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF', 'gif']);
            if ($pkgImage === 0) {
                return redirect()->to($url)->with('errors', 'Invalid File Type');
            } elseif ($pkgImage === 1) {
                return redirect()->to($url)->with('errors', 'Filesize Exceeds. Please upload a file less than 10MB');
            }
        }



        $packageArray = [
            'id'            => $packageId,
            'categoryName'  => $categoryName,
            'includedTest'  => $includedTest,
            'packagePrice'  => $packagePrice,
            'packageImage'  => $pkgImage

        ];

        if ($this->testpackageModel->save($packageArray)) {


            return redirect()->to($url)->with('success', $msg);
        }
    }

    public function deleteMultipleTestList()
    {

        $testID = $this->request->getPost('itemID');
        $bulkAction = $this->request->getPost('bulkAction');

        $testArray = explode(',', $testID);

        // dd($testID);

        if (!empty($testArray) && $bulkAction == 1) {

            foreach ($testArray as $id) {

                $this->patientPortalModel->where('test_id', $id)->delete();
            }

            return redirect()->to('test-list')->with('success', 'Deleted Succesfully');
        }

        return redirect()->to('test-list')->with('success', 'Action or items Not Seleccted');
    }
}