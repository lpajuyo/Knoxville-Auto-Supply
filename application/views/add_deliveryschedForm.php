<div class="tab-content">
	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addDeliverySched','id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	<div>&nbsp;</div>
	<h2 class="text-center">SCHEDULE FOR DELIVERY</h2>
	<div class="container ClientForm"> 
	
	<div>
		<label class="control-label col-sm-4" for="assigned"><!--Assigned personnel-->Ass.Personnel &nbsp; </label>
	<div class="form-control col-sm-4" id="userID">
		<?php
		echo '<select name="delivererID" form="order">';
			echo '<option selected disabled hidden>Name</option>';
			foreach($deliverer as $c){
				echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
			}
		echo '</select>';
		?>
	</div>
	
	<div>
		<label class="control-label col-sm-4" for="date">Date:</label>
 		<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />	
	</div>
	<div>		
 		<label class="control-label col-sm-4" for="date">Time:</label>		
		<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
    </div>
						
	<div class="table-responsive table">
    <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th>
						<label for="quantiry">Quantity</label></th>
						<th>
						<label for="itemList[]">ADD</th>
					</tr></thead>
					
        <tbody>
            <?php
				$counter = 0;
                foreach($Prec as $P){
					$y = 0;
				foreach($trans as $c)
					{
						if (($P['itemID'] == $c['itemID'] && $c['status'] == "Returned") || ($P['itemID'] == $c['itemID'] && $c['status'] == "Cancelled") )
						$y++;
					}	
					if($y==0){
						$counter++;
						echo '<tr><td>';
						foreach($items as $i)
						{
							if ($P['itemID'] == $i['itemID'])
							echo $i['item_desc'];
						}	
						echo '</td>
							<td class="col-sm-2">							
								<input type="quantity" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$P['quantity'].'" readonly="true"/>
							</td>
							
							<td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$P['itemID'].'"  checked/></td>
							
							
							';
					}	
						
                }
            ?>
			
    </tbody>
	
   </table>
	</form>
	</div>
	<button class="sub" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Refund
	</button>
	
	
	
	
	
	
	</div>
	</div>

</body>
</html>
