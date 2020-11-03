<?php

require_once VIEWS_PATH . "/Admin/includes/header.php";

echo '<div class="row text-center">';

if ($data) {
    $tableName = "";

    foreach ($data as $d) {
        if ($d['table_name'] == 'projekt') {
            $tableName = 'Projects';
        }
        if ($d['table_name'] == 'category') {
            $tableName = 'Categories';
        }
        if ($d['table_name'] == 'user') {
            $tableName = 'Users';
        }
        if ($d['table_name'] == 'demo') {
            $tableName = 'DEMO';
        }
        echo '<div class="col-md-6 col-lg-4 col-sm-6 mx-0 mb-4">
                <div class="card border-0 shadow bg-info">
                    <div class="card-body text-white pb-5">
                        <h5 class="display-3">' . $d['table_rows'] . '</h5>
                        <h4 class="card-text">' . strtoupper($tableName) . '</h4>
                        <!-- <a href="#" class="btn btn-block btn-light mt-3 stretched-link">See details</a> -->
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<div class="container">
            <div class="col mb-4 text-center alert alert-secondary" role="alert"><i class="fas fa-info-circle fa-2x"></i><br/>No Data<br/> Available</div>
        </div>';
}
echo "</div>";

require_once VIEWS_PATH . "/Admin/includes/footer.php";
