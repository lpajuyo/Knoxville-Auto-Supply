<html>
<head>
	<title>Order Form</title>
</head>
<body>
	<h1>Add New Orders</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addOrder','id="order"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	
	<?php echo '<select name="clientid" form="order">';
	echo '<option selected disabled hidden>Company Name</option>';
	foreach($clients as $c){
   echo '<option value="'.$c['clientID'].'">'.$c['client_name'].'</option>';
	}
	
	echo '</select>';
	?>
	
	
	<br>
	<p> Date and Time: <input type="date" name="date" /><input type="time" name="time" /></p>
	<p> Due date: <input type="date" name="duedate"/> </p>
	<input type="submit" value="submit">
	</form>
</body>
</html>