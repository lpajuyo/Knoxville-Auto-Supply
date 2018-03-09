<!DOCTYPE html>
<div class="tab-content">
  <?php echo validation_errors(); ?>
<div class="card-body">
	<button data-toggle="modal" data-target="#squarespaceModal"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Deliverer</button>
	

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Deliverer</h3>
		</div>
		<div class="modal-body">
		<div>&nbsp;</div>
  <div class="container ClientForm">
 
    <div>
		<label class="control-label col-sm-4" for="vehicle">Vehicle:</label>
		<input class="form-control col-sm-4" type="text" name="vehicle" id="vehicle" />
    </div>
    
    <div>
		<label class="control-label col-sm-4" for="cnum">Contact Number:</label>
		<input class="form-control col-sm-4" type="text" name="cnum" id="cnum" />
    </div>
    
    <div class="text-center col-sm-6">
		<label class="control-label" for="assigned">Assigned personnel</label>
	    <input class="form-control" type="text" name="assigned" id="assigned" />
	</div>
	
	<div class="col-sm-6">
		<input class="subUpdate" type="submit" value="SUBMIT"/>
	</div>
  </div>
  </form>
  
 </div>
  </div>
  </div>
  </div>
  </div>
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