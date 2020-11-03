<?php

class UserProjectsController extends Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();

        // Loading Model
        $this->model = $this->loadModel('User', 'UserProjectModel');
    }

    public function index()
    {
        // Getting data from the Model
        $this->data['title'] = "Projects";
        $this->data['projects'] = $this->model->getProjects();
        $this->data['categories'] = $this->model->getCategories();

        // Passing data to the view
        $this->view->render('User/projects/index', $this->data);
    }

    public function detail($id)
    {
        // Getting data as assoc array from the Projects_Model
        $this->data = $this->model->getProjectById($id);

        // Passing data to the View
        $this->view->render('User/projects/detail', $this->data);
    }

    public function filter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST["searchInput"])) {
                $searchInput = "%" . htmlspecialchars($_POST["searchInput"]) . "%";

                echo json_encode($this->model->getProjectBySeachInput($searchInput));
            }

            if (isset($_POST["sortBy"])) {
                $sortBy = htmlspecialchars($_POST["sortBy"]);

                echo json_encode($this->model->getProjectBySortBy($sortBy));
            }

            if (isset($_POST["selectedCategory"])) {
                $selectedCategory = (int) ($_POST["selectedCategory"]);

                echo json_encode($this->model->getProjectBySelectedCategory($selectedCategory));
            }
        }
    }
}
