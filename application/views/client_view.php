<!DOCTYPE html>

	<a href="<?php echo base_url('knoxville/addClient')?>" data-toggle="modal" data-target="#myModal">
    <button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Add Client</button></a>
    <div id="table">
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr id="trHead">
                        <th class="info">Client ID</th>
                        <th class="info">Client Name</th>
                        <th class="info">Address </th>
                        <th class="info">Contact No.</th>
                        <th class="info">Action </th>
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
    </div>
</div>
    
</body>
</html>
