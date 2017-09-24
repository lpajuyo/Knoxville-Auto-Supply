<!DOCTYPE html>

<html>
<head>
    <title>View Orders</title>
</head>
<body>
    <table>
        <thead>
            <tr>
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
                    echo "<tr><td>".$c['clientID']."</td><td>".$c['date']."</td><td>".$c['time']."</td><td>".$c['due']
                    .'</td><td><a href="">Edit</a> | <a href="">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            ?>
			
        </tbody>
    </table>
    <a href="<?php echo base_url('knoxville/addOrder')?>">Add Order</a>
</body>
</html>