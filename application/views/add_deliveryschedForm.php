<html>
<body>
	<div class="cntr">
	<p class="boxhead"> Schedule for Delivery </p> <br />
	<?php echo validation_errors(); ?>
	<?php echo form_open('knoxville/addDeliverySched','id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	 
	<div class="form-group">
		<label class="assigned-label" for="assigned">Assigned Personnel &nbsp; </label>
	<?php
	echo '<select name="delivererID" form="order">';
		echo '<option selected disabled hidden>Name</option>';
		foreach($deliverer as $c){
			echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
		}
	echo '</select>';
	?>
	</div>
	
	<div class="form-group">
		<label class="date-label" for="date">Date(dd/mm/yyyy):&nbsp; </label>
 		<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />		 
 		<label class="date-label" for="date">Time: &nbsp;</label>		
		<input type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
		
    </div>
	
	<div class="form-group">
							
		<br />					
	<table class="table">
                <thead>
                    <tr id="trHead">
						<th class="info">Item Description</th>
						<th class="info">
						<label for="quantiry">Quantity</label></th>
						<th class="info">
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

	<button class="btn btn-primary btn-md" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Refund
	</button>
	
	</form>
	
	
	
	</div>
</body>
</html>
