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
                                <li><a href="javascript:;" class="adduser">Add User</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="header-title m-t-0 m-b-30">All Enquiries</h4>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sn = 1;
                            foreach($enquiries as $enquiry) {
                                ?>
                                <tr>
                                    <td><? echo $sn; ?>.</td>
                                    <td><? echo $enquiry->getName(); ?></td>
                                    <td><? echo $enquiry->getEmail(); ?></td>
                                    <td><? echo $enquiry->getSubject(); ?></td>
                                    <td><? echo $enquiry->getMessage(); ?></td>
                                    <td><? echo getEnquiryStatus($enquiry->getStatus()); ?></td>
                                    <td width="15%">
                                        <div class="action-bar pull-right">
                                            <ul class="list-inline m-b-0">
                                                <li>
                                                    <a data-value="<? echo base64_encode($enquiry->getId()); ?>"
                                                       href="javascript:;" title="Reply" class="icon reply circle-icon glyphicon glyphicon-refresh"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($enquiry->getId()); ?>" href="javascript:;" title="Delete" class="icon delete circle-icon red glyphicon glyphicon-remove"></a>
                                                </li>
                                                <li>
                                                    <a data-value="<? echo base64_encode($enquiry->getId()); ?>" href="javascript:;" title="Change Status" class="icon status circle-icon red glyphicon glyphicon-flag"></a>
                                                </li>
                                            </ul>
                                        </div>
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
    </div> <!-- content -->
    <? $this->load->view('enquiry/reply') ?>
    <footer class="footer">
        <?php echo date('Y'); ?> © Adminto.
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->