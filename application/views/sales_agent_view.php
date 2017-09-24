<!DOCTYPE html>

<html>
<head>
    <title>View Sales Agents</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Password</th>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Age</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>isAdmin</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($sales_agents as $c){  
                    echo "<tr><td>".$c['userID']."</td><td>".$c['password']."</td><td>".$c['fullname']."</td><td>".$c['birthdate']."</td><td>".$c['age']."</td><td>".$c['email']."</td><td>".$c['contact_no']."</td><td>".$c['isAdmin']
                    .'</td><td><a href="'.base_url('knoxville/updateSalesAgent/'.$c['userID']).'">Edit</a> | <a href="'.base_url('knoxville/delSalesAgent/'.$c['userID']).'">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('knoxville/addSalesAgent')?>">Add Sales Agent</a>
</body>
</html>