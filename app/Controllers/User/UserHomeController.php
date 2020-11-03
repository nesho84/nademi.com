<?php

class UserHomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Loading UserProjectModel
        $this->projectModel = $this->loadModel('User', 'UserProjectModel');
    }

    public function index()
    {
        // Getting data from the UserProjectModel
        $data = $this->projectModel->getProjects('LIMIT 4');

        // Passing data to the view
        $this->view->render('User/main/home', $data);
    }
}
