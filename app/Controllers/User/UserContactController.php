<?php

class UserContactController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'subject' => '',
            'name' => '',
            'userEmail' => '',
            'message' => '',
            'title' => 'Contact'
        ];

        $this->view->render('User/contact/index', $data);
    }

    public function check()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $ok = true;

            $postData = [
                'subject' => htmlspecialchars(strip_tags($_POST["subject"])),
                'name' => htmlspecialchars(strip_tags($_POST["name"])),
                'userEmail' => $_POST["userEmail"],
                'message' => htmlspecialchars(strip_tags($_POST["message"]))
            ];

            if (strlen($postData['subject']) < 1) {
                $ok = false;
                $postData['subject_error'] = "Subject can not be empty";
            }
            if (strlen($postData['name']) < 1) {
                $ok = false;
                $postData['name_error'] = "Name can not be empty";
            }
            if (filter_var($postData['userEmail'], FILTER_VALIDATE_EMAIL) === false) {
                $ok = false;
                $postData['userEmail_error'] = "The email you entered was not valid";
            }
            if (strlen($postData['message']) < 1) {
                $ok = false;
                $postData['message_error'] = "Message can not be empty";
            }

            ######## Google reCAPTCHA request START #########
            $secret = "6Lce2tMUAAAAACc2wwtpJ09bgN1t9WikvzYILIb0";
            $response = $_POST["g-recaptcha-response"];
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => $secret,
                'response' => $response
            );
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/x-www-form-urlencoded",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);

            if ($captcha_success->success == false) {
                $ok = false;
                $postData['recaptcha_error'] = "Please show you are not a robot";
            } // else if ($captcha_success->success == true) { This user is verified by recaptcha }
            ######## Google reCAPTCHA request END #############

            if ($ok === true) {
                // Send Email Function
                sendEmail($postData['subject'], $postData['name'], $postData['userEmail'], $postData['message'], CONTACT_FORM_EMAIL);
            }

            // Return results
            echo json_encode($postData);
        } else {
            $data = [
                'subject' => '',
                'name' => '',
                'userEmail' => '',
                'message' => '',
                'title' => 'Contact'
            ];

            $this->view->render('User/contact/index', $data);
        }
    }
}
