<?php

class ApiProjectsController extends Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();

        // Loading Model
        $this->model = $this->loadModel('Api', 'ApiProjectModel');
    }

    // Projects
    public function projects($id)
    {
        if ($id) {
            // Getting data as array from the Projects_Model
            $this->data = $this->model->getProjectById($id);
        } else {
            $this->data['projects'] = $this->model->getProjects();
        }

        // Return data as JSON
        echo json_encode($this->data);
    }

    // Categories
    public function categories($id)
    {
        if ($id) {
            // Getting data as array from the Projects_Model
            $this->data = $this->model->getCategoryById($id);
        } else {
            $this->data['categories'] = $this->model->getCategories();
        }

        // Return data as JSON
        echo json_encode($this->data);
    }

    // Users
    public function users($id)
    {
        // Check if User is Logged in
        SessionHelper::isLoggedIn();

        if ($id) {
            // Getting data as array from the Projects_Model
            $this->data = $this->model->getUserById($id);
        } else {
            $this->data['users'] = $this->model->getUsers();
        }

        // Return data as JSON
        echo json_encode($this->data);
    }
}
