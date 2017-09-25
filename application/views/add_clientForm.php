<!DOCTYPE html>
<html lang="en">
<head>
<link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/mybootstrap.css'); ?>" rel="stylesheet" />

<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>

  <?php echo form_open('knoxville/addClient'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Client</h4>
  </div>
  
  <div class="modal-body">
  <div >
    <div class="form-group">
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
 
</body>
</html>