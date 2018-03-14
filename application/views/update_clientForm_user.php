<!DOCTYPE html>
<div class="tab-content">


  <?php echo validation_errors(); ?>
  
  <?php echo form_open('SalesAgent/updateClient/'.$clientID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
  ?>
  <div>&nbsp;</div>
  <h2 class="text-center">UPDATE CLIENT FORM</h2>
  <div class="container ClientForm">
	  <div class="form-group">
		<label class="control-label col-sm-4" for="cname">Client Name:</label>
		<input class="form-control" type="text" name="cname" id="cname" value="<?php echo $cname?>" />
	  </div>
    
	  <div class="form-group">
		<label class="control-label col-sm-4" for="caddress">Client Address:</label>
		<input class="form-control" type="text" name="caddress" id="caddress" value="<?php echo $caddress?>" />
	  </div>
    
      <div class="form-group">
		<label class="control-label col-sm-4" for="cnum">Contact No.:</label>
		<input class="form-control" type="text" name="cnum" id="cnum"value="<?php echo $cnum?>" />
      </div>
    <div class="col-sm-8">
		<input class="subUpdate" type="submit" value="Submit" />
	</div>
	</div>
  </form>
  </div>
  </div>

</body>
</html>