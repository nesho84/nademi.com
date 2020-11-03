<?php

class AdminProjectsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if User is Logged in
        SessionHelper::isLoggedIn();

        // Loading Model
        $this->model = $this->loadModel('Admin', 'AdminProjectModel');
        // Load AdminCategoryModel
        $this->categoryModel = $this->loadModel('Admin', 'AdminCategoryModel');;
    }

    // Show a list of the items (Request Type: GET)
    public function index()
    {
        // Getting data from the Model
        $data = $this->model->getProjects();

        // Render and pass data to the View
        $data[0]['title'] = "NADEMI - Projects";
        $this->view->render('Admin/projects/index', $data);

        // Check for Session »timeout«
        if (isset($_SESSION["userID"])) {
            SessionHelper::sessionExpired();
        }
    }

    // Show a form to create new item (Request Type: GET)
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $ok = true;

            $postData = [
                'projektTitle' => htmlspecialchars(trim($_POST["projektTitle"])),
                'projektUserID' => $_SESSION["userID"],
                'projektCategoryID' => $_POST["projektCategoryID"] ?? '',
                'projektCompletionDate' => date("Y-m-d", strtotime($_POST["projektCompletionDate"])) ?? '',
                'projektDescription' => htmlspecialchars(trim($_POST["projektDescription"])),
                'projektImage' => $_FILES["projektImage"]["name"],
                'projektLinks' => htmlspecialchars(trim($_POST["projektLinks"]))
            ];

            //Validation
            if (empty($postData['projektTitle'])) {
                $ok = false;
                $postData['projektTitle_error'] = "Title can not be empty";
            }
            if (!$postData["projektCategoryID"]) {
                $ok = false;
                $postData['projektCategoryID_error'] = "Please choose Category";
            }
            if (empty($postData['projektCompletionDate']) || $postData['projektCompletionDate'] == '1970-01-01') {
                $ok = false;
                $postData['projektCompletionDate_error'] = "Please choose a Completion date";
            }
            if (empty($postData['projektDescription'])) {
                $ok = false;
                $postData['projektDescription_error'] = "Please write a description";
            }
            if (empty($postData['projektLinks'])) {
                $ok = false;
                $postData['projektLinks_error'] = "Links can not be empty";
            }

            if (empty($postData['projektImage'])) {
                $ok = false;
                $postData['projektImage_error'] = "Please choose Image";
            } else {
                // Allow certain file formats
                $parts = explode(".", $postData['projektImage']);
                $ending = strtolower(end($parts));
                $allowed = ["jpg", "png", "jpeg", "gif"];
                if (in_array($ending, $allowed)) {
                    $postData['projektImage'] = uniqid() . "." . $ending;
                } else {
                    $ok = false;
                    $postData['projektImage_error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                }
                $imageInfo = getimagesize($_FILES["projektImage"]["tmp_name"]) ?? null;
                if (!$imageInfo) {
                    $ok = false;
                    $postData['projektImage_error'] = "File is not an image";
                }
            }
            // if everything is ok, try to upload file and Save in DB
            if ($ok === true) {
                //  First Upload the file then Insert postData to DB
                if (move_uploaded_file($_FILES['projektImage']['tmp_name'], UPLOAD_PATH . '/' . $postData['projektImage'])) {
                    // Save in DB
                    $this->model->addProject($postData);
                } else {
                    $ok = false;
                    $postData['projektImage_error'] = "Sorry, there was an error uploading your file.";
                }
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            // Get existing categories from CategoryModel
            $categories = $this->categoryModel->getCategories();

            // @TODO: Check for owner

            $data = [
                'projektTitle' => '',
                'projektUserID' => '',
                'projektCategoryID' => '',
                'projektCompletionDate' => '',
                'projektDescription' => '',
                'projektImage' => '',
                'projektLinks' => '',
                'categories' => $categories
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Projects New";
            $this->view->render('Admin/projects/add', $data);
        }
    }

    // Show a form to edit an item (Request Type: POST)
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $ok = true;

            $postData = [
                'projektID' => $id,
                'projektTitle' => htmlspecialchars(trim($_POST["projektTitle"])),
                'projektCategoryID' => $_POST["projektCategoryID"] ?? '',
                'projektCompletionDate' => date("Y-m-d", strtotime($_POST["projektCompletionDate"])) ?? '',
                'projektUserID' => $_SESSION["userID"],
                'projektDescription' => htmlspecialchars(trim($_POST["projektDescription"])),
                'projektImage' => $_FILES["projektImage"]["name"],
                'projektLinks' => htmlspecialchars(trim($_POST["projektLinks"])),
                'projektStatus' => isset($_POST['projektStatus']) ? 1 : 0,
            ];

            //Validation
            if (empty($postData['projektTitle'])) {
                $ok = false;
                $postData['projektTitle_error'] = "Title can not be empty";
            }
            if (!$postData["projektCategoryID"]) {
                $ok = false;
                $postData['projektCategoryID_error'] = "Please choose Category";
            }
            if (empty($postData['projektCompletionDate']) || $postData['projektCompletionDate'] == '1970-01-01') {
                $ok = false;
                $postData['projektCompletionDate_error'] = "Please choose a Completion date";
            }
            if (empty($postData['projektDescription'])) {
                $ok = false;
                $postData['projektDescription_error'] = "Please write a description";
            }
            if (empty($postData['projektLinks'])) {
                $ok = false;
                $postData['projektLinks_error'] = "Links can not be empty";
            }

            // Edit Image Section (if the user changes the Image)
            if (!empty($postData['projektImage'])) {
                //Remove the existing Image
                if (file_exists(UPLOAD_PATH . '/' . $_POST['existingProjektImage'])) {
                    unlink(UPLOAD_PATH . '/' . $_POST['existingProjektImage']);
                }
                // Allow certain file formats
                $parts = explode(".", $postData['projektImage']);
                $ending = strtolower(end($parts));
                $allowed = ["jpg", "png", "jpeg", "gif"];
                if (in_array($ending, $allowed)) {
                    $postData['projektImage'] = uniqid() . "." . $ending;
                } else {
                    $ok = false;
                    $postData['projektImage_error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                }
                $imageInfo = getimagesize($_FILES["projektImage"]["tmp_name"]) ?? null;
                if (!$imageInfo) {
                    $ok = false;
                    $postData['projektImage_error'] = "File is not an image";
                }
                // if everything is ok, try to upload file
                if (move_uploaded_file($_FILES["projektImage"]["tmp_name"], UPLOAD_PATH . '/' . $postData['projektImage'])) {
                    // Image Uploaded...
                } else {
                    $ok = false;
                    $postData['projektImage_error'] = "Sorry, there was an error uploading your file";
                }
            } else {
                // If it was not changed then replace with existing name
                $postData['projektImage'] = $_POST['existingProjektImage'];
            }
            // if everything is ok
            if ($ok === true) {
                // Save in DB
                $this->model->updateProject($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            // Get existing project from Model
            $project = $this->model->getProjectById($id);
            // Get existing categories from CategoryModel
            $categories = $this->categoryModel->getCategories();

            $data = [
                'projektID' => $project['projektID'],
                'projektTitle' => $project['projektTitle'],
                'projektUserID' => $project['projektUserID'],
                'projektCategoryID' => $project['projektCategoryID'],
                'projektCompletionDate' => $project["projektCompletionDate"],
                'projektDescription' => $project['projektDescription'],
                'projektImage' => $project['projektImage'],
                'projektLinks' => $project['projektLinks'],
                'projektStatus' => $project['projektStatus'],
                'categories' => $categories,
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Projects Edit";
            $this->view->render('Admin/projects/edit', $data);
        }
    }

    // Delete an item (Request Type: POST or GET)
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postData = [
                'projektID' => $id
            ];

            // Get existing project from Model
            $project = $this->model->getProjectById($id);

            // if true is returned
            if ($this->model->deleteProject($postData)) {
                // Remove the existing Image
                if (file_exists(UPLOAD_PATH . '/' . $project['projektImage'])) {
                    unlink(UPLOAD_PATH . '/' . $project['projektImage']);
                }

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
