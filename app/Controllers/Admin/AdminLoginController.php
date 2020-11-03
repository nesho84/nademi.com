<?php

class AdminLoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Loading Model
        $this->model = $this->loadModel('Admin', 'AdminLoginModel');
    }

    // Show a list of the items (Request Type: GET)
    public function index()
    {
        // Check if User is Logged in
        if (isset($_SESSION["userID"])) {
            ForceRedirect::redirect(APPURL . "/admin");
        }

        // Render and pass data to the View
        $this->view->render('Admin/login/login');
    }

    public function check()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Login Form Validation
            $postData = LoginValidator::validate($_POST, $this->model);

            // Return results as JSON
            echo json_encode($postData);
        } else {
            $this->view->render('Admin/login/login');
        }
    }

    public function logout()
    {
        unset($_SESSION["userID"]);
        unset($_SESSION["userEmail"]);
        unset($_SESSION["userName"]);
        unset($_SESSION["userRole"]);
        session_destroy();

        // No need for Model or Controller
        $this->view->render('Admin/login/logout');
    }
}
