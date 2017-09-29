<!DOCTYPE html>


	Client name: <?php echo $cname?><br />
	Address: <?php echo $cadd?><br />
	Contact no.: <?php echo $cnum?><br />
    <table>
        <thead>
            <tr>
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
					echo '</td><td>'.$t['unit_price'].'</td><td>'.$t['quantity'].'</td><td>'.$t['date'].'</td><td>'.$t['status'].'</td><td><a href="">Edit</a> | <a href="">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
					}
            ?>
			
        </tbody>
    </table>
    <a href="<?php echo base_url('knoxville/addOrder')?>">Add Transaction</a>
</body>
</html>