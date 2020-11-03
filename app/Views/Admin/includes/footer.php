</div>
<!-- Dynamic Content END -->
</div>
<!-- Content Wrapper END -->
</div>
<!-- Main Wrapper END -->

<!-- jQuery -->
<script src="<?php echo APPURL; ?>/public/js/libs/jquery-3.4.1.min.js"></script>
<script src="<?php echo APPURL; ?>/public/js/libs/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo APPURL; ?>/public/js/libs/bootstrap.min.js"></script>
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Custom JS Scripts-ajax -->
<script src="<?php echo JS_PATH; ?>/ajax/save.js"></script>
<script src="<?php echo JS_PATH; ?>/ajax/delete.js"></script>

<!-- Sidebar Toggle -->
<script>
    $('#mainSidebarBtn').click(function() {
        $('#sidebar, #contentWrapper').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
</script>

</body>

</html>