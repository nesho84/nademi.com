<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - Login</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/public/css/adm.css" />
</head>

<body>

    <!-- MAIN Content START -->
    <div class="container">
        <div id="login-wrapper">
            <form action="<?php echo APPURL . '/admin/login/check'; ?>" id="formLogin" class="form-signin" method="POST">
                <div class="text-center mb-3">
                    <img class="mb-1" src="<?php echo APPURL; ?>/public/img/logo2.png" alt="" height="100">
                    <p class="text-muted mt-2 mb-0">Welcome to NADEMI Administration</p>
                    <!-- Show the last user visit -->
                    <?php
                    if (isset($_COOKIE['last_login'])) {
                        echo '<small><strong>Last login:</strong> ' . date('d/m/Y H:i:s', $_COOKIE['last_login']) . '</small>';
                    } else {
                        echo '<small>Welcome back</small>';
                    }
                    ?>
                    <hr class="mt-1">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '' ?>">
                    <span class="invalid-feedback" id="email_error"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo isset($_COOKIE["password"]) ? $_COOKIE["password"] : '' ?>">
                    <span class="invalid-feedback" id="password_error"></span>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" value="true" class="custom-control-input" name="loginRemember" id="loginRemember" <?php echo isset($_COOKIE["email"]) ? "checked" : "" ?>>
                    <label class="custom-control-label" for="loginRemember">Remember me</label>
                </div>

                <div class="form-group mt-4">
                    <input type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary btn-lg btn-block" value="Sign In">
                </div>

                <!-- Output login_spinner -->
                <div class="form-group mt-4 text-center">
                    <div id="login_spinner"></div>
                </div>

                <!-- Redirect Link -->
                <input type="hidden" data-redirect="<?php echo APPURL . "/admin"; ?>">

                <p class="text-center"><a href="<?php echo APPURL; ?>">← Go back to <?php echo SITE_NAME; ?></a></p>
            </form>
        </div>
    </div>
    <!-- MAIN Content END -->

    <!-- Login Ajax START -->
    <script src="<?php echo APPURL . '/app/Views/Admin/login/ajax.js'; ?>"></script>
    <script>
        submitLogin();
    </script>
    <!-- Login Ajax END -->

</body>

</html>