<!DOCTYPE html>

	<a href="<?php echo base_url('knoxville/addDeliverer')?>"><button class="btn btn-primary" type="button" id="addButton"><span class="glyphicon glyphicon-plus"> </span>Add Deliverer</button></a>
	
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
						<th class="info">Deliverer ID</th>
						<th class="info">Vehicle</th>
						<th class="info">Contact Number</th>
						<th class="info">Assigned</th>
						<th class="info">ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
                foreach($deliverer as $c){  
                    echo "<tr><td>".$c['delivererID']."</td><td>".$c['vehicle']."<tr><td>".$c['contact_no']."</td><td>".$c['assigned']
                    .'</td><td><a href="'.base_url('knoxville/updateDeliverer/'.$c['delivererID']).'">Edit</a> | <a href="'.base_url('knoxville/delDeliverer/'.$c['delivererID']).'">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>