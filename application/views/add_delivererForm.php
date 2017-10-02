<!DOCTYPE html>

  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addDeliverer'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <h2 class="heading text-center">ADD DELIVERER</h2>
  <div class=" container ClientForm">
 
    <div>
    <label class="control-label" for="vehicle">Vehicle:</label>
    <input class="form-control"type="text" name="vehicle" id="vehicle" />
    </div>
    
    <div>
    <label class="control-label" for="cnum">Contact Number:</label>
    <input class="form-control"type="text" name="cnum" id="cnum" />
    </div>
    
    <div class="top col-sm-6 top text-center">
    <label class="control-label" for="assigned">Assigned personnel
	   <input class="form-control"type="text" name="assigned" id="assigned" />
	</div>
	<div class="submarg col-sm-4">
    <input class="form-control sub-btn" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
</body>
</html>