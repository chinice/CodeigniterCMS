<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="<?php echo IMAGE_URL ?>favicon.png">

    <title>AED Technologies | <?php echo ($title)? $title : ''; ?></title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo PLUGINS_URL ?>morris/morris.css">

    <!-- Notification css (Toastr) -->
    <link href="<?php echo PLUGINS_URL ?>toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <!-- form Uploads -->
    <link href="<?php echo PLUGINS_URL ?>fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
    !-- Sweet Alert css -->
    <link href="<?php echo PLUGINS_URL ?>bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>core.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>pages.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>menu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_URL ?>responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo PLUGINS_URL ?>datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<? echo WYSIWYG_CSS ?>froala_editor.css">
    <link rel="stylesheet" href="<? echo WYSIWYG_CSS ?>froala_style.css">
    <link rel="stylesheet" href="<? echo WYSIWYG_CSS ?>plugins/code_view.css">
    <link rel="stylesheet" href="<? echo WYSIWYG_CSS ?>plugins/image_manager.css">
    <link rel="stylesheet" href="<? echo WYSIWYG_CSS ?>plugins/image.css">
    <link rel="stylesheet" href="<? echo WYSIWYG_CSS ?>plugins/table.css">
    <link rel="stylesheet" href=".<? echo WYSIWYG_CSS ?>plugins/video.css">

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

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <img src="<?php echo IMAGE_URL ?>logo.png" style="margin-top: 10px;" class="logo" width="150" height="50"/>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h4 class="page-title"><?php echo $page_title ?></h4>
                    </li>
                </ul>

                <!-- Right(Notification and Searchbox -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- Notification -->
                        <div class="notification-box">
                            <ul class="list-inline m-b-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="zmdi zmdi-notifications-none"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>
                    <li class="hidden-xs">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="Search..."
                                   class="form-control">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->