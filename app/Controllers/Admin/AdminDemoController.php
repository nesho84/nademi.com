<?php

class AdminDemoController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if User is Logged in
        SessionHelper::isLoggedIn();

        // Loading Model
        $this->model = $this->loadModel('Admin', 'AdminDemoModel');
        // Load AdminCategoryModel
        $this->categoryModel = $this->loadModel('Admin', 'AdminCategoryModel');
        // Load Image Uploader Class
        $this->imageHandler = new ImageHandler();
    }

    // Show a list of the items (Request Type: GET)
    public function index()
    {
        // Getting data from the Model
        $data = $this->model->getDemos();

        // Render and pass data to the View
        $data[0]['title'] = "NADEMI - Demo";
        $this->view->render('Admin/demo/index', $data);

        // Check for Session »timeout«
        if (isset($_SESSION["userID"])) {
            SessionHelper::sessionExpired();
        }
    }

    // Show a form to create new item (Request Type: GET/POST)
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form Validation
            $postData = DemoValidator::validate($_POST);
            $ok = DemoValidator::getOk();

            // Check Upload (returns true or false)
            if ($this->imageHandler->checkUpload($_FILES)) {
                // Get images array as string separated with commas
                $postData['demoImage'] = $this->imageHandler->getImagesAsString();
            } else {
                $ok = false;
                $postData['demoImage_error']  = $this->imageHandler->getUploadErrors();
            }

            // if everything is ok, Upload Images and Save data in DB
            if ($ok === true) {
                // Process images Upload
                $this->imageHandler->runUpload();

                // Save in DB
                $this->model->addDemo($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            // Get existing categories from CategoryModel
            $categories = $this->categoryModel->getCategories();

            $data = [
                'demoTitle' => '',
                'demoUserID' => '',
                'demoCategoryID' => '',
                'demoCompletionDate' => '',
                'demoDescription' => '',
                'demoImage' => '',
                'demoLinks' => '',
                'categories' => $categories
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Demo New";
            $this->view->render('Admin/demo/add', $data);
        }
    }

    // Show a form to edit an item (Request Type: GET/POST)
    public function edit($id)
    {
        // Get existing demo from Model
        $demo = $this->model->getDemoById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form Validation
            $postData = DemoValidator::validate($_POST);
            $ok = DemoValidator::getOk();

            // Edit Images (if the user changes the Images)
            if (!empty($_FILES["demoImage"]["name"][0])) {
                // Check Upload (returns true or false)
                if ($this->imageHandler->checkUpload($_FILES)) {
                    // Get images array as string separated with commas
                    $postData['demoImage'] = $this->imageHandler->getImagesAsString();
                } else {
                    $ok = false;
                    $postData['demoImage_error'] = $this->imageHandler->getUploadErrors();
                }
            } else {
                // If it was not changed then replace with existing string
                $postData['demoImage'] = $_POST['existingdemoImages'];
            }

            // get the id and status
            $postData['demoID'] = $id;
            $postData['demoStatus'] = isset($_POST['demoStatus']) ? 1 : 0;

            // if everything is ok, Upload Images and Save data in DB
            if ($ok === true) {
                // Process edit Upload
                if (!empty($_FILES["demoImage"]["name"][0])) {
                    // //Remove the existing Images
                    // $this->imageHandler->deleteImages($_POST['existingdemoImages']);

                    // run upload for the new files
                    $this->imageHandler->runUpload();

                    // ADD MORE IMAGES
                    if ($demo['demoImage']) { // check to avoid empty images or just ","
                        $oldImgs = explode(',', $demo['demoImage']);
                        $newImgs = explode(',', $postData['demoImage']);
                        $allImgs = array_merge($oldImgs, $newImgs);
                        // Save as one string separated with commas
                        $postData['demoImage'] = implode(',', $allImgs);
                    }
                }
                // Save in DB
                $this->model->updateDemo($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            // Get existing categories from CategoryModel
            $categories = $this->categoryModel->getCategories();

            $data = [
                'demoID' => $demo['demoID'],
                'demoTitle' => $demo['demoTitle'],
                'demoUserID' => $demo['demoUserID'],
                'demoCategoryID' => $demo['demoCategoryID'],
                'demoCompletionDate' => $demo["demoCompletionDate"],
                'demoDescription' => $demo['demoDescription'],
                'demoImage' => $demo['demoImage'],
                'demoLinks' => $demo['demoLinks'],
                'demoStatus' => $demo['demoStatus'],
                'categories' => $categories,
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Demo Edit";
            $this->view->render('Admin/demo/edit', $data);
        }
    }

    // Delete an item (Request Type: POST or GET)
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postData = [
                'demoID' => $id
            ];

            // Get existing demo from Model
            $demo = $this->model->getDemoById($id);

            // if true is returned
            if ($this->model->deleteDemo($postData)) {
                // Delete Images in folder
                $this->imageHandler->deleteImages($demo['demoImage']);

                $postData['msg'] = "success";
            } else {
                $postData['msg'] = "Something went wrong!";
            }

            // Return results as JSON
            echo json_encode($postData);
        }
    }

    // Delete a single Image
    public function deleteImg($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $postData = [
                'demoID' => $id,
                'img' => $_POST['img']
            ];

            // Get existing demo from Model
            $demo = $this->model->getDemoById($id);

            // Get images from the DB separated with commas
            $imgs = explode(",", $demo['demoImage']);

            // Search and delete value from the array
            unset($imgs[array_search($postData['img'], $imgs)]);

            // Save array as one string separated with commas
            $demo['demoImage'] = implode(',', $imgs);

            // if true is returned
            if ($this->model->updateDemo($demo)) {
                // Delete Image in folder
                $this->imageHandler->deleteImages($postData['img']);

                $postData['msg'] = "success";
            } else {
                $postData['msg'] = "Something went wrong!";
            }

            // Return results as JSON
            echo json_encode($postData);
        }
    }

    // Show an item (Request Type: POST or GET)
    public function show($id)
    {
        # code
    }
}
