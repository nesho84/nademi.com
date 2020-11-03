<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<h5>Insert new Demo</h5>
<hr>

<form id="formDemo" class="form-demo" action="#" action="<?php echo APPURL . '/admin/demo/add'; ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="demoTitle">Title *</label>
        <input type="text" class="form-control" id="demoTitle" name="demoTitle" placeholder="Title" value="<?php echo $data['demoTitle']; ?>">
        <span class="invalid-feedback" id="demoTitle_error"></span>
    </div>
    <div class="form-group">
        <label for="demoCategoryID">Category *</label>
        <select id='demoCategoryID' name='demoCategoryID' class='form-control'>
            <option class='select_hide' disabled selected>Select Category</option>
            <?php
            foreach ($data['categories'] as $cat) {
                echo '<option value="' . $cat['categoryID'] . '">' . $cat['categoryName'] . '</option>';
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
        <label for="demoImage">Images *</label><br>
        <!-- <input type="file" id="demoImage" name="demoImage" accept="image/*"> -->
        <input class="form-control" type="file" name="demoImage[]" id="demoImage" multiple>
        <small class="text-danger" id="demoImage_error"></small>
    </div>
    <div class="form-group">
        <label for="demoLinks">Links (separated by commas: link1.com, link2.com...) *</label>
        <textarea class="form-control" rows="5" id="demoLinks" name="demoLinks" placeholder="Links (separated by commas: link1.com, link2.com...)"><?php echo $data['demoLinks']; ?></textarea>
        <span class="invalid-feedback" id="demoLinks_error"></span>
    </div>
    <div class="form-group">
        <button type="submit" id="btnAddDemo" name="btnAddDemo" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
        <a href="<?php echo APPURL . "/admin/demo"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
    </div>
</form>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>