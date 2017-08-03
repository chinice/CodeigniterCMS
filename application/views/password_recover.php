<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="<?php echo IMAGE_URL ?>favicon.png">

    <!-- App title -->
    <title>AED Technologies | <?php echo ($title)? $title : ''; ?></title>

    <!-- App CSS -->
    <link href="<?php echo CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>core.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>pages.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>menu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo JS_URL ?>modernizr.min.js"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-74137680-1', 'auto');
        ga('send', 'pageview');
    </script>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="javascript:;" class="logo">
            <img src="<?php echo IMAGE_URL ?>logo.png" width="220" height="100"/>
        </a>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Reset Password</h4>

            <p class="text-muted m-b-0 font-13 m-t-20">
                Enter your email address and we'll send you an email with instructions to reset your password.
            </p>
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" method="post" action="">

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required="" placeholder="Enter email">
                    </div>
                </div>

                <div class="form-group text-center m-t-20 m-b-0">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Send Email</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- end card-box -->

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Already have account?<a href="<?php echo BASEURL ?>" class="text-primary m-l-5"><b>Sign In</b></a></p>
        </div>
    </div>

</div>
<!-- end wrapper page -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo JS_URL ?>jquery.min.js"></script>
<script src="<?php echo JS_URL ?>bootstrap.min.js"></script>
<script src="<?php echo JS_URL ?>detect.js"></script>
<script src="<?php echo JS_URL ?>fastclick.js"></script>
<script src="<?php echo JS_URL ?>jquery.slimscroll.js"></script>
<script src="<?php echo JS_URL ?>jquery.blockUI.js"></script>
<script src="<?php echo JS_URL ?>waves.js"></script>
<script src="<?php echo JS_URL ?>wow.min.js"></script>
<script src="<?php echo JS_URL ?>jquery.nicescroll.js"></script>
<script src="<?php echo JS_URL ?>jquery.scrollTo.min.js"></script>

<!-- App js -->
<script src="<?php echo JS_URL ?>jquery.core.js"></script>
<script src="<?php echo JS_URL ?>jquery.app.js"></script>

</body>
</html>