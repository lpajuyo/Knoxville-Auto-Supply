<!DOCTYPE html>

<div class="margin left">
	<p class="font">Client name: <?php echo $cname?></p><br />
	<p class="font">Address: <?php echo $cadd?></p><br />
	<p class="font">Contact no.: <?php echo $cnum?></p><br />
</div>

<a href="<?php echo base_url('knoxville/addTransaction')?>" >
    <button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Add Transaction</button></a>

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
					echo '</td><td>'.$t['unit_price'].'</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['status'].'</td><td><a href="">Edit</a> | <a href="">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
					}
            ?>
			
        </tbody>
    </table>
</div>
</div>
</body>
</html>