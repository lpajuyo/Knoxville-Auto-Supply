<!DOCTYPE html>

<html>
<head>
    <title>View Orders</title>
</head>
<body>
    <table>
        <thead>
            <tr>
				<th>Order#</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duedate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			 
                foreach($orders as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>".$c['orderID']."<td>";
					foreach($clients as $i)
					{
						if ($c['clientID'] == $i['clientID'])
						echo $i['client_name'];
					}	
					echo "</td><td>".$c['date']."</td><td>".$c['time']."</td><td>".$c['due']
                    .'</td><td><a href="'.base_url('knoxville/viewTransaction/'.$c['orderID'].'').'">>>View Order Details</a> | <a onclick="confirmDelete('.$c['orderID'].')">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
					}
            ?>
			
        </tbody>
    </table>
    <a href="<?php echo base_url('knoxville/addOrder')?>">Add Order</a>
    
    <script>
    function confirmDelete(orderID){
        var choice=confirm("Delete this order?");
        if(choice)
            window.location.assign("<?php echo base_url('knoxville/delOrder'); ?>"+"/"+orderID);
    }
    </script>
</body>
</html>