<?php
// Rewriting the data variable array from the viewFunctions
$title = 'NADEMI - Project detail';
require_once VIEWS_PATH . "/User/includes/header.php";
?>

<!-- MAIN Content START -->
<?php
if ($data['projektID']) {
?>
    <div class="pricing-header py-3 pt-md-3 pb-2">
        <h3 class="text-muted"><?php echo $data['projektTitle']; ?></h3>
    </div>
    <div class="row" id="projektDetail">
        <div class="col">
            <div class="card border-0 shadow text-muted">
                <img src="<?php echo APPURL . "/public/uploads/" . $data['projektImage']; ?>" alt="">
                <div class="card-body border-top">
                    <h4 class="card-title mb-4">Project Description</h4>
                    <div class="card-text text-black-50">
                        <p class="text-muted"><?php echo $data['projektDescription']; ?></p>
                        <p class="text-muted mb-0">
                            <strong>Links:</strong>
                            <hr class="mt-0 mb-2">
                            <?php
                            $links = explode(",", $data['projektLinks']);
                            foreach ($links as $link) {
                                echo '<a href="' . $link . '" target="_blank">' . $link . '</a><br>';
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    MessageHelper::showMessage('No Data Available');
}
?>

<div class="row mt-2 my-4">
    <div class="col-xl-4 col-md-4" id="allprojects">
        <button onclick="window.history.back()" type="button" class="btn btn-lg btn-block btn-outline-secondary bg-light" id="allProjects"><i class="fas fa-angle-double-left ml-1"></i> Go Back</button>
    </div>
</div>
<!-- MAIN Content END -->

<?php require_once VIEWS_PATH . "/User/includes/footer.php"; ?>