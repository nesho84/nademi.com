<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<div class="row align-items-center pt-3">
    <div class="col text-left">
        <h3>Demo</h3>
    </div>
    <div class="col text-right">
        <a href="<?php echo APPURL; ?>/admin/demo/add" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    </div>
</div>

<hr class="border-top">

<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead class="bg-info">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tableDemo">
            <?php
            if ($data) {
                $counter = 0;

                foreach ($data as $d) {
                    // Get images separated with commas
                    $imgs = explode(",", $d['demoImage']);

                    $counter += 1;
                    $demoStatus = ($d['demoStatus'] == 1) ? "<span style='color:#00E676;font-size:1.3em;'><i class='fas fa-circle'></i></span>" : "<span style='color:#dc3545;font-size:1.3em;'><i class='fas fa-circle'></i></span>";
                    echo '<tr>
                            <th scope="row">' . $counter . '</th>
                            <td><img src="' . APPURL . '/public/uploads/demo/' . $imgs[0] . '" width="70px" height="80px"></td>
                            <td>' . $d['demoTitle'] . '</td>
                            <td>' . $d['userName'] . '</td>
                            <td>' . $d['categoryName'] . '</td>
                            <td>' . $demoStatus . '</td>
                            <td>
                            <a class="btn btn-link" href="' . APPURL . '/admin/demo/edit/' . $d['demoID'] . '">
                            <i class="far fa-edit"></i>
                            </a>
                            <a class="btn btn-link deleteBtn" href="' . APPURL . '/admin/demo/delete/' . $d['demoID'] . '">
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