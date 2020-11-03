<?php

class AdminUsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if User is Logged in
        SessionHelper::isLoggedIn();

        // Loading Model
        $this->model = $this->loadModel('Admin', 'AdminUserModel');
    }

    // Show a list of the items (Request Type: GET)
    public function index()
    {
        // Getting data from the Model
        $data = $this->model->getUsers();

        // Render and pass data to the View
        $data[0]['title'] = "NADEMI - Users";
        $this->view->render('Admin/users/index', $data);

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
                'userName' => strip_tags($_POST['userName']),
                'userEmail' => $_POST['userEmail'],
                'userPassword' => $_POST["userPassword"]
            ];

            // Validation
            if (empty($postData['userName'])) {
                $ok = false;
                $postData['userName_error'] = "Username can not be empty";
            }
            if (filter_var($postData['userEmail'], FILTER_VALIDATE_EMAIL) === false) {
                $ok = false;
                $postData['userEmail_error'] = "The email you entered was not valid";
            }
            if (strlen($postData['userPassword']) < 8) {
                $ok = false;
                $postData['userPassword_error'] = "The password must have at least 8 characters!<br>";
            }
            if ($postData['userPassword'] !== $_POST["userPassword2"]) {
                $ok = false;
                $postData['userPassword_error'] = "Passwords do not match!<br>";
                $postData['userPassword2_error'] = "Passwords do not match!<br>";
            }

            // Email exist Validation
            $userEmail = $this->model->getUserByEmail($postData['userEmail']);
            // If email found
            if ($userEmail !== false) {
                $ok = false;
                $postData['userEmail_error'] = "Email already exists!<br>";
            }

            if ($ok === true) {
                // Hash the password
                $options = ['cost' => 10];
                $postData['userPassword'] = password_hash($postData['userPassword'], PASSWORD_BCRYPT, $options);

                // Save in DB
                $this->model->addUser($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            $data = [
                'userName' => '',
                'userEmail' => '',
                'userPassword' => '',
                'userPassword2' => ''
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Users New";
            $this->view->render('Admin/users/add', $data);
        }
    }

    // Show a form to edit an item (Request Type: POST)
    public function edit($id)
    {
        // Get existing user from Model
        $user = $this->model->getUserById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $ok = true;

            $postData = [
                'userID' => $id,
                'userRole' => isset($_POST["userRole"]) ? 1 : 0
            ];

            // Validation - if the User try to edit password, else update just user role
            if ($_POST['userPassword'] !== "" || $_POST["userPassword2"] !== "") {
                if (strlen($_POST['userPassword']) < 8) {
                    $ok = false;
                    $postData['userPassword_error'] = "The password must have at least 8 characters!<br>";
                }
                if (empty($_POST["userPassword2"])) {
                    $ok = false;
                    $postData['userPassword2_error'] = "Please enter new password";
                }
                if (strlen($_POST['userPassword2']) < 8) {
                    $ok = false;
                    $postData['userPassword2_error'] = "The new password must have at least 8 characters!<br>";
                }
                // Verify the existing Password
                if (!password_verify($_POST['userPassword'], $user["userPassword"])) {
                    $ok = false;
                    $postData['userPassword_error'] = "The old Password is wrong!<br>";
                }
            }

            if ($ok === true) {
                // Hash the password
                if ($_POST['userPassword'] !== "") {
                    $options = ['cost' => 10];
                    $postData['userPassword'] = password_hash($_POST["userPassword2"], PASSWORD_BCRYPT, $options);
                }

                // Save in DB
                $this->model->updateUser($postData);
            }

            // Return results as JSON
            echo json_encode($postData);
        } else {
            // @TODO: Check for owner

            $data = [
                'userID' => $user['userID'],
                'userEmail' => $user['userEmail'],
                'userName' => $user['userName'],
                'userRole' => $user['userRole']
            ];

            // Render and pass data to the View
            $data[0]['title'] = "NADEMI - Users Edit";
            $this->view->render('Admin/users/edit', $data);
        }
    }

    // Delete an item (Request Type: POST or GET)
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postData = [
                'userID' => $id
            ];

            // if true is returned
            if ($this->model->deleteUser($postData)) {
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
