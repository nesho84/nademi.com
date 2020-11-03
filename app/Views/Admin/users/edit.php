<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<?php
if ($data['userID']) {
?>
    <h5>Edit User</h5><span>ID: <?php echo $data['userID']; ?></span>
    <hr>

    <form action="#" id="formRegister" class="form-register" action="<?php echo APPURL . '/admin/users/edit' . $data['userID']; ?>; ?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="userName" name="userName" placeholder="Username" value="<?php echo $data['userName']; ?>" disabled>
            <span class="invalid-feedback" id="userName_error"></span>
        </div>
        <div class="form-group">
            <input type="userEmail" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?php echo $data['userEmail']; ?>" disabled>
            <span class="invalid-feedback" id="userEmail_error"></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="userPassword" name="userPassword" placeholder="Old Password">
            <span class="invalid-feedback" id="userPassword_error"></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="userPassword2" name="userPassword2" placeholder="New Password">
            <span class="invalid-feedback" id="userPassword2_error"></span>
        </div>
        <!-- UserRole goes below... -->
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="userRole" name="userRole" value="true" <?php echo $data['userRole'] == 1 ? "checked" : ""; ?>>
            <small class="invalid-feedback" id="userRole_error"></small>
            <label class="custom-control-label" for="userRole">UserRole (checked is Admin)</label>
        </div>
        <div class="form-group">
            <button type="submit" id="btnEditUser" name="btnEditUser" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
            <a href="<?php echo APPURL . "/admin/users"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
        </div>
    </form>

<?php
} else {
    MessageHelper::showMessage('No Data Available', true);
}
?>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>