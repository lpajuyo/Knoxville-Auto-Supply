<!DOCTYPE html>
<div class="tab-content">

  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/updateDeliverer/'.$delivererID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
	<div>&nbsp;</div>
   <h2 class="text-center">UPDATE DELIVERER</h2>
   <div class="container ClientForm">
 
    <div>
    <label class="control-label col-sm-4" for="vehicle">Vehicle:</label>
    <input class="form-control col-sm-4"type="text" name="vehicle" id="vehicle" value="<?php echo $vehicle; ?>" />
    </div>
    
    <div>
    <label class="control-label col-sm-4" for="cnum">Contact Number:</label>
    <input class="form-control col-sm-4"type="text" name="cnum" id="cnum" value="<?php echo $cnum; ?>" />
    </div>
    
    <div class="text-center col-sm-6">
    <label class="control-label" for="assigned">Assigned personnel
	   <input class="form-control"type="text" name="assigned" id="assigned" value="<?php echo $assigned; ?>" />
	</div>
	<div class="col-sm-6">
		<input class="subUpdate sround" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
</body>
</html>