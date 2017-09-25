<!DOCTYPE html>

  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addSalesAgent'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <h2 class="heading text-center">ADD SALES AGENT</h2>
  <div class=" container ClientForm">
 
    <div>
    <label class="control-label" for="userID">UserID:</label>
    <input class="form-control"type="text" name="userID" id="userID" />
    </div>
    
    <div>
    <label class="control-label" for="pass">Password:</label>
    <input class="form-control"type="text" name="pass" id="pass" />
    </div>
    
    <div>
    <label class="control-label" for="name">Name:</label>
    <input class="form-control"type="text" name="name" id="name" />
    </div>
    
    <div>
    <label class="control-label" for="bday">Birthdate:</label>
    <input class="form-control"type="date" name="bday" id="bday" />
    </div>
    
    <div>
    <label class="control-label" for="age">Age:</label>
    <input class="form-control"type="text" name="age" id="age" />
    </div>
    
    <div>
    <label class="control-label" for="email">Email:</label>
    <input class="form-control"type="email" name="email" id="email" />
    </div>
    
    <div>
    <label class="control-label" for="cnum">Contact Number:</label>
    <input class="form-control"type="text" name="cnum" id="cnum" />
    </div>
    
    <div class="top col-sm-6 top text-center">
    <label class="control-label" for="isAdmin">Admin?<input class="form-control" type="checkbox" name="isAdmin" id="isAdmin" /></label>
	</div>
	<div class="submarg col-sm-4">
    <input class="form-control sub-btn" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
</body>
</html>