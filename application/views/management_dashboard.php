<!DOCTYPE html>

<html>
<head>
	<title>Management Dashboard</title>
</head>
<body>
	<h1>Hi <?php echo $userID; ?>!</h1>
    <a href="<?php echo base_url('knoxville/viewClients')?>">Client Management</a>
	<a href="<?php echo base_url('knoxville/addOrder')?>">Sales Management</a>
</body>
</html>