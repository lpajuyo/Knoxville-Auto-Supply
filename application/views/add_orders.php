<div class="tab-content">

	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addOrder','id="order"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	<div>&nbsp;</div>
	<h2 class="text-center">ADD ORDER</h2>
	<div class="container ClientForm">
		<div>
			<label class="control-label col-sm-4" for="company">Company: &nbsp; </label>
		<div class="form-control col-sm-4" id="userID">
		<?php
		echo '<select name="clientid" form="order">';
			echo '<option selected disabled hidden>Company Name</option>';
			foreach($clients as $c){
				echo '<option value="'.$c['clientID'].'">'.$c['client_name'].'</option>';
			}
		echo '</select>';
		?>
		</div>
	</div>
	
	<div>
		<label class="control-label col-sm-4" for="date">Date:</label>
 		<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
	</div>
	<div>
 		<label class="control-label col-sm-4" for="date">Time: &nbsp;</label>		
		<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
	</div>	
    
	
	<div>
	
		<label class="control-label col-sm-4" for="transaction">Transaction: &nbsp;</label>		
		<select class="form-control col-sm-4" name="trans" id="trans">
			<option value="Quoted">Quote</option>
			<option value="Purchased">Purchase</option>
		</select>
	<div>
	</div>					
							
		<label class="control-label col-sm-4" for="duedate">Due Date: </label>
		<input class="form-control col-sm-4" type="date" name="duedate" value="<?php echo date('Y-m-d', strtotime( date('Y-m-d'). ' + 7 days'))?>"/>
		
    </div>
	
	<div class="table-responsive table">
    <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th>
							<label for="price">Price</label>
						</th>
						<th>
							<label for="quantity">Quantity</label>
						</th>
						<th>
						<label for="itemList[]">ADD</th>
					</tr>
				</thead>
					
        <tbody>
            <?php
				$counter = 0;
                if($items != false){
                    foreach($items as $c){  
                    $counter++;
                        echo '<tr><td>'.$c['item_desc'].'</td>
                            <td class="col-sm-2">

                                <input type="number" class="form-control" id="price'.$counter.'"  name="price[]" value="0" disabled />
                            </td>
                            <td class="col-sm-2">							
                                <input type="number" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="0" disabled />
                            </td>
                            
                            <td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$c['itemID'].'" onClick="toggle('."'items".$counter."'".', '."'price".$counter."'".', '."'quantity".$counter."'".')"  /></td>
                            
                            ';
                            
                            
                    }
                }
            ?>
			
    </tbody>
	
   </table>
   </div>
	</form>
	<div class="col-sm-6">
	<button class="sub" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Save
	</button>
	</div>
	</div>
</body>
</html>
