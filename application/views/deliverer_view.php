<!DOCTYPE html>
<div class="tab-content">

	<a href="<?php echo base_url('knoxville/addDeliverer')?>" class="addLink"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Deliverer</a>
	
	<div class="search1">
		Search: <input type="text" id="myInput" onkeyup="Deliverer()" placeholder="Type any value" title="Type ANY value">
	</div>
<div class="table-responsive table" id="myTable">
    <table class="table table-striped">
                <thead>
                    <tr id="trHead">
						<th>Deliverer ID</th>
						<th>Vehicle</th>
						<th>Contact Number</th>
						<th>Assigned</th>
						<th>ACTION</th>
					</tr>
				</thead>
        <tbody>
            <?php
            if($deliverer != false){
                foreach($deliverer as $c){  
                    echo "<tr><td>".$c['delivererID']."</td><td>".$c['vehicle']."<td>".$c['contact_no']."</td><td>".$c['assigned']
                    .'</td><td><a href="'.base_url('knoxville/updateDeliverer/'.$c['delivererID']).'">Edit</a> | <a href="'.base_url('knoxville/delDeliverer/'.$c['delivererID']).'">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
                }
            }
            ?>
        </tbody>
    </table>
    </div>
</div>

</body>
</html>