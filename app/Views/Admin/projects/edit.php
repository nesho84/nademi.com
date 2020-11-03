<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<?php
if ($data['projektID']) {
?>
    <h5>Edit Project</h5><span>ID: <?php echo $data['projektID']; ?></span>
    <hr>

    <form id="formProject" class="form-project" action="<?php echo APPURL . '/admin/projects/edit/' . $data['projektID']; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" id="projektTitle" name="projektTitle" placeholder="Title" value="<?php echo $data['projektTitle']; ?>">
            <span class="invalid-feedback" id="projektTitle_error"></span>
        </div>
        <div class="form-group">
            <select id='projektCategoryID' name='projektCategoryID' class='form-control'>
                <option class='select_hide' disabled selected>Select Category</option>
                <?php
                foreach ($data['categories'] as $cat) {
                    if ($data['projektCategoryID'] == $cat['categoryID']) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo '<option value="' . $cat['categoryID'] . '" ' . $selected . '>' . $cat['categoryName'] . '</option>';
                }
                ?>
            </select>
            <span class="invalid-feedback" id="projektCategoryID_error"></span>
        </div>
        <div class="form-group">
            <label for="projektCompletionDate">Completion date</label>
            <input class="form-control" type="date" class="form-controll" id="projektCompletionDate" name="projektCompletionDate" value="<?php echo $data['projektCompletionDate']; ?>">
            <span class="invalid-feedback" id="projektCompletionDate_error"></span>
        </div>
        <div class="form-group">
            <label for="projektDescription">Description *</label>
            <textarea class="form-control" rows="5" id="projektDescription" name="projektDescription" placeholder="Description"><?php echo $data['projektDescription']; ?></textarea>
            <span class="invalid-feedback" id="projektDescription_error"></span>
        </div>
        <div class="form-group text-left">
            <small>(Dimensions: 500 x 350)*</small><br>
            <img id="previewImg" src="<?php echo APPURL . '/public/uploads/' . $data['projektImage']; ?>" width='105px' class="mb-2">&nbsp;
            <input class="form-control" type="file" id="projektImage" name="projektImage" accept="image/*">
            <!-- Send Existing Image -->
            <input type="hidden" id="existingProjektImage" name="existingProjektImage" value="<?php echo $data['projektImage']; ?>">
            <small class="text-danger" id="projektImage_error"></small>
        </div>
        <div class="form-group">
            <label for="projektLinks">Links (separated by commas: link1.com, link2.com...) *</label>
            <textarea class="form-control" rows="5" id="projektLinks" name="projektLinks" placeholder="Links (separated by commas like: link1.com, link2.com...)"><?php echo $data['projektLinks']; ?></textarea>
            <span class="invalid-feedback" id="projektLinks_error"></span>
        </div>
        <!-- projektStatus goes below... -->
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="projektStatus" name="projektStatus" <?php echo $data['projektStatus'] == 1 ? " checked" : "" ?>>
            <small class="invalid-feedback" id="projektStatus_error"></small>
            <label class="custom-control-label" for="projektStatus">Project Status (checked is active)</label>
        </div>
        <div class="form-group">
            <button type="submit" id="btnAddProject" name="btnAddProject" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
            <a href="<?php echo APPURL . "/admin/projects"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
        </div>
    </form>

<?php
} else {
    MessageHelper::showMessage('No Data Available', true);
}
?>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>