<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
<script src="<?php echo $base_url; ?>/js/jquery.min.js"></script>
<script src="<?php echo $base_url; ?>/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?php echo $base_url; ?>/js/angular.min.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?php echo $base_url; ?>/css/morris.css">
<script src="<?php echo $base_url; ?>/js/raphael-min.js"></script>
<script src="<?php echo $base_url; ?>/js/morris.min.js"></script>

<link rel="stylesheet" href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/toastr.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/css.css">
<script src="<?php echo $base_url; ?>/js/toastr.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89792612-1', 'auto');
  ga('send', 'pageview');

</script>

<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 


<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
	}
	
</style>




	<title><?php echo $title; ?></title>
</head>

<body>
<nav class="navbar navbar-default" role="navigation" style="color:#fff;background-image: linear-gradient(to bottom,#f0ad4e 0,#f0ad4e 100%);">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $base_url; ?>/" style="color: #000;"><b>C2M</b></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			
			
			<ul class="nav navbar-nav navbar-right">


			

<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #000;">
เข้าสู่ระบบ
					 <b class="caret"></b></a>
					<ul class="dropdown-menu">
<li><a href="<?php echo $base_url; ?>/login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>	พนักงาน </a></li>
						<li> <a href="<?php echo $base_url; ?>/storemanager/login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> ผู้จัดการร้าน</a></li>
						
					</ul>
				</li>




				
				
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
