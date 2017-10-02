<!DOCTYPE html>

  <?php echo validation_errors(); ?>
  
  <?php echo form_open('knoxville/updateTransaction/'.$transID); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
  ?> 
  <h2 class="heading text-center">UPDATE TRANSACTION</h2>
  <div class=" container ClientForm">
  
    <div>
	<p class="font">Item Name: <?php echo $item_desc?></p><br />
    </div>
 
    <div>
    <label class="control-label" for="price">Price:</label>
    <input class="form-control"type="text" name="price" id="price" value="<?php echo $price?>" />
    </div>
    
    <div>
    <label class="control-label" for="qty">Quantity:</label>
    <input class="form-control"type="text" name="qty" id="qty" value="<?php echo $qty?>" />
    </div>
    
	<div class="submarg col-sm-4">
    <input id="buttonSubmit" class="btn btn-primary" type="submit" value="Submit" />
	</div>
  </form>
  </div>
</body>
</html>