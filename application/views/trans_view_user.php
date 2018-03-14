<!DOCTYPE html>
<div class="tab-content">
<div class="contentNested">
	<div class="sales">
		<p class="font"><b>Client name:</b></p> <p class="text1"><?php echo $cname?></p>
	

		<p class="font"><b>Address:</b></p> <p class="text1"> <?php echo $cadd?> </p>
		<p class="font"><b>Contact no.:</b></p> <p class="text1"><?php echo $cnum?></p> 
	
		<br />
	</div>
	<br />
	<br />
	<p class="text1"><a href="<?php echo base_url('SalesAgent/addSched/'.$orderID) ?>"><span class="glyphicon glyphicon-plus"> </span>Schedule Delivery</a></a></p>
		<div class="search1">
			Search: <input type="text" id="myInput" onkeyup="Transaction()" placeholder="Type any value" title="Type ANY value">
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
				$totalPrice = 0;
				 
					foreach($trans as $t){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
						echo "<tr><td>";
						foreach($items as $i)
						{
							if ($t['itemID'] == $i['itemID'])
							echo $i['item_desc'];
						}	
						echo '</td><td>'.$t['unit_price'].'</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['status'].'</td><td><a href="'.base_url('SalesAgent/updateTransaction/'.$t['transID']).'">Edit</a> | <a href="'.base_url('SalesAgent/delTransaction/'.$t['transID']).'/'.$orderID.'">Delete</a></td></tr>';
						if($t['status'] == 'Purchased')
							$totalPrice = $totalPrice + $t['unit_price'] * $t['quantity'];
						elseif($t['status'] == 'Returned' || $t['status'] == 'Cancelled')
							$totalPrice = $totalPrice - $t['unit_price'] * $t['quantity'];
						//echo base_url('SalesAgent/delClient/'.c['clientID'])
						}

						echo '<p><b>Subtotal: &#x20B1;</b> '. $totalPrice."</p>";
				?>
				
				
				
			</tbody>
		</table>
		   <table class="table table-striped">
			<thead>
				<tr id="trHead">
					<th>Status</th>
					<th>Location</th>
					<th>Date</th>
					<th>Time</th>
					<th>Action</th>
				</tr>
			</thead>
			 <tbody>
				<?php
				if($ship != false ){
					foreach($ship as $s){
					if($s['status']=='Scheduled'){
					echo '<a href="'.base_url('SalesAgent/addDeliveryStatus/'.$orderID.'/'.$s['shipID'].'').'" class="sub">
					<span class="glyphicon glyphicon-plus"> </span>Add Delivery Updates</a>';}
					}
					
				
					 foreach($ship as $s){
					echo '<td>'.$s['status'].'</td><td>'.$s['location'].'</td><td>'.$s['date'].'</td><td>'.$s['time'].'</td>
					<td><a href="'.base_url('SalesAgent/updateDeliveryStatus/'.$s['statusID'].'/'.$orderID).'">Edit</a> | <a href="'.base_url('SalesAgent/delDeliveryStatus/'.$s['statusID'].'/'.$orderID).'">Delete</a></td></tr>';
					 }
				}
					
				?>
				
				<a href="<?php echo base_url('SalesAgent/addPurchase/'.$orderID.'') ?>" class="sub">
		<span class="glyphicon glyphicon-plus"> </span>Purchase items</a>	
		
		<a href="<?php echo base_url('SalesAgent/addRefund/'.$orderID.'') ?>" class="sub">
		<span class="glyphicon glyphicon-plus"> </span>Cancel/Return Orders</a>
			</tbody>
		</table>
		</div>
		

	</div>
	</div>
</body>
</html>
