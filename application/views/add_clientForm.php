<!DOCTYPE html>
<div class="tab-content">
<div class="active">
  <?php echo form_open('knoxville/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
<div>&nbsp;</div>
  <h2 class="text-center">ADD SALES AGENT</h2>
  <div class="container ClientForm">
    <div>
		<label class="control-label" for="cname">Client Name:</label>
		<?php echo form_error('cname', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control" type="text" name="cname" value="<?php echo set_value('cname'); ?>" id="cname" />
    </div>
    
    <div class="form-group">
		<label class="control-label" for="caddress">Client Address:</label>
		<?php echo form_error('caddress', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control" type="text" name="caddress" value="<?php echo set_value('caddress'); ?>" id="caddress" />
    </div>
    
    <div class="form-group">
		<label class="control-label" for="cnum">Contact Number:</label>
		<?php echo form_error('cnum', '<p class="text-danger">', '</p>'); ?>
		<input class="form-control" type="text" name="cnum" value="<?php echo set_value('cnum'); ?>" id="cnum" />
    </div>
    
    <input id="buttonSubmit" class="btn btn-primary" type="submit" value="Submit" />
  </form>
 </div>
 </div>
 </div>
 
</body>
</html>