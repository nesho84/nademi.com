<?php require_once VIEWS_PATH . "/User/includes/header.php"; ?>

<!-- MAIN Content START -->
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <div class="row align-items-center">
        <div class="col-xl-4 col-md-4">
            <img src="<?php echo APPURL; ?>/public/img/profile160px.png" class="profile_img" alt="Personal Photo">
        </div>
        <div class="col-xl-8 col-md-8 hi_name">
            <h1 class="display-4 mt-3">Hi, I'm Neshat Ademi</h1>
        </div>
    </div>
    <!-- Social buttons -->
    <div class="socialButtons">
        <a href="https://www.instagram.com/nesho84/" title=""><img src="<?php echo APPURL; ?>/public/img/instag.png" width="48px" alt=""></a>
        <a href="https://twitter.com/Ademi_Neshat" title=""><img src="<?php echo APPURL; ?>/public/img/twitter.png" width="48px" alt=""></a>
        <a href="https://www.facebook.com/ademi.neshat" title=""><img src="<?php echo APPURL; ?>/public/img/facebook.png" width="48px" alt=""></a>
        <a href="https://www.linkedin.com/in/neshat-ademi-a02a5416b/" title=""><img src="<?php echo APPURL; ?>/public/img/linkedin.png" width="48px" alt=""></a>
        <a href="https://github.com/nesho84" title=""><img src="<?php echo APPURL; ?>/public/img/github.png" width="48px" alt=""></a>
        <a href="https://www.xing.com/profile/Neshat_Ademi" title=""><img src="<?php echo APPURL; ?>/public/img/xing.png" width="48px" alt=""></a>
    </div>
    <hr class="border-top mt-3">
    <h4 class="text-secondary mt-4">
        Most recent Projects<br>
        <i class="fas fa-chevron-down text-secondary align-middle"></i>
    </h4>
</div>
<!-- Loop through $data comming from the Model -->
<div class="row">
    <?php
    if ($data) {
        foreach ($data as $project) {
    ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow text-muted">
                    <img src="<?php echo APPURL . '/public/uploads' . '/' . $project['projektImage']; ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center border-top card-details">
                        <h5 class="card-title mb-0"><?php echo $project['projektTitle']; ?></h5>
                        <div class="card-text text-black-50"><?php echo date("d/m/Y", strtotime($project['projektCompletionDate'])); ?></div>
                        <div class="card-text text-black-50"><?php echo $project['categoryName']; ?></div>
                        <a href="<?php echo APPURL . "/projects/detail/" . $project['projektID']; ?>" class="stretched-link btn btn-block btn-light mt-3" id="project-detail">VIEW DETAILS</a>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo '<div class="container">
                <div class="col mb-4 text-center alert alert-secondary" role="alert"><i class="fas fa-info-circle fa-2x"></i><br/>No Data<br/> Available</div>
            </div>';
    }
    ?>
</div>
<div class="row all-projectsBtn">
    <div class="col-xl-3 col-md-3"></div>
    <div class="col-xl-6 col-md-6" id="allprojects">
        <a href="<?php echo APPURL; ?>/projects" type="button" class="btn btn-lg btn-block btn-info" id="allProjects">ALL PROJECTS <i class="fas fa-angle-double-right ml-1"></i></a>
    </div>
    <div class="col-xl-3 col-md-3"></div>
</div>
<!-- MAIN Content END -->

<?php require_once VIEWS_PATH . "/User/includes/footer.php"; ?>