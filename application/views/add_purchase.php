<div class="tab-content">

	<?php echo form_open('knoxville/addPurchase/'.$orderID.'','id="purchase"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	<div>&nbsp;</div>
	<h2 class="text-center">PURCHASE</h2>
	<div class="container ClientForm">
	<div class="form-group">
		<label class="control-label col-sm-4" for="date">Date:&nbsp; </label>
 		<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />		 
 		<label class="control-label col-sm-4" for="date">Time: &nbsp;</label>		
		<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
    </div>

	<div>Search: <input type="text" id="myInput" onkeyup="Trans()" placeholder="Type any value" title="Type ANY value"></div>
	<table class="table" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th class="thHead">
						<label for="price">Price</label></th>
						<th class="thHead">
						<label for="quantity">Quantity</label></th>
						<th class="thHead">
						<label for="itemList[]">ADD</th>
					</tr></thead>
					
        <tbody>
            <?php
				$counter = 0;
				if($Qrec != NULL)
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
							if ($Q['itemID'] == $i['itemID'])
							echo $i['item_desc'];
						}	
						echo '</td>
							<td class="col-sm-4">

								<input type="number" class="form-control" id="price'.$counter.'" value="'.$Q['unit_price'].'" name="price[]">
							</td>
							<td class="col-sm-4">							
								<input type="number" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$Q['quantity'].'">
							</td>
							
							<td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$Q['itemID'].'" onClick="toggle2('."'items".$counter."'".', '."'price".$counter."'".', '."'quantity".$counter."'".')"  checked/></td>
							
							
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

	<button class="subUpdate" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Add Purchase
	</button>
	
	</form>
	
	
	
	</div>
</body>
</html>
