<!DOCTYPE html>
<div class="tab-content">
  <?php echo validation_errors(); ?>
  
  <?php echo form_open('SalesAgent/updateItem/'.$itemID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
  ?> 
  <div>&nbsp;</div>
  <h2 class="text-center">UPDATE ITEM</h2>
  <div class="container ClientForm">
 
    <div>
		<label class="control-label col-sm-4" for="idesc">Item Desc.:</label>
		<input class="form-control col-sm-4" type="text" name="idesc" id="idesc" value="<?php echo $idesc?>" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="stocks">Stocks:</label>
		<input class="form-control col-sm-4" type="text" name="stocks" id="stocks" value="<?php echo $stocks?>" />
    </div>
    
	<div class="col-sm-6">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </form>
  </div>
 </div>
</body>
</html>