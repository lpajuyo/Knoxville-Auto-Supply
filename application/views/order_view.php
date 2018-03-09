<!DOCTYPE html>
<div class="tab-content">
<?php echo validation_errors(); ?>
<div class="card-body">

	<button data-toggle="modal" data-target="#squarespaceModal"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Order</button>
	

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Add Client</h3>
		</div>
		<div class="modal-body">
		<div>&nbsp;</div>
  <div class="container ClientForm">
		<div>
			<label class="control-label col-sm-4" for="company">Company: &nbsp; </label>
		<div class="col-sm-4 user1" id="userID">
		<?php
		echo '<select name="clientid" form="order">';
			echo '<option selected disabled hidden>Company Name</option>';
			foreach($clients as $c){
				echo '<option value="'.$c['clientID'].'">'.$c['client_name'].'</option>';
			}
		echo '</select>';
		?>
		</div>
	</div>
	
	<div>
		<label class="control-label col-sm-4" for="date">Date:</label>
 		<input class="form-control col-sm-4" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
	</div>
	<div>
 		<label class="control-label col-sm-4" for="date">Time: &nbsp;</label>		
		<input class="form-control col-sm-4" type="time" name="time" value="<?php date_default_timezone_set('Asia/Manila'); echo  date("H:i"); ?>"/>
	</div>	
    
	
	<div>
	
		<label class="control-label col-sm-4" for="transaction">Transaction: &nbsp;</label>		
		<select class="form-control col-sm-4" name="trans" id="trans">
			<option value="Quoted">Quote</option>
			<option value="Purchased">Purchase</option>
		</select>
	<div>
	</div>					
							
		<label class="control-label col-sm-4" for="duedate">Due Date: </label>
		<input class="form-control col-sm-4" type="date" name="duedate" value="<?php echo date('Y-m-d', strtotime( date('Y-m-d'). ' + 7 days'))?>"/>
		
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<div class="search1">
	Search: <input type="text" id="myInput" onkeyup="Order()" placeholder="Type any value" title="Type ANY value">
</div>

<div class="table-responsive table" id="myTable">
    <table class="table table-striped">
        <thead>
            <tr id="trHead">
				<th>Order#</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duedate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			if($orders != false){
                foreach($orders as $c){ //Array ( [clientID] => 1 [client_name] => dsa [address] => dsa [contact_no] => 123 ) 
                    echo "<tr><td>".$c['orderID']."<td>";
					foreach($clients as $i)
					{
						if ($c['clientID'] == $i['clientID'])
						echo $i['client_name'];
					}	
					echo "</td><td>".$c['date']."</td><td>".$c['time']."</td><td>".$c['due']
                    .'</td><td><a href="'.base_url('knoxville/viewTransaction/'.$c['orderID'].'').'">View Order Details</a> | <a onclick="confirmDelete('.$c['orderID'].')">Delete</a></td></tr>';
                    //echo base_url('knoxville/delClient/'.c['clientID'])
					}
            }
            ?>
			
        </tbody>
    </table>
</div>
    
    <script>
    function confirmDelete(orderID){
        var choice=confirm("Delete this order?");
        if(choice)
            window.location.assign("<?php echo base_url('knoxville/delOrder'); ?>"+"/"+orderID);
    }
    </script>
</body>
</html>