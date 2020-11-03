<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<h5>Insert New Category</h5>
<hr>

<form id="formCategory" class="form-category" action="<?php echo APPURL . '/admin/categories/add'; ?>" method="POST">
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
        <button type="submit" id="btnAddCategory" name="btnAddCategory" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
        <a href="<?php echo APPURL . "/admin/categories"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
</form>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>