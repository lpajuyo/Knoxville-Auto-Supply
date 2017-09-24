<!DOCTYPE html>
<html>
<head>
    <title>Update Client</title>
</head>
<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/updateClient/'.$clientID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div>
    <label for="cname">Client Name:</label>
    <input type="text" name="cname" id="cname" value="<?php echo $cname?>" />
    </div>
    
    <div>
    <label for="caddress">Client Address:</label>
    <input type="text" name="caddress" id="caddress" value="<?php echo $caddress?>" />
    </div>
    
    <div>
    <label for="cnum">Contact Number:</label>
    <input type="text" name="cnum" id="cnum"value="<?php echo $cnum?>" />
    </div>
    
    <input type="submit" value="Submit" />
  </form>
</body>
</html>