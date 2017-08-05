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
                                <li><a href="javascript:;" class="addDept">Add New Department</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="header-title m-t-0 m-b-30">All Departments</h4>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?
                            $sn = 1;
                            foreach($departments as $department) {
                                ?>
                                <tr>
                                    <td><? echo $sn; ?>.</td>
                                    <td><? echo $department->getName(); ?></td>
                                    <td><? echo $department->getCode(); ?></td>
                                    <td><? echo getStatus($department->getStatus()); ?></td>
                                    <td>
                                        <div class="action-bar pull-right">
                                            <ul class="list-inline m-b-0">
                                                <li>
                                                    <a data-value="<? echo base64_encode($department->getId()); ?>" href="javascript:;" title="Edit" class="icon edit circle-icon glyphicon glyphicon-refresh"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($department->getId()); ?>" href="javascript:;" title="Delete" class="icon delete circle-icon red glyphicon glyphicon-remove"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($department->getId()); ?>" href="javascript:;" title="Change Status" class="icon status circle-icon red glyphicon glyphicon-flag"></a>
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
            <? $this->load->view('setup/department/add-department') ?>
        </div> <!-- container -->
    </div> <!-- content -->
    <footer class="footer">
        <?php echo date('Y'); ?> © Elixir.
    </footer>
</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->