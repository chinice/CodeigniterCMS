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
                                <li><a href="javascript:;" class="addContent">Add New Content</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="header-title m-t-0 m-b-30">All Contents</h4>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?
                            $sn = 1;
                            foreach($contents as $content) {
                                ?>
                                <tr>
                                    <td><? echo $sn; ?>.</td>
                                    <td><? echo $content->getName(); ?></td>
                                    <td><? echo $content->getDescription(); ?></td>
                                    <td><? echo getStatus($content->getStatus()); ?></td>
                                    <td>
                                        <div class="action-bar pull-right">
                                            <ul class="list-inline m-b-0">
                                                <li>
                                                    <a data-value="<? echo base64_encode($content->getId()); ?>" href="javascript:;" title="Edit" class="icon edit circle-icon glyphicon glyphicon-refresh"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($content->getId()); ?>" href="javascript:;" title="Delete" class="icon delete circle-icon red glyphicon glyphicon-remove"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($content->getId()); ?>" href="javascript:;" title="Change Status" class="icon status circle-icon red glyphicon glyphicon-flag"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?
                                $sn++;
                            }
                            ?>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
            <? $this->load->view('setup/content/add-content') ?>
        </div> <!-- container -->
    </div> <!-- content -->
    <footer class="footer">
        <?php echo date('Y'); ?> © Elixir.
    </footer>
</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->