<!DOCTYPE html>

	<a href="<?php echo base_url('knoxville/addSalesAgent')?>"><button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Add Sales Agent</button></a>
	
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
						<th class="info">User ID</th>
						<th class="info">Password</th>
						<th class="info">Name</th>
						<th class="info">Birthdate</th>
						<th class="info">Age</th>
						<th class="info">Email</th>
						<th class="info">Contact Number</th>
						<th class="info">isAdmin</th>
						<th class="info">ACTION</th>
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
    </div>
</div>
</body>
</html>