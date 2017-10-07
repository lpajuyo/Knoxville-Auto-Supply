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
	<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
	
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header"><p class="navbar-brand">Knoxville Auto Supply</p>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('knoxville/viewSalesAgents')?>" class="navigation">Sales Agent Management</a></li>
					<li><a href="<?php echo base_url('knoxville/viewClients')?>" class="navigation">Client Management</a></li>
					<li><a href="<?php echo base_url('knoxville/viewOrders')?>" class="navigation">Sales Management</a></li>
					<li><a href="<?php echo base_url('knoxville/viewItems')?>" class="navigation">Inventory Management</a></li>
					<li><a href="<?php echo base_url('knoxville/viewDeliverer')?>" class="navigation">Deliverer Management</a></li>
				</ul>
				<div id="users">
					<div class="dropdown">
					  Hi Admin!
					  <span class="caret" data-toggle="dropdown"></span>
					  <ul class="dropdown-menu">
						<li><a href="<?php echo base_url('login/logout'); ?>">LOGOUT</a></li>
					  </ul>
					</div>
				</div>
            </div>
        </div>
    </nav>