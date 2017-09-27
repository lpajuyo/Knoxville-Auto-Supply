<!DOCTYPE html>

  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addItem'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <h2 class="heading text-center">ADD ITEM</h2>
  <div class=" container ClientForm">
 
    <div>
    <label class="control-label" for="idesc">Item Description:</label>
    <input class="form-control"type="text" name="idesc" id="idesc" />
    </div>
    
    <div>
    <label class="control-label" for="stocks">Stocks:</label>
    <input class="form-control"type="text" name="stocks" id="stocks" />
    </div>
    
	<div class="submarg col-sm-4">
    <input id="buttonSubmit" class="btn btn-primary" type="submit" value="Submit" />
	</div>
  </form>
  </div>
</body>
</html>