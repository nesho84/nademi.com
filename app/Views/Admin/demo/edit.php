<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<?php
if ($data['demoID']) {
?>
    <h5>Edit Demo</h5><span>ID: <?php echo $data['demoID']; ?></span>
    <hr>

    <form id="formDemo" class="form-demo" action="<?php echo APPURL . '/admin/demo/edit/' . $data['demoID']; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" id="demoTitle" name="demoTitle" placeholder="Title" value="<?php echo $data['demoTitle']; ?>">
            <span class="invalid-feedback" id="demoTitle_error"></span>
        </div>
        <div class="form-group">
            <select id='demoCategoryID' name='demoCategoryID' class='form-control'>
                <option class='select_hide' disabled selected>Select Category</option>
                <?php
                foreach ($data['categories'] as $cat) {
                    if ($data['demoCategoryID'] == $cat['categoryID']) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo '<option value="' . $cat['categoryID'] . '" ' . $selected . '>' . $cat['categoryName'] . '</option>';
                }
                ?>
            </select>
            <span class="invalid-feedback" id="demoCategoryID_error"></span>
        </div>
        <div class="form-group">
            <label for="demoCompletionDate">Completion date</label>
            <input class="form-control" type="date" class="form-controll" id="demoCompletionDate" name="demoCompletionDate" value="<?php echo $data['demoCompletionDate']; ?>">
            <span class="invalid-feedback" id="demoCompletionDate_error"></span>
        </div>
        <div class="form-group">
            <label for="demoDescription">Description *</label>
            <textarea class="form-control" rows="5" id="demoDescription" name="demoDescription" placeholder="Description"><?php echo $data['demoDescription']; ?></textarea>
            <span class="invalid-feedback" id="demoDescription_error"></span>
        </div>
        <div class="form-group text-left">
            <label for="demoImage">Images</label><br>
            <div id="edit-images-wrapper">
                <?php
                // Get images separated with commas
                if ($data['demoImage']) {
                    $imgs = explode(",", $data['demoImage']);
                    foreach ($imgs as $img) {
                        echo '<div class="single-img"><img class="previewImg" src="' . APPURL . '/public/uploads/demo/' . $img . '" width="105px" height="105px" class="mb-2">
                        <a href="' . APPURL . '/admin/demo/deleteImg/' . $data['demoID'] . '" class="delete-single-img" data-single="' . $img . '">
                        <i class="far fa-times-circle"></i>
                        </a>
                        </div>';
                    }
                }
                ?>
            </div>
            <input class="form-control" type="file" name="demoImage[]" id="demoImage" multiple>
            <!-- Send Existing Image -->
            <input type="hidden" id="existingdemoImages" name="existingdemoImages" value="<?php echo $data['demoImage']; ?>">
            <small class="text-danger" id="demoImage_error"></small>
        </div>
        <div class="form-group">
            <label for="demoLinks">Links (separated by commas: link1.com, link2.com...) *</label>
            <textarea class="form-control" rows="5" id="demoLinks" name="demoLinks" placeholder="Links (separated by commas like: link1.com, link2.com...)"><?php echo $data['demoLinks']; ?></textarea>
            <span class="invalid-feedback" id="demoLinks_error"></span>
        </div>
        <!-- demoStatus goes below... -->
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="demoStatus" name="demoStatus" <?php echo $data['demoStatus'] == 1 ? " checked" : "" ?>>
            <small class="invalid-feedback" id="demoStatus_error"></small>
            <label class="custom-control-label" for="demoStatus">Demo Status (checked is active)</label>
        </div>
        <div class="form-group">
            <button type="submit" id="btnAddDemo" name="btnAddDemo" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
            <a href="<?php echo APPURL . "/admin/demo"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
        </div>
    </form>

<?php
} else {
    MessageHelper::showMessage('No Data Available', true);
}
?>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>