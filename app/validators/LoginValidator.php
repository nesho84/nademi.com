<?php

class LoginValidator
{
    private static $ok = true;

    public static function validate($postData, $userModel)
    {
        // Sanitize POST array
        $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Validate fields
        if (empty($postData["email"])) {
            self::$ok = false;
            $postData['email_error'] = "Please enter your Email";
        }
        if (empty($postData["password"])) {
            self::$ok = false;
            $postData['password_error'] = "Please enter your password";
        }

        if (self::getOk()) {
            // Validate Email and Password
            if (filter_var($postData["email"], FILTER_VALIDATE_EMAIL) !== false) {
                // Getting user data from the Model
                $user = $userModel->findByEmail($postData["email"]);

                if ($user) {
                    // Compare Postdata password with user password
                    if (password_verify($postData["password"], $user["userPassword"])) {
                        // Save user data in Session and Cookies
                        SessionHelper::createUserSession($user, $postData['loginRemember'] ?? false);
                    } else {
                        $postData['password_error'] = "The password you entered was not valid";
                    } //password_verify END
                } else {
                    $postData['email_error'] = "No account found with this email address.";
                } // $user END
            } else {
                $postData['email_error'] = "The email you entered was not valid.";
            }
        }

        // return validated fields
        return $postData;
    }

    public static function getOk()
    {
        if (!self::$ok) {
            return false;
        } else {
            return true;
        }
    }
}
