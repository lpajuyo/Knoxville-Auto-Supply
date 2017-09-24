<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
</head>
<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
    <div>
    <label for="cname">Client Name:</label>
    <input type="text" name="cname" id="cname" />
    </div>
    
    <div>
    <label for="caddress">Client Address:</label>
    <input type="text" name="caddress" id="caddress" />
    </div>
    
    <div>
    <label for="cnum">Contact Number:</label>
    <input type="text" name="cnum" id="cnum" />
    </div>
    
    <input type="submit" value="Submit" />
  </form>
</body>
</html>