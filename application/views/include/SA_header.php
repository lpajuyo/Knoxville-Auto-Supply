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
<div class="container">
<a class="headKnox" href="<?php echo base_url("knoxville")?>"><h2 class="text-center heads tex">KNOXVILLE AUTO SUPPLY</h2></a>
<a href="<?php echo base_url('logout');?>" style="float:right;" class="logout"><span class="glyphicon glyphicon-log-out ">LOGOUT</a><br/><br/>
    <div class="tabbable">
        <div class="row">
            <ul class="nav nav-tabs">
               <ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('SalesAgent/viewSalesAgent')?>" class="navigation">SALES AGENT<p>Manage client</p></a></li>
					<li><a href="<?php echo base_url('SalesAgent/viewClients')?>" class="navigation">CLIENT MANAGEMENT<p>Manage client</p></a></li>
					<li><a href="<?php echo base_url('SalesAgent/viewOrders')?>" class="navigation">SALES MANAGEMENT<p>Manage sales management</p></a></li>
					<li><a href="<?php echo base_url('SalesAgent/viewItems')?>" class="navigation">INVENTORY MANAGEMENT<p>Manage inventory</p></a></li>
					<li><a href="<?php echo base_url('SalesAgent/viewDeliverer')?>" class="navigation">DELIVERER MANAGEMENT<p>Manage delivery</p></a></li>
					
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





  