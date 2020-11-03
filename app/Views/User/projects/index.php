<?php
require_once VIEWS_PATH . "/User/includes/header.php";

// Ajax calls path
$actionJS = APPURL . '/projects/filter';
?>

<!-- MAIN Content START -->
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-2 mx-auto text-center">
    <h1 class="display-4 projects-title">Browse Projects</h1>
    <div class="lead text-dark mt-3">
        <i class="fab fa-html5 fa-2x mr-1"></i> <i class="fab fa-css3-alt fa-2x mr-1"></i> <i class="fab fa-js fa-2x mr-1"></i> <i class="fab fa-php fa-2x mr-1"></i> <i class="fas fa-database fa-2x mr-1"></i> <i class="far fa-file-code fa-2x"></i>
    </div>
</div>
<hr class="border-top">
<div id="projFilters" class="mt-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6">
            <form id="userInputForm" method="POST" onsubmit="searchActions('searchInput', '<?php echo $actionJS; ?>', '<?php echo APPURL; ?>'); return false;">
                <div class="form-group">
                    <!-- Search by typing -->
                    <input type="text" id="searchInput" name="searchInput" class="form-control" autocomplete="off" oninput="searchActions('searchInput', '<?php echo $actionJS; ?>', '<?php echo APPURL; ?>')" placeholder="Search Projects">
                </div>
            </form>
        </div>
        <div class="col-xl-4 col-md-6">
            <form id="selectForm" method="POST">
                <div class="form-group">
                    <!-- Search by selectedCategory -->
                    <select id="selectedCategory" name="selectedCategory" class="form-control" onchange="searchActions('selectedCategory', '<?php echo $actionJS; ?>', '<?php echo APPURL; ?>')">
                        <option value='' class='select_hide' disabled selected>Filter by Category</option>
                        <?php
                        foreach ($data['categories'] as $cat) {
                            echo "<option value='$cat[categoryID]'>$cat[categoryName]</option>";
                        }
                        ?>
                    </select>
                </div>
        </div>
        <div class=" col-xl-4 col-md-6">
            <div class="form-group">
                <!-- Search by sortBy -->
                <select id="sortBy" name="sortBy" class="form-control" onchange="searchActions('sortBy', '<?php echo $actionJS; ?>', '<?php echo APPURL; ?>')">
                    <option value="" class="select_hide" disabled selected>Sort by</option>
                    <option value="projektCompletionDate">Date (newest first)</option>
                    <option value="projektTitle">Title A - Z (ascending)</option>
                </select>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="row" id="searchResults">
    <?php
    if ($data['projects']) {
        foreach ($data['projects'] as $project) {
            echo '<div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow text-muted">
                        <img src="' . APPURL . '/public/uploads' . '/' . $project['projektImage'] . '" class="card-img-top" alt="...">
                        <div class="card-body text-center border-top card-details">
                            <h5 class="card-title mb-0">' . $project['projektTitle'] . '</h5>
                            <div class="card-text text-black-50">' . date("d/m/Y", strtotime($project['projektCompletionDate'])) . '</div>
                            <div class="card-text text-black-50">' . $project['categoryName'] . '</div>
                            <a href="' . APPURL . "/projects/detail/" . $project['projektID'] . '" class="stretched-link btn btn-block btn-light mt-3" id="project-detail">VIEW DETAILS</a>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo '<div class="col mb-4">
                <div class="card border-0 shadow text-muted">
                    <div class="card-body text-center border-top">
                        <h5 class="card-title mb-0"></h5>
                        <div class="card-text text-black-50 mt-5"><h2><i class="fas fa-info-circle fa-2x"></i><br/><br/>No Data Available</h2></div>
                    </div>
                </div>
            </div>';
    }
    ?>
</div>

<div class="row my-3">
    <div class="col-xl-3 col-md-3">&nbsp;</div>
</div>
<!-- MAIN Content END -->

<!-- Ajax START -->
<script src="<?php echo APPURL; ?>/public/js/filter.js"></script>
<!-- Ajax END -->

<?php require_once VIEWS_PATH . "/User/includes/footer.php"; ?>