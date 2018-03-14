<!DOCTYPE html>
<div class="tab-content">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/addItem'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <div>&nbsp;</div>
  <h2 class="text-center">ADD ITEM</h2>
  <div class="container ClientForm">
 
    <div>
		<label class="control-label col-sm-4" for="idesc">Item Desc.:</label>
		<input class="form-control col-sm-4" type="text" name="idesc" id="idesc" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="stocks">Stocks:</label>
		<input class="form-control col-sm-4" type="text" name="stocks" id="stocks" />
    </div>
    
	<div class="col-sm-6">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
</body>
</html>