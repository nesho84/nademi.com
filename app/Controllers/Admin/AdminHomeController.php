<?php

class AdminHomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if User is Logged in
        SessionHelper::isLoggedIn();

        // Loading Model
        $this->model = $this->loadModel('Admin', 'AdminHomeModel');
    }

    public function index()
    {
        // Getting data from the Model
        $data = $this->model->getTables();

        // Passing data to the view
        $this->view->render('Admin/index', $data);

        // Check for Session »timeout«
        if (isset($_SESSION["userID"])) {
            SessionHelper::sessionExpired();
        }
    }
}
