<!DOCTYPE html>
<div class="tab-content">
 <?php echo validation_errors(); ?>
  

  <?php echo form_open('SalesAgent/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  
  <div>&nbsp;</div>
  <h2 class="text-center">ADD CLIENT</h2>
  <div class="container Client">
 
    <div>
		<label class="control-label col-sm-4" for="cname">Client Name:</label>
		<?php echo form_error('cname', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control col-sm-4" type="text" name="cname" value="<?php echo set_value('cname'); ?>" id="cname" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="cnum">Contact Number:</label>
		<?php echo form_error('cnum', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control col-sm-4" type="text" name="cnum" value="<?php echo set_value('cnum'); ?>" id="cnum" />
    </div>
     <div>
		<label class="control-label col-sm-4" for="cnum">Address:</label>
		<?php echo form_error('caddress', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control col-sm-6" type="text" name="caddress" value="<?php echo set_value('caddress'); ?>" id="caddress" />
     </div>
	
	<div class="col-sm-6">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
  </div>
 
  

