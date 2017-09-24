<!DOCTYPE html>

<html>
<head>
    <title>View Clients</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($clients as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>".$c['clientID']."</td><td>".$c['client_name']."</td><td>".$c['address']."</td><td>".$c['contact_no']
                    .'</td><td><a href="'.base_url('knoxville/updateClient/'.$c['clientID']).'">Edit</a> | <a href="'.base_url('knoxville/delClient/'.$c['clientID']).'">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('knoxville/addClient')?>">Add Client</a>
</body>
</html>