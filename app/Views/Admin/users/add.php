<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<h5>Register</h5>
<p class="text-muted py-0">Create new User Account</p>
<hr>

<form action="#" id="formRegister" class="form-register" action="<?php echo APPURL . '/admin/users/add'; ?>" method="POST">
    <div class="form-group">
        <label for="userName">Username *</label>
        <input type="text" class="form-control" id="userName" name="userName" placeholder="Username" value="<?php echo $data['userName']; ?>">
        <span class="invalid-feedback" id="userName_error"></span>
    </div>
    <div class="form-group">
        <label for="userEmail">Email *</label>
        <input type="userEmail" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?php echo $data['userEmail']; ?>">
        <span class="invalid-feedback" id="userEmail_error"></span>
    </div>
    <div class="form-group">
        <label for="userPassword">Password *</label>
        <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="<?php echo $data['userPassword']; ?>">
        <span class="invalid-feedback" id="userPassword_error"></span>
    </div>
    <div class="form-group">
        <label for="userPassword2">Confirm Password *</label>
        <input type="password" class="form-control" id="userPassword2" name="userPassword2" placeholder="Confirm Password" value="<?php echo $data['userPassword2']; ?>">
        <span class="invalid-feedback" id="userPassword2_error"></span>
    </div>
    <div class="form-group">
        <button type="submit" id="btnRegister" name="btnRegister" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Register</button>
        <a href="<?php echo APPURL . "/admin/users"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
    </div>
</form>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>