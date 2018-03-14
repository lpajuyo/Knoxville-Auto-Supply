<div class="tab-content">
	
	<?php echo form_open('knoxville/addRefund/'.$orderID.'','id="refund"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
                                     //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
	?>
	<br />
	<div class="container ClientForm">
	<div class="form-group">
		<label class="control-label col-sm-4" for="date">Date:&nbsp; </label>
 		<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />		 
 		<label class="control-label col-sm-4" for="date">Time: &nbsp;</label>		
		<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
    </div>
	<table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>Item Description</th>
						<th class="thHead">
						<label for="price">Price</label></th>
						<th class="thHead">
						<label for="quantity">Quantity</label></th>
						<th class="thHead">
						<label for="trans">Cancel/Return</label></th>
						<th class="thHead">
						<label for="itemList[]">ADD</th>
					</tr></thead>
					
        <tbody>
            <?php
				$counter = 0;
                if($Prec != false){
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

                                    <input type="price" class="form-control" id="price'.$counter.'" value="'.$P['unit_price'].'" name="price[]" readonly="true"/>
                                </td>
                                <td class="col-sm-2">							
                                    <input type="quantity" class="form-control" id="quantity'.$counter.'"  name="quantity[]" value="'.$P['quantity'].'" />
                                </td>
                                <td>
                                <select name="trans[]" id="trans'.$counter.'">
                                <option value="Cancelled">Cancelled</option>
                                <option value="Returned">Returned</option></select>
                                </td>
                                
                                <td><input type="checkbox" name="itemList[]" id="items'.$counter.'" value="'.$P['itemID'].'" onClick="toggle2('."'items".$counter."'".', '."'trans".$counter."'".', '."'quantity".$counter."'".')"  checked/></td>
                                
                                
                                ';
                        }	
                            
                    }
                }
            ?>
			
    </tbody>
	
   </table>

	<button class="subUpdate sround" type="submit">
		<span class="glyphicon glyphicon-download-alt"> </span> Refund
	</button>
	
	</form>
	
	
	
	</div>
	</div>
</body>
</html>
