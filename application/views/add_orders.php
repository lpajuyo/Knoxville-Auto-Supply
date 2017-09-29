<html>
<body>
	<div class="cntr">
	<p class="boxhead"> Add Order </p> <br />
	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addOrder','id="order"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	 
	<div class="form-group">
		<label class="company-label" for="company">Company: &nbsp; </label>
	<?php
	echo '<select name="clientid" form="order">';
		echo '<option selected disabled hidden>Company Name</option>';
		foreach($clients as $c){
			echo '<option value="'.$c['clientID'].'">'.$c['client_name'].'</option>';
		}
	echo '</select>';
	?>
	</div>
	
	<div class="form-group">
		<label class="date-label" for="date">Date:&nbsp; </label>
 		<input type="date" name="date" />		 
 		<label class="date-label" for="date">Time: &nbsp;</label>		
		<input type="time" name="time" />
    </div>
	
	<div class="form-group">
		<label class="duedate-label" for="duedate">Due Date: &nbsp; </label>
		<input type="date" name="duedate"/>
    </div>
	
	<table class="table">
                <thead>
                    <tr id="trHead">
						<th class="info">Item Description</th>
						<th class="info">
						<label for="price">Price</label></th>
						<th class="info">
						<label for="price">Quantity</label></th>
						<th class="info">
						<label for="itemList[]">ADD</th>
					</tr></thead>
					
        <tbody>
            <?php
				$counter = 0;
                foreach($items as $c){  
				$counter++;
                    echo '<tr><td>'.$c['item_desc'].'</td>
						<td class="col-sm-2">

							<input type="price" class="form-control" id="price'.$counter.'"  name="price[]" disabled>
						</td>
						<td class="col-sm-2">							
							<input type="quantity" class="form-control" id="quantity'.$counter.'"  name="quantity[]" disabled>
						</td>
						
						<td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$c['itemID'].'" onClick="toggle('."'items".$counter."'".', '."'price".$counter."'".', '."'quantity".$counter."'".')"  /></td>
						
						
						';
						
						
                }
            ?>
			
    </tbody>
	
   </table>

	<button class="btn btn-primary btn-md" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Save
	</button>
	
	</form>
	
	
	
	</div>
</body>
</html>
