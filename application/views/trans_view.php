<!DOCTYPE html>

<div class="margin left">
	<p class="font">Client name: <?php echo $cname?></p><br />
	<p class="font">Address: <?php echo $cadd?></p><br />
	<p class="font">Contact no.: <?php echo $cnum?></p><br />
	<p><a href="<?php echo base_url('knoxville/addDeliverySched/'.$orderID.'') ?>" ><b> >>Schedule items for delivery</b></a></p>
</div>


<div id="table" class="margin">
	<div class="table-responsive ">
    <table class="table table-striped">
        <thead>
            <tr id="trHead">
                <th class="info">Item Name</th>
				<th class="info">Price</th>
				<th class="info">Quantity</th>
                <th class="info">Date</th>
                <th class="info">Status</th>
                <th class="info">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			 
                foreach($trans as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>";
					foreach($items as $i)
					{
						if ($t['itemID'] == $i['itemID'])
						echo $i['item_desc'];
					}	
					echo '</td><td>'.$t['unit_price'].'</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['status'].'</td><td><a href="'.base_url('knoxville/updateTransaction/'.$t['transID']).'">Edit</a> | <a href="'.base_url('knoxville/delTransaction/'.$t['transID']).'/'.$orderID.'">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
					}
            ?>

			
			
        </tbody>
    </table>
	
	<a href="<?php echo base_url('knoxville/addPurchase/'.$orderID.'') ?>" >
    <button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Purchase items</button></a>	
	<a href="<?php echo base_url('knoxville/addRefund/'.$orderID.'') ?>" >
	<button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Cancel/Return Orders</button></a>
</div>
</div>
</body>
</html>