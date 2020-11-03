<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<h5>Insert new Project</h5>
<hr>

<form id="formProject" class="form-project" action="#" action="<?php echo APPURL . '/admin/projects/add'; ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="projektTitle">Title *</label>
        <input type="text" class="form-control" id="projektTitle" name="projektTitle" placeholder="Title" value="<?php echo $data['projektTitle']; ?>">
        <span class="invalid-feedback" id="projektTitle_error"></span>
    </div>
    <div class="form-group">
        <label for="projektCategoryID">Category *</label>
        <select id='projektCategoryID' name='projektCategoryID' class='form-control'>
            <option class='select_hide' disabled selected>Select Category</option>
            <?php
            foreach ($data['categories'] as $cat) {
                echo '<option value="' . $cat['categoryID'] . '">' . $cat['categoryName'] . '</option>';
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
        <small>(Image Dimensions: 500 x 350)*</small>
        <!-- <input type="file" id="projektImage" name="projektImage" accept="image/*"> -->
        <input class="form-control" type="file" name="projektImage" id="projektImage">
        <small class="text-danger" id="projektImage_error"></small>
    </div>
    <div class="form-group">
        <label for="projektLinks">Links (separated by commas: link1.com, link2.com...) *</label>
        <textarea class="form-control" rows="5" id="projektLinks" name="projektLinks" placeholder="Links (separated by commas: link1.com, link2.com...)"><?php echo $data['projektLinks']; ?></textarea>
        <span class="invalid-feedback" id="projektLinks_error"></span>
    </div>
    <div class="form-group">
        <button type="submit" id="btnAddProject" name="btnAddProject" class="btn btn-primary btn-lg btn-block" onclick="save(this)">Save</button>
        <a href="<?php echo APPURL . "/admin/projects"; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Close</a>
    </div>
</form>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>