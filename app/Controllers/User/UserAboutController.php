<?php

class UserAboutController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'About';

        $this->view->render('User/about/index', $data);
    }
}
