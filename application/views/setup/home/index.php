<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:;" class="adduser">Add Home Image</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="header-title m-t-0 m-b-30">All Homepage Images</h4>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Avatar</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sn = 1;
                            foreach($homes as $home) {
                                ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $home->getImage(); ?></td>
                                    <td><?php echo $home->getTitle(); ?></td>
                                    <td><?php echo $home->getDescription(); ?></td>
                                    <td><?php echo $home->getStatus(); ?></td>
                                    <td>

                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
        <? $this->load->view('setup/home/add-home') ?>
    </div> <!-- content -->

    <footer class="footer">
        <?php echo date('Y'); ?> © Elixir.
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->