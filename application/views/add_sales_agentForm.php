<!DOCTYPE html>
<div class="tab-content">
  
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addSalesAgent'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <div>&nbsp;</div>
  <h2 class="text-center">ADD SALES AGENT</h2>
  <div class="container ClientForm">
 
    <div>
		<label class="control-label col-sm-4" for="userID">UserID:</label>
		<input class="form-control col-sm-4" type="text" name="userID" id="userID" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="pass">Password:</label>
		<input class="form-control col-sm-4" type="password" name="pass" id="pass" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="name">Name:</label>
		<input class="form-control col-sm-4" type="text" name="name" id="name" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="bday">Birthdate:</label>
		<input class="form-control col-sm-4" type="date" name="bday" id="bday" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="email">Email:</label>
		<input class="form-control col-sm-4" type="email" name="email" id="email" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="cnum">Contact Number:</label>
		<input class="form-control col-sm-4" type="text" name="cnum" id="cnum" />
    </div>
    
    <div class="col-sm-4">
		<label for="isAdmin">Admin?</label>
		<input class="check" type="checkbox" name="isAdmin" id="isAdmin" />
	</div>
	<div class="col-sm-6">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
  </div>
