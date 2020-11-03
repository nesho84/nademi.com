<?php

class SessionHelper
{
    public static function isLoggedIn()
    {
        // Check if User is Logged in
        if (empty($_SESSION["userID"])) {
            ForceRedirect::redirect(APPURL . "/admin/login");
        }
    }

    public static function createUserSession($user, $loginRemember)
    {
        // Set sessions
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['userEmail'] = $user['userEmail'];
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['userRole'] = $user['userRole'];
        if (isset($_COOKIE['last_login'])) {
            $_SESSION['last_login'] = $_COOKIE['last_login'];
        }
        setcookie('last_login', time(), 2147483647);

        // Remember me checkBox
        if ($loginRemember) {
            setcookie('email', $user['userEmail'], time() + 30 * 24 * 60 * 60);
        } else {
            if (isset($_COOKIE['email'])) {
                setcookie('email', '', time() - 3600);
            }
        }
    }

    public static function sessionExpired()
    {
        // Time until »timeout« in seconds
        $session_timeout = 3600; // 1800 Sec./60 Sec. = 30 Min

        // Set the Session if does not exist
        if (!isset($_SESSION['last_visit'])) {
            $_SESSION['last_visit'] = time();
        }

        // Session timeout
        if ((time() - $_SESSION['last_visit']) > $session_timeout) {
            // Show the alert (sweetalert2)
            echo "<script>
                    Swal.fire({
                        icon: 'info',
                        title: 'Oops...',
                        text: 'Your session has expired!',
                        footer: '<small>You will be redirected to the Login page.</small>'
                    }).then((result) => {
                        if (result) {
                            window.location.replace('" . APPURL . "/admin/logout');
                        }
                    });
                    </script>";
        }
        $_SESSION['last_visit'] = time();
    }
}
