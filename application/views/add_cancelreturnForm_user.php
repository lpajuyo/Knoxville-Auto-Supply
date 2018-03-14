<html>
<body>
	<div class="cntr">
	<p class="boxhead">Refund</p> <br />
	
	<?php echo form_open('SalesAgent/addRefund/'.$orderID.'','id="refund"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/SalesAgent-Auto-Supply/SalesAgent/addClient">
                                     //to add attributes, edit to: echo form('SalesAgent/addClient','class="lala" id="lala"'); 
	?>
	<div class="form-group">
		<label class="date-label" for="date">Date(dd/mm/yyyy):&nbsp; </label>
 		<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />		 
 		<label class="date-label" for="date">Time: &nbsp;</label>		
		<input type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
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
						<label for="trans">Cancel/Return</label></th>
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

								<input type="number" class="form-control" id="price'.$counter.'" value="'.$P['unit_price'].'" name="price[]" />
							</td>
							<td class="col-sm-2">							
								<input type="number" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$P['quantity'].'" />
							</td>
							<td>
							<select name="trans" id="trans'.$counter.'">
							<option value="Cancelled">Cancelled</option>
							<option value="Returned">Returned</option></select>
							</td>
							
							<td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$P['itemID'].'" onClick="toggle2('."'items".$counter."'".', '."'trans".$counter."'".', '."'quantity".$counter."'".')"  checked/></td>
							
							
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
