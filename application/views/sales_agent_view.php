<!DOCTYPE html>
<div class="tab-content">
   
	
	
	<!--<div id="table">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>-->
Search: <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Type any value" title="Type ANY value">
    <a href="<?php echo base_url('knoxville/addSalesAgent')?>" class="addLink"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Sales Agent</a>
        <div class="table-responsive table">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr id="trHead">
						<th>User ID</th>
						<th>Password</th>
						<th>Name</th>
						<th>Birthdate</th>
						<th>Email</th>
						<th>Contact Number</th>
						<th>Action</th>
					</tr>
				</thead>
			<tbody>
				<?php
					foreach($sales_agents as $c){  
						echo "<tr><td>".$c['userID']."</td><td>".$c['password']."</td><td>".$c['fullname']."</td><td>".$c['birthdate']."</td><td>".$c['email']."</td><td>".$c['contact_no'].'</td><td><a href="'.base_url('knoxville/updateSalesAgent/'.$c['userID']).'">Edit</a> | <a href="'.base_url('knoxville/delSalesAgent/'.$c['userID']).'">Delete</a></td></tr>';
						//echo base_url('knoxville/delClient/'.c['clientID'])
					}
				?>
			</tbody>
			</table>
		</div>
	</div>
</div>
</div>

</body>
</html>