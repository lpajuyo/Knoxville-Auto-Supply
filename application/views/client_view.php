<!DOCTYPE html>
<div class="tab-content">

	<a href="<?php echo base_url('knoxville/addClient')?>" class="addLink"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Client</a>
    <div class="search1">
		Search: <input type="text" id="myInput" onkeyup="Client()" placeholder="Type any value" title="Type ANY value">
    </div>
    
        <div class="table-responsive table" id="myTable">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th>Address </th>
                        <th>Contact No.</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
            <?php
                if($clients != false){
                    foreach($clients as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                        echo "<tr><td>".$c['clientID']."</td><td>".$c['client_name']."</td><td>".$c['address']."</td><td>".$c['contact_no']
                        .'</td><td><a href="'.base_url('knoxville/updateClient/'.$c['clientID']).'">Edit</a> | <a href="'.base_url('knoxville/delClient/'.$c['clientID']).'">Delete</a></td></tr>';
                        //echo base_url('knoxville/delClient/'.c['clientID'])
                    }
                }
            ?>
        </tbody>
    </table>
    </div>
</div>
</div>
    
</body>
</html>
