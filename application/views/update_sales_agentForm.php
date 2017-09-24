<!DOCTYPE html>
<html>
<head>
    <title>Update Sales Agent</title>
</head>
<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/updateSalesAgent'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div>
    <label for="userID">UserID:</label>
    <input type="text" name="userID" id="userID" value="<?php echo $userID?>" readonly />
    </div>
    
    <div>
    <label for="pass">Password:</label>
    <input type="text" name="pass" id="pass" value="<?php echo $pass?>" />
    </div>
    
    <div>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $name?>" />
    </div>
    
    <div>
    <label for="bday">Birthdate:</label>
    <input type="date" name="bday" id="bday" value="<?php echo $bday?>" />
    </div>
    
    <div>
    <label for="age">Age:</label>
    <input type="text" name="age" id="age" value="<?php echo $age?>" />
    </div>
    
    <div>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $email?>" />
    </div>
    
    <div>
    <label for="cnum">Contact Number:</label>
    <input type="text" name="cnum" id="cnum" value="<?php echo $cnum?>" />
    </div>
    
    <div>
    <label for="isAdmin">Admin?</label>
    <input type="checkbox" name="isAdmin" id="isAdmin" <?php echo $isAdmin?> />
    </div>
    
    <input type="submit" value="Submit" />
  </form>
</body>
</html>