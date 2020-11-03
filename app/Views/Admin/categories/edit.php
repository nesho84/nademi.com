<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<?php
if ($data['categoryID']) {
?>
    <h5>Edit Category</h5><span>ID: <?php echo $data['categoryID']; ?></span>
    <hr>

    <form id="formCategory" class="form-category" action="<?php echo APPURL . '/admin/categories/edit/' . $data['categoryID']; ?>" method="POST">
        <div class="form-group text-left">
            <label for="categoryName">Category Name *</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Name" value="<?php echo $data['categoryName']; ?>">
            <span class="invalid-feedback" id="categoryName_error"></span>
        </div>
        <div class="form-group text-left">
            <label for="categoryDescription">Description *</label>
            <textarea class="form-control" rows="5" id="categoryDescription" name="categoryDescription" placeholder="Description"><?php echo $data['categoryDescription']; ?></textarea>
            <span class="invalid-feedback" id="categoryDescription_error"></span>
        </div>
        <div class="form-group">
            <button type="submit" id="btnEditCategory" name="btnEditCategory" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
            <a href="<?php echo APPURL . "/admin/categories"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
    </form>

<?php
} else {
    MessageHelper::showMessage('No Data Available', true);
}
?>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>