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
                                <li><a href="javascript:;" class="addAbout">Add About Us</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="header-title m-t-0 m-b-30">About us</h4>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Content</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? $sn = 1;
                            foreach($abouts as $about) {
                                ?>
                                <tr>
                                    <td><? echo $sn.'.'; ?></td>
                                    <td><? echo $about->getContentId(); ?></td>
                                    <td><? echo $about->getTitle(); ?></td>
                                    <td><? echo substr($about->getDescription(), 0, 50).'..'; ?></td>
                                    <td><? echo getStatus($about->getStatus()); ?></td>
                                    <td>
                                        <div class="action-bar pull-right">
                                            <ul class="list-inline m-b-0">
                                                <li>
                                                    <a title="Edit" data-value="<? echo base64_encode($about->getId()); ?>" href="javascript:;" class="icon edit circle-icon glyphicon glyphicon-refresh"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($about->getId()); ?>" href="javascript:;" title="Delete" class="icon delete circle-icon red glyphicon glyphicon-remove"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($about->getId()); ?>" href="javascript:;" title="Change Status" class="icon status circle-icon
                                                         <? echo ($about->getStatus() == 1) ? 'red' : 'yellow' ?> glyphicon glyphicon-flag"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?
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
        <? $this->load->view('about/add-about') ?>
    </div> <!-- content -->

    <footer class="footer">
        <?php echo date('Y'); ?> © Elixir.
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->