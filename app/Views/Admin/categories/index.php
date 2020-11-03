<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<div class="row align-items-center pt-3">
    <div class="col text-left">
        <h3>Categories</h3>
    </div>
    <div class="col text-right">
        <a href="<?php echo APPURL; ?>/admin/categories/add" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    </div>
</div>

<hr class="border-top">

<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead class="bg-secondary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">User</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tableCategories">
            <?php
            if ($data) {
                $counter = 0;

                foreach ($data as $d) {
                    $counter += 1;
                    echo '<tr>
                            <th scope="row">' . $counter . '</th>
                            <td>' . $d['categoryName'] . '</td>
                            <td>' . $d['userName'] . '</td>
                            <td>' . substr($d['categoryDescription'], 0, 30) . '...</td>
                            <td>
                            <a class="btn btn-link" href="' . APPURL . '/admin/categories/edit/' . $d['categoryID'] . '">
                            <i class="far fa-edit"></i>
                            </a>
                            <a class="btn btn-link deleteBtn" href="' . APPURL . '/admin/categories/delete/' . $d['categoryID'] . '">
                            <i class="far fa-trash-alt"></i>
                            </a>
                            </td>
                        </tr>';
                }
            } else {
                echo "<tr>
                        <td colspan='100%'><h1 class='text-info text-center'>No Records</h1></td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once VIEWS_PATH . "/Admin/includes/footer.php"; ?>