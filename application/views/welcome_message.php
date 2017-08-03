<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="author" content="Elixir Prime House">

	<!-- App Favicon -->
	<link rel="shortcut icon" href="<?php echo IMAGE_URL; ?>favicon.png">

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

	<!-- Notification css (Toastr) -->
	<link href="<?php echo PLUGINS_URL ?>toastr/toastr.min.css" rel="stylesheet" type="text/css" />

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
			<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
			<div id="roller" style="display: none;">
				<img src="<?php echo IMAGE_URL ?>Blocks.gif" width="50" height="40"/>
			</div>
		</div>
		<div class="panel-body">
			<div id="success" style="display: none;" class="alert alert-success">Login Successful</div>
			<form class="form-horizontal m-t-20" id="loginForm" method="post" action="<?php echo BASEURL ?>welcome/login">

				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" type="text" name="username" required="" placeholder="Username">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<input class="form-control" type="password" name="password" required="" placeholder="Password">
					</div>
				</div>

				<div class="form-group ">
					<div class="col-xs-6">
						<div class="checkbox checkbox-custom">
							<input id="checkbox-signup" type="checkbox">
							<label for="checkbox-signup">
								Remember me
							</label>
						</div>
					</div>

				</div>

				<div class="form-group text-center m-t-30">
					<div class="col-xs-12">
						<button id="button" class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
					</div>
				</div>

				<div class="form-group m-t-30 m-b-0">
					<div class="col-sm-6">
						<a href="<?php echo BASEURL ?>welcome/recovery" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
					</div>
				</div>
			</form>

		</div>
	</div>
	<!-- end card-box-->

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
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo PLUGINS_URL ?>parsleyjs/dist/parsley.min.js"></script>
<!-- Toastr js -->
<script src="<?php echo PLUGINS_URL ?>toastr/toastr.min.js"></script>
<!-- App js -->
<script src="<?php echo JS_URL ?>jquery.core.js"></script>
<script src="<?php echo JS_URL ?>jquery.app.js"></script>
<script>
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();

		//submit the department form
		$('#loginForm').submit(function(event){
			event.preventDefault();

			document.getElementById('roller').style.display = "block";
			$('#button').prop('disabled', true);

			$.ajax({
				url: $(this).attr('action'),
				data: $(this).serialize(),
				type: "POST",
				dataType: 'json',
				success: function (e) {
					document.getElementById('roller').style.display = "none";
					$('#button').prop('disabled', false);

					if (!e.status) {
						toastr['error'](e.message, 'Error');
						return;
					}
					document.getElementById('success').style.display = "block";
					window.location.replace(e.redirect);
				},
				error: function(){
					document.getElementById('roller').style.display = "none";
					toastr['error']('An error occurred', 'Error');
					return;
				}
			});
		});

	});
</script>

</body>
</html>