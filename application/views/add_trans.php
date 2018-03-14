<html>
<body>
	<div class="cntr">
	<p class="boxhead"> Add Transaction </p> <br />
	
	<?php echo form_open('knoxville/addPurchase/'.$orderID.'','id="purchase"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	<div class="form-group">
		<label class="date-label" for="date">Date(dd/mm/yyyy):&nbsp; </label>
 		<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />		 
 		<label class="date-label" for="date">Time: &nbsp;</label>		
		<input type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
		
    </div>
	Search: <input type="text" id="myInput" onkeyup="Transaction()" placeholder="Type any value" title="Type ANY value">
	<div class="table-responsive table">
	<table class="table" id="myTable">
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
                foreach($Qrec as $Q){
					$y = 0;
				foreach($trans as $c)
					{
						if ($Q['itemID'] == $c['itemID'] && $c['status'] == "Purchased")
						$y++;
					}	
					if($y==0){
						$counter++;
						echo '<tr><td>';
						foreach($items as $i)
						{
							if ($c['itemID'] == $i['itemID'])
							echo $i['item_desc'];
						}	
						echo '</td>
							<td class="col-sm-2">

								<input type="price" class="form-control" id="price'.$counter.'" value="'.$c['unit_price'].'" name="price[]">
							</td>
							<td class="col-sm-2">							
								<input type="quantity" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$c['quantity'].'">
							</td>
							
							<td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$c['itemID'].'" onClick="toggle2('."'items".$counter."'".', '."'price".$counter."'".', '."'quantity".$counter."'".')"  checked/></td>
							
							
							';
					}	
						
                }
				foreach($items as $i){
				$counter++;
				$x=0;
					foreach($trans as $c)
					{
						if ($c['itemID'] == $i['itemID'])
						$x++;
					}	
					if($x==0){
					echo '<tr><td>'.$i['item_desc'].'</td>
						<td class="col-sm-2">

							<input type="price" class="form-control" id="price'.$counter.'" value="0" name="price[]" disabled />
						</td>
						<td class="col-sm-2">							
							<input type="quantity" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="0" disabled />
						</td>
						
						<td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$i['itemID'].'" onClick="toggle2('."'items".$counter."'".', '."'price".$counter."'".', '."'quantity".$counter."'".')"/></td>
						
						
						';
						}
						
                }
            ?>
			
    </tbody>
	
   </table>

	<button class="btn btn-primary btn-md sround" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Add Purchase
	</button>
	
	</form>
	
	
	
	</div>
</body>
</html>
