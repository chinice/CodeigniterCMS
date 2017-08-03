<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="zmdi zmdi-close-circle-o"></i>
    </a>
    <h4 class="">Notifications</h4>
    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list">
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="<?php echo IMAGE_URL ?>users/avatar-2.jpg" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">Michael Zenaty</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">2 hours ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-info">
                        <i class="zmdi zmdi-account"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">New Signup</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">5 hours ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-pink">
                        <i class="zmdi zmdi-comment"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">New Message received</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">1 day ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="assets/images/users/avatar-3.jpg" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">James Anderson</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">2 days ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="icon bg-warning">
                        <i class="zmdi zmdi-settings"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">Settings</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">1 day ago</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- /Right-bar -->

</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo JS_URL ?>jquery.min.js"></script>
<script src="<?php echo JS_URL ?>bootstrap.min.js"></script>
<script src="<?php echo JS_URL ?>detect.js"></script>
<script src="<?php echo JS_URL ?>fastclick.js"></script>
<script src="<?php echo JS_URL ?>jquery.blockUI.js"></script>
<script src="<?php echo JS_URL ?>waves.js"></script>
<script src="<?php echo JS_URL ?>jquery.nicescroll.js"></script>
<script src="<?php echo JS_URL ?>jquery.slimscroll.js"></script>
<script src="<?php echo JS_URL ?>jquery.scrollTo.min.js"></script>

<script src="<?php echo PLUGINS_URL ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS_URL ?>datatables/dataTables.bootstrap.js"></script>
<!-- Datatable init js -->
<script src="<?php echo PAGES_URL ?>datatables.init.js"></script>
<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="<?php echo PLUGINS_URL ?>jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="<?php echo PLUGINS_URL ?>jquery-knob/jquery.knob.js"></script>
<!-- Toastr js -->
<script src="<?php echo PLUGINS_URL ?>toastr/toastr.min.js"></script>
<script src="<?php echo PLUGINS_URL ?>custombox/dist/custombox.min.js"></script>
<!-- file uploads js -->
<script src="<?php echo PLUGINS_URL ?>fileuploads/js/dropify.min.js"></script>
<!-- Sweet Alert js -->
<script src="<?php echo PLUGINS_URL ?>bootstrap-sweetalert/sweet-alert.min.js"></script>
<script src="<?php echo PAGES_URL ?>jquery.sweet-alert.init.js"></script>
<!--Morris Chart-->
<script src="<?php echo PLUGINS_URL ?>morris/morris.min.js"></script>
<script src="<?php echo PLUGINS_URL ?>raphael/raphael-min.js"></script>
<!-- Dashboard init -->
<script src="<?php echo PAGES_URL ?>jquery.dashboard.js"></script>

<!-- App js -->
<script src="<?php echo JS_URL ?>jquery.core.js"></script>
<script src="<?php echo JS_URL ?>jquery.app.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>

</body>

</html>