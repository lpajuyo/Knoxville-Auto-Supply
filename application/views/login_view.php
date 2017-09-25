<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width; initial-scale=1.0"/>
	<link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/MyCSS.css'); ?>" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open(''); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/">
                                     //to add attributes, edit to: echo form('','class="lala" id="lala"'); 
  ?>
  <div id="imageCar"><img class="img-responsive" src="assets/img/car1.jpg"></div>
    <div id="h1Head">
        <h1>KNOXVILLE </h1>
        <p class="textL">AUTO SUPPLY</p>
    </div>
    <div id="login">
        <div class="login-card">
            <form class="form-signin">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input class="form-control" type="text" name="username" id="user" placeholder="Username" />
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input class="form-control" type="password" name="password" id="pass" placeholder="Password" />
				</div>
			</div>
			<input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="Login" />
			</form>
		</div>
	</div>
</body>
</html>