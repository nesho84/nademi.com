<?php

class AdminCategoriesController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if User is Logged in
        SessionHelper::isLoggedIn();

        // Loading Model
        $this->model = $this->loadModel('Admin', 'AdminCategoryModel');
    }

    // Show a list of the items (Request Type: GET)
    public function index()
    {
        // Getting data from the Model
        $data = $this->model->getCategories();

        // Render and pass data to the View
        $data[0]['title'] = "NADEMI - Categories";
        $this->view->render('Admin/categories/index', $data);

        // Check for Session »timeout«
        if (isset($_SESSION["userID"])) {
            SessionHelper::sessionExpired();
        }
    }

    // Show a form to add new item (Request Type: GET)
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form validation
            $postData = CategoryValidator::validate($_POST);
            $ok = CategoryValidator::getOk();

            if ($ok === true) {
                // Save in DB
                $this->model->addCategory($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            $data = [
                'categoryName' => '',
                'categoryDescription' => ''
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Categories New";
            $this->view->render('Admin/categories/add', $data);
        }
    }

    // Show a form to edit item (Request Type: POST)
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form validation
            $postData = CategoryValidator::validate($_POST);
            $ok = CategoryValidator::getOk();

            // get the id and add to the post array
            $postData['categoryID'] = $id;

            if ($ok === true) {
                // Save changes in DB
                $this->model->updateCategory($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            // Get existing category from Model
            $category = $this->model->getCategoryById($id);

            $data = [
                'categoryID' => $category['categoryID'],
                'categoryName' => $category["categoryName"],
                'categoryDescription' => $category["categoryDescription"]
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Categories Edit";
            $this->view->render('Admin/categories/edit', $data);
        }
    }

    // Delete an item (Request Type: POST or GET)
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postData = [
                'categoryID' => $id
            ];

            // if true is returned
            if ($this->model->deleteCategory($postData)) {
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
