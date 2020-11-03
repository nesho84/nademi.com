<?php require_once VIEWS_PATH . "/Admin/includes/header.php"; ?>

<div class="row align-items-center pt-3">
    <div class="col text-left">
        <h3>Users</h3>
    </div>
    <div class="col text-right">
        <a href="<?php echo APPURL; ?>/admin/users/add" class="btn btn-success"><i class="fas fa-plus"></i> Register</a>
    </div>
</div>

<hr class="border-top">

<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">UserRole</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tableUsers">
            <?php
            if ($data) {
                $counter = 0;

                foreach ($data as $d) {
                    $counter += 1;
                    echo '<tr>
                            <th scope="row">' . $counter . '</th>
                            <td>' . $d['userID'] . '</td>
                            <td>' . $d['userName'] . '</td>
                            <td>' . $d['userEmail'] . '</td>
                            <td>' . $d['userRole'] . '</td>
                            <td>
                            <a class="btn btn-link" href="' . APPURL . '/admin/users/edit/' . $d['userID'] . '">
                            <i class="far fa-edit"></i>
                            </a>
                            <a class="btn btn-link deleteBtn" href="' . APPURL . '/admin/users/delete/' . $d['userID'] . '">
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