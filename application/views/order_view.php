<!DOCTYPE html>
<div class="tab-content"> 
 <?php echo validation_errors(); ?>
<div class="card-body" style="padding: 10px;"> 
<h3 style="text-align: center; text-decoration: bold;" >SALES MANAGEMENT</h3>
<?php echo validation_errors(); ?>



<div class="search1">
	Search: <input type="text" id="myInput" onkeyup="Order()" placeholder="Type any value" title="Type ANY value" class="sround">
	<a href="<?php echo base_url('knoxville/addOrder')?>" class="butt3"><span class="glyphicon glyphicon-plus"> </span>&nbsp;Add Order</a>
</div>

<div class="table-responsive table" id="myTable">
    <table class="table table-striped">
        <thead>
            <tr id="trHead">
				<th>Order# <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
                <th>Client Name <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
                <th>Date <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
                <th>Time <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
                <th>Duedate <span class="glyphicon glyphicon-sort" style="color: white;"></span></th>
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
                    $date = strtotime($c['date']);
                    $time = strtotime($c['time']);
                    $due = strtotime($c['due']);

					echo "</td><td>".date('Y/m/d', $date)."</td><td>".date("h:i A",$time)."</td><td>".date('Y/m/d', $due).'</td><td><a href="'.base_url('knoxville/viewTransaction/'.$c['orderID'].'').'"><span class="glyphicon glyphicon-eye-open"></span></a> | <a onclick="confirmDelete('.$c['orderID'].')"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';

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