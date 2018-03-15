<!DOCTYPE html>
<div class="tab-content">
<?php echo validation_errors(); ?>
<div class="card-body" style="padding: 20px;">
<h3 style="text-align: center; text-decoration: bold;" >TRANSACTION DETAILS</h3><br />
<div class="text-center">
<p class="font " style="font-size:20px;"><b>Order ID:</b></p> <?php echo $orderID?></p>
</div>
<div class="contentNested">
	<div class="sales">
		<p class="font"><b>Client name:</b><p> <?php echo $cname?></p>
		<p class="font"><b>Address:</b><p>  <?php echo $cadd?> </p>
		<p class="font"><b>Contact no.:</b><p> <?php echo $cnum?></p> 
	
		<br />
	</div>
	<br />
	<br />
	<?php if($ship == false) {
		foreach($trans as $t)
		{
			$counter=0;
			if($t['status'] == 'Purchased')
				$counter++;
		}
	}
	if($counter > 0)
		echo '<p class="xxx text-center "><a data-toggle="modal" data-target="#modal"  ><span class="glyphicon glyphicon-plus"> </span>Schedule Delivery</a></p>';?>
		
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h2 class="text-center">ADD SCHEDULE</h2>
        </div>
        <div class="modal-body">
		<div class="content1">
			<?php echo validation_errors(); ?>
			<?php echo form_open('knoxville/addSched/'.$orderID,'id="delivery"'); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/knoxville/addClient">
											 //to add attributes, edit to: echo form('knoxville/addClient','class="lala" id="lala"'); 
			?>
				<div>&nbsp;</div>
				
			<div class="container ClientForm"  style="width: 400px; ">
			
			<label class="control-label col-sm-6">Assign Personnel</label>
				<?php
				echo '<select name="deliverer" class="text-center form-control col-sm-4" style="width: 350px;">';
					echo '<option selected disabled hidden >Choose Personnel</option>';
					foreach($deliverer as $c){
						echo '<option value="'.$c['delivererID'].'">'.$c['assigned'].'</option>';
					}
				echo '</select>';
				?>
			
				<div>
				<label class="control-label col-sm-6" >Date:</label>
				<input class="form-control col-sm-4" style="width: 350px;" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
				</div>
				<br />
				<div>
				<label class="control-label col-sm-6" >Time: &nbsp;</label>		
				<input class="form-control col-sm-4" style="width: 350px;" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
				</div>
				<br />
				<div>
				<input class="subUpdate sround" type="submit">
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	
	
		<div class="searchLeft1">
			Search: <input type="text" id="myInput" onkeyup="Transaction()" placeholder="Type any value" title="Type ANY value" class="sround">
		</div>
		<div class="table-responsive table">
		<table class="table table-striped">
			<thead>
				<tr id="trHead">
					<th>Item Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Price <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Quantity <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Date <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
					<th>Status <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
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
						echo '</td><td>&#x20B1;'.number_format($t['unit_price']).'</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['status'].'</td><td><a href="'.base_url('knoxville/updateTransaction/'.$t['transID']).'">Edit</a> | <a href="'.base_url('knoxville/delTransaction/'.$t['transID']).'/'.$orderID.'">Delete</a></td></tr>';
						if($t['status'] == 'Purchased')
							$totalPrice = $totalPrice + $t['unit_price'] * $t['quantity'];
						elseif($t['status'] == 'Returned' || $t['status'] == 'Cancelled')
							$totalPrice = $totalPrice - $t['unit_price'] * $t['quantity'];
						//echo base_url('knoxville/delClient/'.c['clientID'])
						}

						echo '<p><b>Subtotal: &#x20B1;</b> '.number_format($totalPrice)."</p>";
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
					echo '<a href="'.base_url('knoxville/addDeliveryStatus/'.$orderID.'/'.$s['shipID'].'').'" class="sub">
					<span class="glyphicon glyphicon-plus"> </span>Add Delivery Updates</a>';}
					}
					
				
					 foreach($ship as $s){
					echo '<td>'.$s['status'].'</td><td>'.$s['location'].'</td><td>'.$s['date'].'</td><td>'.$s['time'].'</td>
					<td><a href="'.base_url('knoxville/updateDeliveryStatus/'.$s['statusID'].'/'.$orderID).'">Edit</a> | <a href="'.base_url('knoxville/delDeliveryStatus/'.$s['statusID'].'/'.$orderID).'">Delete</a></td></tr>';
					 }
				}
					
				?>
				
				<a href="<?php echo base_url('knoxville/addPurchase/'.$orderID.'') ?>" class="sub sround" style="margin-left: 150px;">
		<span class="glyphicon glyphicon-plus"></span>Purchase items</a>	
		
		<a href="<?php echo base_url('knoxville/addRefund/'.$orderID.'') ?>" class="sub sround">
		<span class="glyphicon glyphicon-plus"> </span>Cancel/Return Orders</a>
			</tbody>
		</table>
		</div>
		

	</div>
	</div>
</body>
</html>
