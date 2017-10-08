<!DOCTYPE html>
<div class="tab-content">
<div class="margin left">
	<p class="font">Client name: <?php echo $cname?></p><br />
	<p class="font">Address: <?php echo $cadd?></p><br />
	<p class="font">Contact no.: <?php echo $cnum?></p><br />
	<p><a href="<?php echo base_url('knoxville/addDeliverySched/'.$orderID.'') ?>" ><b> >>Schedule items for delivery</b></a></p>
</div>

	<div class="table-responsive table">
    <table class="table table-striped">
        <thead>
            <tr id="trHead">
                <th>Item Name</th>
				<th>Price</th>
				<th>Quantity</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
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
	</div>
	<a href="<?php echo base_url('knoxville/addPurchase/'.$orderID.'') ?>" class="sub">
    <span class="glyphicon glyphicon-plus"> </span>Purchase items</a>	
	
	<a href="<?php echo base_url('knoxville/addRefund/'.$orderID.'') ?>" class="sub">
	<span class="glyphicon glyphicon-plus"> </span>Cancel/Return Orders</a>

</div>
</div>
</body>
</html>