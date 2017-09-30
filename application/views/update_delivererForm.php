<!DOCTYPE html>

<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/updateDeliverer/'.$delivererID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <div class="ClientForm">
    <div>
    <label for="vehicle">Vehicle:</label>
    <input class="form-control"  type="text" name="vehicle" id="vehicle" value="<?php echo $vehicle?>" />
    </div>
    
    <div>
    <label for="cnum">Contact Number:</label>
    <input class="form-control"  type="text" name="cnum" id="cnum" value="<?php echo $cnum?>" />
    </div>
    
    <div class="col-sm-6 text-center top">
    <label for="assigned">Assigned?</label>
    <input class="form-control"  type="checkbox" name="assigned" id="assigned" <?php echo $assigned?> />
    </div>
    <div class="col-sm-4 submarg">
    <input class="form-control sub-btn"type="submit" value="Submit" />
  </form>
 </div>
</body>
