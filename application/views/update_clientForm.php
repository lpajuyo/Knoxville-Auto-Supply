<!DOCTYPE html>

<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/updateClient/'.$clientID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?>
    <div class="ClientForm">
	  <div class="form-group">
		<label class="control-label" for="cname">Client Name:</label>
		<input class="form-control" type="text" name="cname" id="cname" value="<?php echo $cname?>" />
	  </div>
    
	  <div class="form-group">
		<label class="control-label" for="caddress">Client Address:</label>
		<input class="form-control" type="text" name="caddress" id="caddress" value="<?php echo $caddress?>" />
	  </div>
    
      <div class="form-group">
		<label class="control-label" for="cnum">Contact Number:</label>
		<input class="form-control" type="text" name="cnum" id="cnum"value="<?php echo $cnum?>" />
      </div>
    
    <input id="buttonSubmit" class="btn btn-primary" type="submit" value="Submit" />
  </form>
  </div>
</body>
</html>