<html>
<head>
	<title><?php echo $title; ?></title>                                                                           
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width; initial-scale=1.0"/>
	<link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/MyCSS.css'); ?>" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/multiple_selection.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/search.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/select.js'); ?>"></script>
	
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
			KNOXVILLE
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li><a href="<?php echo base_url('login/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<div class="container">

<a class="headKnox" href="<?php echo base_url("knoxville")?>"><h2 class="text-center heads tex">KNOXVILLE AUTO SUPPLY</h2></a>

        <div class="row">
            <ul class="nav nav-tabs">
               <ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('knoxville/viewSalesAgents')?>" class="navigation active">SALES AGENT MANAGEMENT<p>Manage sales agent</p></a></li>
					<li><a href="<?php echo base_url('knoxville/viewClients')?>" class="navigation">CLIENT MANAGEMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>Manage client</p></a></li>
					<li><a href="<?php echo base_url('knoxville/viewOrders')?>" class="navigation">SALES MANAGEMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>Manage sales</p></a></li>
					<li><a href="<?php echo base_url('knoxville/viewItems')?>" class="navigation">INVENTORY MANAGEMENT<p>Manage inventory</p></a></li>
					<li><a href="<?php echo base_url('knoxville/viewDeliverer')?>" class="navigation">DELIVERER MANAGEMENT<p>Manage delivery</p></a></li>
				
				</ul>
            </ul>

<script>
$(document).ready(function(){
  $('ul ul li a').click(function(){
    $('li a').removeClass("active");
    $('li p').removeClass("active");
    $(this).addClass("active");
});
});
</script>





  