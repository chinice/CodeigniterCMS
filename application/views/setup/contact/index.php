<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-7">
                    <div class="card-box table-responsive">
                        <h4 class="header-title m-t-0 m-b-30">Contact Details</h4>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td><? echo ($contact->getEmail()) ? $contact->getEmail() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Phone</strong></td>
                                    <td><? echo ($contact->getPhone()) ? $contact->getPhone() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Address</strong></td>
                                    <td><? echo ($contact->getAddress()) ? $contact->getAddress() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Contact Person</strong></td>
                                    <td><? echo ($contact->getContactperson()) ? $contact->getContactperson() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Website</strong></td>
                                    <td><? echo ($contact->getWebsite()) ? $contact->getWebsite() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Facebook URL</strong></td>
                                    <td><? echo ($contact->getFacebook()) ? $contact->getFacebook() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Twitter URL</strong></td>
                                    <td><? echo ($contact->getTwitter()) ? $contact->getTwitter() : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td><strong>LinkedIn URL</strong></td>
                                    <td><? echo ($contact->getLinkedin()) ? $contact->getLinkedin() : 'N/A' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Add Contact Details</h4>
                        <form id="contactForm" role="form" method="post" action="<? echo BASEURL ?>setup/add_contact">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address <span style="color: red;">*</span></label>
                                <textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Website <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Facebook URL</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook URL">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Twitter URL</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter URL">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">LinkedIn URL</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn URL">
                            </div>

                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            <button type="button" class="btn btn-default waves-effect reset waves-light">Cancel</button>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->

    <footer class="footer">
        <?php echo date('Y'); ?> © Adminto.
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->